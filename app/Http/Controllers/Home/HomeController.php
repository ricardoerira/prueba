<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Header;
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
        $headers = Header::all();

        return view('pages.home.home', compact('headers'));
    }
}
