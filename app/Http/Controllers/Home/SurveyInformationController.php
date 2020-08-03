<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;

/**
 * Class SurveyInformationController
 */
class SurveyInformationController extends Controller
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
     * @param  mixed $header
     * @return void
     */
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
