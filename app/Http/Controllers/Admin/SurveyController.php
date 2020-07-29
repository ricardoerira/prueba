<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $surveys = Header::all();

        return view('pages.admin.survey.index', compact('surveys'));
    }

    public function create()
    {
        $organizations = Organization::all();

        return view('pages.admin.survey.create', compact('organizations'));
    }

    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        $header = Header::create($request->all());

        if ($header) {
            return redirect()->route('survey.edit', $header->slug);
        }
    }

    public function edit(Header $header)
    {
        $organizations = Organization::all();

        return view('pages.admin.survey.edit', compact('header', 'organizations'));
    }

    public function update(Request $request, Header $header)
    {
        dd($request);
    }

}
