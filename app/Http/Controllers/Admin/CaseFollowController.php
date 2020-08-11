<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
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
            case 'all':
                $cases = Answer::with('survey')->where(['question_id' => 128])->get();
                break;
            case 'positive':
                // $cases = Answer::with('survey')->where(['choice_id' => 3, 'question_id' => 128, ''])->orderBy('id', 'desc')->get();
                $users = User::all();

                foreach ($users as $key => $user) {
                    $survey = Survey::where(['surveyed_id' => $user->id, 'header_id' => 6])->get()->last();

                    // TODO:: Filter date created_at->first()
                    if ($survey == null) {
                        continue;
                    }
                    dd($survey->answers->where('question_id', 128));
                }
                // dd($casesCovid);
                break;
            case 'negative':
                $cases = Answer::with('survey')->where(['choice_id' => 4, 'question_id' => 128])->get();
                break;
        }

        return view('pages.admin.case_follow.index', compact('cases'));
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
