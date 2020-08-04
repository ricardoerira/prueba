<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InputType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * InputTypeController
 */
class InputTypeController extends Controller
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
        $InputType = InputType::all();

        return view('pages.admin.inputs.index', compact('InputType'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('pages.admin.inputs.create');
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

        if (InputType::create($request->all())) {
            return redirect()->route('inputs.index');
        }
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $InputType
     * @return void
     */
    public function edit(Request $request, InputType $InputType)
    {
        return view('pages.admin.inputs.edit', compact('InputType'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $InputType
     * @return void
     */
    public function update(Request $request, InputType $InputType)
    {
        $request['slug'] = Str::slug($request->name);

        if ($InputType->update($request->all())) {
            return redirect()->route('inputs.index');
        }
    }

    /**
     * delete
     *
     * @param  mixed $InputType
     * @return void
     */
    public function delete(InputType $InputType)
    {
        if ($InputType->delete()) {
            return redirect()->route('inputs.index');
        }
    }

}
