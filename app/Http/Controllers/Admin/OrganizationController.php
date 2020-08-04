<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * OrganizationController
 */
class OrganizationController extends Controller
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
     * function index
     *
     * @return void
     */
    public function index()
    {
        $organizations = Organization::all();

        return view('pages.admin.organizations.index', compact('organizations'));
    }

    /**
     * function create
     *
     * @return void
     */
    public function create()
    {
        return view('pages.admin.organizations.create');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        if (Organization::create($request->all())) {
            return redirect()->route('organizations.index');
        }
    }

    /**
     * function edit
     *
     * @param  mixed $organization
     * @return void
     */
    public function edit(Organization $organization)
    {
        return view('pages.admin.organizations.edit', compact('organization'));
    }

    /**
     * function update
     *
     * @param  mixed $request
     * @param  mixed $organization
     * @return void
     */
    public function update(Request $request, Organization $organization)
    {
        $request['slug'] = Str::slug($request->name);

        if ($organization->update($request->all())) {
            return redirect()->route('organizations.index');
        }
    }

    /**
     * function delete
     *
     * @param  mixed $organization
     * @return void
     */
    public function delete(Organization $organization)
    {
        if ($organization->delete()) {
            return redirect()->route('organizations.index');
        }
    }

}
