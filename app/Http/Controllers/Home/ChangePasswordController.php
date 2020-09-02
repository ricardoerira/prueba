<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct() {
        //
    }

    public function index()
    {
        return view('pages.home.change_password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user()->id;
        dd($user);
    }

}
