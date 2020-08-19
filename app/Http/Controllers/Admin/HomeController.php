<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Survey;
use App\Models\User;
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
        $totalSurveyCount = Survey::all()->count();
        $totalTestCount = Survey::where("header_id", 6)->count();

        $totalcasesPositive = User::where("status", 1)->get()->count();
        $surveys = Survey::where("header_id", 6)->get();
        $totalcasesNegative = 0;
        foreach ($surveys as $survey) {
            if ($survey->surveyed->where("status", 3)) {
                $totalcasesNegative++;
            }
        }
        $totalcasesRecovered = User::where("status", 2)->get()->count();

        return view('pages.admin.home', compact('daySurveyCount', 'totalSurveyCount', 'totalTestCount', 'totalcasesPositive', 'totalcasesNegative', 'totalcasesRecovered'));
    }

}
