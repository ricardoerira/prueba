<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Header;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Bool_;

class SurveyDoingController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
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
        )
        {
            return redirect()->route('headers.info', $header->slug);
        }

        $sections = $header->sections()->with('questions')->get();

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

            if ( $this->questionHasChoices($request->questions[$key]) ) {

                if (!is_string($answer)) {
                    $question = strval($key + 1);
                    $answer = $answer[$question];
                }

                Answer::create([
                    'survey_id'     => $survey->id,
                    'question_id'   => $request->questions[$key],
                    'choice_id'     => $answer,
                ]);
                continue;
            }

            Answer::create([
                'survey_id'     => $survey->id,
                'question_id'   => $request->questions[$key],
                'text'          => $answer
            ]);
        }

        return redirect()->back();
    }

    public function questionHasChoices(int $questionId): Bool
    {
        $question = Question::find($questionId);

        return $question->choices()->exists();
    }

}
