<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class UserController extends Controller
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
        $users = User::all();

        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $roles = Role::all();

        return view('pages.admin.users.create', compact('roles'));
    }

    /**
     * edit
     *
     * @param  mixed $user
     * @return void
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('pages.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {
        $request->password = bcrypt($request->password);
        $request->remember_token = Str::random(10);

        if (User::create($request->all())) {
            return redirect()->route('users.index');
        }

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        if ($user->update($request->all())) {
            return redirect()->route('users.index');
        }

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }

    /**
     * delete
     *
     * @param  mixed $user
     * @return void
     */
    public function delete(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('users.index');
        }

        return back()->withInput()->with(['error' => 'Algo va mal']);
    }

}
