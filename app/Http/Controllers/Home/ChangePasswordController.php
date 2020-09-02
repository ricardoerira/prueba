<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
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
        $userIdAuth = auth()->user()->id;
        $user = User::find($userIdAuth);

        $user->password = bcrypt($request['password']);
        $user->change_password = 1;

        if ($user->save()) {
            return redirect()->route('home');
        }
    }

}
