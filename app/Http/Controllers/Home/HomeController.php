<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * @return View home
     */
    public function index()
    {
        return view('pages.home.home');
    }
}
