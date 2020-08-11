<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Header;
use App\Models\Survey;
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
        $repDiario  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '3')->get())->count();
        $repTray  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '4')->get())->count();
        $repSeg  = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', '6')->get())->count();
        return view('pages.home.profile', compact('user', 'repDiario', 'repTray', 'repSeg'));
    }

    public function update(UserRequest $request, User $user)
    {
    

       $user->update($request->all());

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }
}
