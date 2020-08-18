<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Header;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Bool_;

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
        }

        if ($header->pollster == 2) {
            return redirect()->route('survey.doing.index');
        }

        return redirect()->route('home')->with(["type" => "success", "message" => "Encuesta realizada con éxito"]);


    }

    public function add (Request $request, Header $header)
    {

        $survey = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '6')->OrderBy('created_at', 'desc')->first());
        $last = (Answer::where('survey_id', $survey->id)->OrderBy('question_id', 'desc')->first());

        foreach ($request->answers as $key => $answer) {
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
        }
        if ($header->pollster == 2) {
            return redirect()->route('survey.doing.index');
        }

        return redirect()->route('home')->with(["type" => "success", "message" => "Encuesta actualizada con éxito"]);

    }



}
