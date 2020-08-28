<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InputType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InputController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function index()
    {
        $InputType = InputType::all();

        return view('pages.admin.inputs.index', compact('InputType'));
    }


    public function create()
    {
        return view('pages.admin.inputs.create');
    }


    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        if (InputType::create($request->all())) {
            return redirect()->route('inputs.index');
        }
    }


    public function edit(Request $request, string $InputType)
    {
        $InputType = InputType::where('name', $InputType)->first();
        return view('pages.admin.inputs.edit', compact('InputType'));
    }


    public function update(Request $request, InputType $InputType)
    {
        $request['slug'] = Str::slug($request->name);

        if ($InputType->update($request->all())) {
            return redirect()->route('inputs.index');
        }
    }


    public function delete(string $InputType)
    {
        $InputType =  InputType::where('id', $InputType)->first();
        if ($InputType->delete()) {
            return redirect()->route('inputs.index')->with(["type" => "success", "message" => "Input eliminado con éxito"]);
        }
    }
}
