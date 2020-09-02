<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\SurveyRequest;

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
    public function save(SurveyRequest $request)
    {

        $request['slug'] = Str::slug($request->name);

        $header = Header::create($request->all());

        if ($header) {
            return redirect()->route('survey.index')->with(["type" => "success", "message" => "Encuesta creada con éxito"]);
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
    public function update(SurveyRequest $request, Header $header)
    {
        $request['slug'] = Str::slug($request->name);

        if ($header->update($request->all())) {
            return redirect()->route('survey.index');
        }
    }

    public function delete(int $idheader)
    {
        if(Header::where('id', $idheader)->pluck('hide')[0] == 0){
            Header::where('id', $idheader)->update(['hide'=> 1]);
            $txt = " ocultada";
        }else{
            Header::where('id', $idheader)->update(['hide'=> 0]);
            $txt = " visualizada";
        }
        return redirect()->route('survey.index')->with("message", "La encuesta ha sido ".$txt);
    }

}
