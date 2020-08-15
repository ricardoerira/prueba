<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Header;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
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

        $aux = Survey::select('id')->where(['surveyed_id' => auth()->user()->id, "header_id" => 6])->first();

        if ($header->id == 6 and $aux != null){
            $ant = (Answer::where('survey_id', $aux->id)->get());
            if ($ant->count()> 0){
                return view('pages.home.headers.edit', compact(
                    'header',
                    'sections', 'ant',
                ));
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
        if ($header->pollster == 2) {
            $survey = Survey::create([
                'pollster_id' => Auth::id(),
                'surveyed_id' => $request->answers[1],
                'header_id' => $header->id,
            ]);
        } else {
            $survey = Survey::create([
                'surveyed_id' => Auth::id(),
                'header_id' => $header->id,
            ]);
        }

        $question = 0;
        foreach ($request->answers as $key => $answer) {

            if ($this->questionHasChoices($request->questions[$question])) {

                Answer::create([
                    'survey_id'     => $survey->id,
                    'question_id'   => $request->questions[$question],
                    'choice_id'     => $answer,
                ]);

                $question++;
                continue;
            }

            Answer::create([
                'survey_id'     => $survey->id,
                'question_id'   => $request->questions[$question],
                'text'          => $answer
            ]);

            $question++;
        }

        if ($header->pollster == 2) {
            return redirect()->route('survey.doing.index');
        }

        return redirect()->route('home')->with(["type" => "success", "message" => "Encuesta realizada con éxito"]);
    }

    public function questionHasChoices(int $questionId): bool
    {
        $question = Question::find($questionId);

        return $question->choices()->exists();
    }

}
