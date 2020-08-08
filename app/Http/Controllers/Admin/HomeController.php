<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * HomeController
 */
class HomeController extends Controller
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
    public function index()
    {
        $daySurveyCount = Survey::whereDate('created_at', Carbon::now()->format('Y-m-d'))->get()->count();

        $casesCovid = Answer::where(['choice_id' => 3, 'question_id' => 128])->get()->count();

        return view('pages.admin.home', compact('daySurveyCount', 'casesCovid'));
    }

}
