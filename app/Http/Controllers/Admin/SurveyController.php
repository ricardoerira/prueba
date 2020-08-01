<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * SurveyController
 */
class SurveyController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $surveys = Header::all();

        return view('pages.admin.survey.index', compact('surveys'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $organizations = Organization::all();

        return view('pages.admin.survey.create', compact('organizations'));
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        $header = Header::create($request->all());

        if ($header) {
            return redirect()->route('survey.edit', $header->slug);
        }
    }

    /**
     * edit
     *
     * @param  mixed $header
     * @return void
     */
    public function edit(Header $header)
    {
        $organizations = Organization::all();

        return view('pages.admin.survey.edit', compact('header', 'organizations'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $header
     * @return void
     */
    public function update(Request $request, Header $header)
    {
        dd($request);
    }

}
