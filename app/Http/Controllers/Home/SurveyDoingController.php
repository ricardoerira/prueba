<?php

namespace App\Http\Controllers\Home;

use App\Events\PostEvent;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Header;
use App\Models\Observation;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use App\Notifications\casePositive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Bool_;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class SurveyDoingController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * index
     *
     * @return void
     */
    public function index(Header $header)
    {
        if (
            url()->previous() != route('surveys.info', $header->slug) &
            url()->previous() != route('surveys.running', $header->slug)
        ) {
            return redirect()->route('headers.info', $header->slug);
        }

        $sections = $header->sections()->with('questions')->get();
        if ($header->id == 6){
            $aux  = Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '6')->OrderBy('id', 'desc')->pluck('id')->first();
            if ($aux <> null){
                $ant = Answer::where('survey_id', $aux)->where( function($query) {
                    $query->where('choice_id', '<>', '')->orWhere('text', '<>', '');
                })->get();
                if ($ant->count() > 0){
                    return view('pages.home.headers.edit', compact(
                        'header',
                        'sections',
                        'ant',
                    ));
                }
            }
        }



            return view('pages.home.headers.doing', compact(
                'header',
                'sections',
            ));

    }

    /**
     * store
     *
     * @return void
     */
    public function store(Request $request, Header $header)
    {

        //Capacity control
        if ($header->id == 1){
            if (checkCapacity($request->answers["161"]) == false){
                return redirect()->back()->with(["type" => "danger", "message" => "El area destino ya tiene la capacidad maxima permitida"]);
            }
        }
        if($header->id == 5){
            outputCapacity($request->answers["161"]);
        }

        $survey = Survey::create([
            'surveyed_id'   => Auth::id(),
            'header_id'     => $header->id,
        ]);

        foreach ($request->answers as $key => $answer) {
            if ($answer <> null){
                if (questionHasChoices($key)) {
                    Answer::create([
                        'survey_id'     => $survey->id,
                        'question_id'   => $key,
                        'choice_id'     => $answer,
                    ]);
                    continue;
                }

                Answer::create([
                    'survey_id'     => $survey->id,
                    'question_id'   => $key,
                    'text'          => $answer
                ]);
            }
        }//Notification
        //event(new PostEvent($survey));

        if ($header->pollster == 2) {
            //Check-in survey
            if($header->id == 1){
                if ($request->answers[15] == 3 && $request->answers[16] >= 38){
                    //temperature notification greater than 38º
                    $post = [
                        'user_id' => $request->answers[2],
                        'observation' => 'Temperatura de '.$request->answers[16].'º en ingreso',
                    ];
                    event(new PostEvent($post));
                }
            }

            //Check-out survey
            if($header->id == 5){
                if ($request->answers[15] == 3 && $request->answers[16] >= 38){
                    //temperature notification greater than 38º
                    $post = ([
                        'user_id' => $request->answers[2],
                        'observation' => 'Temperatura de '.$request->answers[16].'º en salida',
                    ]);
                    //$post = settype($post,"Observation");
                    event(new PostEvent($post));
                }
             }

            return redirect()->route('survey.doing.index');
        }

        if ($header->id == 2){
            
            //method to identify high risk
            if(healthFilter($survey->id) == true){
                User::where('id', auth()->user()->id)->update(['highRisk' => 1]);
                Observation::create([
                    'user_id' => auth()->user()->id,
                    'observation' => 'Persona alto riesgo',
                ]);
                $post = [
                    'user_id' => auth()->user()->id,
                    'observation' => 'Persona alto riesgo',
                ];
                event(new PostEvent($post));
                
            }
            

            //request psychological support
            if(isset($request->answers[84])){
                if(Answer::where('survey_id',$survey->id )->where('question_id', 84)->flick('choice_id')[0] == 3){
                
                    Observation::create([
                        'user_id' => auth()->user()->id,
                        'observation' => 'Solicita apoyo emocional y psicosocial',
                    ]);
    
                    $post = [
                        'user_id' => auth()->user()->id,
                        'observation' => 'Solicita apoyo emocional y psicosocial',
                    ];
                    event(new PostEvent($post));
                }
            }
           
            
        }


        //method to identify assets and negatives of covid-19
        if ($header->id == 6){
            $post = initialDiagnostic($request->answers);
            if ($post['observation'] == "Caso positivo covid-19"){
                event(new PostEvent($post));
            }
        }
        
        return redirect()->route('home')->with(["type" => "success", "message" => "Encuesta realizada con éxito"]);


    }


    //Update surveys
    public function add (Request $request, Header $header)
    {

        $survey = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', $header->id)->OrderBy('created_at', 'desc')->first());
        $last = (Answer::where('survey_id', $survey->id)->OrderBy('question_id', 'desc')->first());

        foreach ($request->answers as $key => $answer) {
            if ($header->id == 6){
                if($key == $last->question_id){
                    $res = Answer::where ('survey_id', $survey->id)->where ('question_id', $key)->delete();
                }
                if ($answer <> null){
                    if (!existAnswer($key, $survey->id)){
                        if (questionHasChoices($key)) {
                            Answer::create([
                                'survey_id'     => $survey->id,
                                'question_id'   => $key,
                                'choice_id'     => $answer,
                            ]);

                            continue;
                        }

                        Answer::create([
                            'survey_id'     => $survey->id,
                            'question_id'   => $key,
                            'text'          => $answer,
                        ]);
                    }
                }
            }else{
                if ($answer <> null){

                    if (existAnswer($key, $survey->id)){
                        if (questionHasChoices($key)) {
                            Answer::where('survey_id', $survey->id)->where('question_id', $key)->update(['choice_id'=>$answer]);
                        }else{
                            Answer::where('survey_id', $survey->id)->where('question_id', $key)->update(['text'=>$answer]);
                        }
                    }else{
                        if (questionHasChoices($key)) {
                            Answer::create([
                                'survey_id'     => $survey->id,
                                'question_id'   => $key,
                                'choice_id'     => $answer,
                            ]);

                            continue;
                        }
                        Answer::create([
                            'survey_id'     => $survey->id,
                            'question_id'   => $key,
                            'text'          => $answer,
                        ]);
                    }
                }

            }

        }


        //report identification of health conditions
        if ($header->id == 2){

            //method upgrade to identify high risk
            $riesgo = healthFilter($survey->id);
            if(User::where('id', auth()->user()->id)->pluck('highRisk')[0] == 1 && $riesgo == false){
                User::where('id', auth()->user()->id)->update(['highRisk' => 0]);
            }
            if(User::where('id', auth()->user()->id)->pluck('highRisk')[0] == 0  && $riesgo == true){
                User::where('id', auth()->user()->id)->update(['highRisk' => 1]);
                Observation::create([
                    'user_id' => auth()->user()->id,
                    'observation' => 'Persona alto riesgo',
                ]);
                $post = [
                    'user_id' => auth()->user()->id,
                    'observation' => 'Persona alto riesgo',
                ];

                event(new PostEvent($post));
            }

            //request psychological support
            if(isset($request->answers['84'])){
                if($request->answers['84'] == 3){
                    Observation::create([
                        'user_id' => auth()->user()->id,
                        'observation' => 'Solicita apoyo emocional y psicosocial',
                    ]);
                    $post = [
                        'user_id' => auth()->user()->id,
                        'observation' => 'Solicita apoyo emocional y psicosocial',
                    ];
                    event(new PostEvent($post));
                }
            }
        }

        //method called in case of containing any of the answers involving the covid state
        if($header->id == 6){
            if(array_key_exists('131', $request->answers) || array_key_exists('135', $request->answers) || array_key_exists('142', $request->answers)){
                $post = continuityNotification($request->answers);
                if ($post->observation == "Caso positivo covid-19"){
                    event(new PostEvent($post));
                }
            }
        }


        if ($header->pollster == 2) {
            return redirect()->route('survey.doing.index');
        }

        return redirect()->route('home')->with(["type" => "success", "message" => "Encuesta actualizada con éxito"]);

    }



}
