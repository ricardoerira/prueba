<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Level;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class CaseFollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $filter)
    {

        $cases = new Answer();

        switch ($filter) {
            case 'positive':
                $surveys = Survey::where(['header_id' => 6])->orderBy('created_at', 'desc')->get()->unique('surveyed_id');
                $cases = [];

                foreach ($surveys as $survey) {
                    $case = $survey->answers->where('question_id', 128)->where('choice_id', 182)->first();
                    if ($case == null) {
                        continue;
                    }

                    array_push($cases, $case);
                }
                break;

            case 'negative':
                $surveys = Survey::where(['header_id' => 6])->orderBy('created_at', 'desc')->get()->unique('surveyed_id');
                $cases = [];

                foreach ($surveys as $survey) {
                    $case = $survey->answers->where('question_id', 128)->where('choice_id', 183)->first();

                    if ($case == null) {
                        continue;
                    }

                    array_push($cases, $case);
                }
                break;
        }

        return view('pages.admin.case_follow.index', compact('cases'));
    }

    public function follow(Survey $survey)
    {
        $surveyed = $survey->surveyed;
        $answers = $survey->answers;

        $dataHealthCondition = Survey::with('answers')->where(['surveyed_id' => $surveyed->id, 'header_id' => 2])->first();

        $dateInit = $dataHealthCondition->first()->created_at->format('d-m-Y');

        $levels = Level::all();

        $observations = $surveyed->observations;

        $dataHealthCondition = Answer::where('survey_id', $dataHealthCondition->id)->whereIn('question_id', [
            2, 17, 18, 19, 20, 21, 22, 24, 27, 28, 29, 30
        ])->get();


        return view('pages.admin.case_follow.follow', compact(
            'survey',
            'surveyed',
            'answers',
            'dateInit',
            'dataHealthCondition',
            'levels',
            'observations'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
