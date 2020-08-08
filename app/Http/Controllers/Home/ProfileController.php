<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;

class ProfileController extends Controller
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
    public function edit()
    {
        $user = auth()->user();
        return view('pages.home.profile', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
    

       $user->update($request->all());

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }
}
