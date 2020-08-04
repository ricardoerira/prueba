<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * HeaderController
 */
class HeaderController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('pages.admin.headers.index');
    }

}
