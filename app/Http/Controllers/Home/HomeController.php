<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Header;
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
    public function __construct()
    {
        //
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $headers = Header::with('surveys')
            ->where('pollster', 1)
            ->OrderBy('created_at', 'desc')
            ->get();

        $formIni = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '2')->get())->count();
        

        return view('pages.home.home', compact('headers', 'formIni'));
    }

}
