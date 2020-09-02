<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportHigh;

class ReportController extends Controller
{
    public function index(){
        $choices = Choice::where('id', '>', 104)->where('id', '<', 129)->get();
        return view('pages.admin.reports.home', compact('choices'));
    }
    
    public function redirect(Request $request){
        if ($request->choice > 0) {
            $name = strtr(mb_strtolower(Choice::where('id', $request->choice)->pluck('name')[0]), " ", "_");
        }else{
            $name = "todas";
        }
        
        return redirect()->route('dataReport.data', $name);

    }
    public function dataReport(string $name){
        $pp = Survey::where('header_id', 2)->get()->unique('surveyed_id')->pluck('id');
        $nameP = strtr($name ,"_", " ");
        
            $j = 0;
            for ($i = 0; $i < count($pp); $i++){
                if ($name != "todas"){
                    if(Answer::where('survey_id', $pp[$i])->where('question_id', 30)->where('choice_id', choice::where('name', $nameP)->pluck('id')[0])->get()->count() > 0){
                        $data[$j] = $pp[$i];
                        $j++;
                    }
                }else{
                    $data[$j] = $pp[$i];
                    $j++;
                }
            }
        
        $dataP = listHealthFilter($data);
        if($dataP == null){
            return Redirect::back()->with('message', 'La dependencia '.$nameP." no tiene registros de personas alto riesgo");
        }
        return view('pages.admin.reports.healthConditions', compact('dataP', 'name', 'nameP'));
    }

    public function createPDF(string $name){
        
        return Excel::download(new ReportHigh($name), 'Condiciones de salud ('.$name.').xlsx');
    }
}
