<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $organizations = Organization::all();

        return view('pages.admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('pages.admin.organizations.create');
    }

    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        if (Organization::create($request->all())) {
            return redirect()->route('organizations.index');
        }
    }

    public function edit(Organization $organization)
    {
        return view('pages.admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request['slug'] = Str::slug($request->name);

        if ($organization->update($request->all())) {
            return redirect()->route('organizations.index');
        }
    }

    public function delete(Organization $organization)
    {
        if ($organization->delete()) {
            return redirect()->route('organizations.index');
        }
    }

}
