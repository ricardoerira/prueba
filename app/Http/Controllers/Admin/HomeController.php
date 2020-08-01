<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('pages.admin.home');
    }

}
