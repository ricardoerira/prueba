<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\SurveyHeader;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index(Header $header)
    {
        return view('pages.home.headers.index', compact('header'));
    }
}
