<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public function index(){
        $choices = Choice::where('id', '>', 104)->where('id', '<', 129)->get();
        return view('pages.admin.reports.home', compact('choices'));
    }
    
    public function redirect(Request $request){

        $name = strtr(mb_strtolower(Choice::where('id', $request->choice)->pluck('name')[0]), " ", "-");
        return redirect()->route('dataReport.data', $name);

    }
    public function dataReport(string $name){
        $nameP = strtr($name ,"-", " ");
        $id = Choice::where('name', $nameP)->pluck('id')[0];
        $data = Answer::where('question_id', 30)->where('choice_id', $id)->get();
        $dataP = listHealthFilter($data);
        return view('pages.admin.reports.healthConditions', compact('dataP', 'name', 'nameP'));
    }

    public function createPDF(string $name){
        $name = strtr($name ,"-", " ");
        $id = Choice::where('name', $name)->pluck('id')[0];
        $data = Answer::where('question_id', 30)->where('choice_id', $id)->get();
        $dataP = listHealthFilter($data);
        $pdf = PDF::loadView('pages.admin.reports.pdf', compact('dataP', 'name'));
        $nameFile = "Condiciones de salud (".$name.").pdf";
        return $pdf->download($nameFile);
    }
}
