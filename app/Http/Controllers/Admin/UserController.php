<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('pages.admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('pages.admin.users.create', compact('roles'));
    }

    public function save(Request $request)
    {
        $request->password = bcrypt($request->password);
        $request->remember_token = Str::random(10);

        if (User::create($request->all())) {
            return redirect()->route('users.index');
        }

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }

}
