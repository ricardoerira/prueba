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

    public function controls (Request $request){
        $area = false;
        $actual = workArea::where('id', $request->area)->pluck('current_capacity')[0];
        $perm = workArea::where('id', $request->area)->pluck('permitted_capacity')[0];
        if($actual < $perm){
            $area = true;
        }

            
        return response()->json($area);
    }
}
