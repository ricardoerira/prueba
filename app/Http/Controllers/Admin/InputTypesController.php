<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InputTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InputTypesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $inputTypes = InputTypes::all();

        return view('pages.admin.inputs.index', compact('inputTypes'));
    }

    public function create()
    {
        return view('pages.admin.inputs.create');
    }

    public function save(Request $request)
    {
        $request['slug'] = Str::slug($request->name);

        if (InputTypes::create($request->all())) {
            return redirect()->route('inputs.index');
        }
    }

    public function edit(Request $request, InputTypes $inputTypes)
    {
        return view('pages.admin.inputs.edit', compact('inputTypes'));
    }

    public function update(Request $request, InputTypes $inputTypes)
    {
        $request['slug'] = Str::slug($request->name);

        if ($inputTypes->update($request->all())) {
            return redirect()->route('inputs.index');
        }
    }

    public function delete(InputTypes $inputTypes)
    {
        if ($inputTypes->delete()) {
            return redirect()->route('inputs.index');
        }
    }

}
