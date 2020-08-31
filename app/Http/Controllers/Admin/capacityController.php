<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\workArea;
use Illuminate\Http\Request;

class capacityController extends Controller
{
    public function check (Request $request){
        $area = workArea::where('seat', $request->area)->pluck('name', 'id');
        return response()->json($area);
    }
}
