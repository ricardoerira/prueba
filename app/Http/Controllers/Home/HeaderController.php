<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index(Header $header)
    {
        $sections = $header->sections()->get();

        $sections_count = $sections->count();

        return view('pages.home.headers.index', compact(
            'header',
            'sections',
            'sections_count'
        ));
    }
}
