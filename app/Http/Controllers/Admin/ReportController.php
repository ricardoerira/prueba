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
    
    public function dataReport(Request $request){
        $i = 0;
        $data = Answer::where('choice_id', $request->choice)->get();
        if($data->count() > 0){
            foreach($data as $item){
                $filtroUno = (Answer::where('survey_id', $item->survey_id)->where('question_id', 19)->where('text', '>', 60))->get();
                if($filtroUno->count() > 0){
                    if (($path = checkPathology($item->survey_id)) <> ""){
                        $dataP[$i] = [
                            'id' => Answer::where('survey_id', $item->survey_id)->where('question_id', 2)->pluck('text')[0],
                            'name' => Answer::where('survey_id', $item->survey_id)->where('question_id', 17)->pluck('text')[0],
                            'cargo' => Answer::where('survey_id', $item->survey_id)->where('question_id', 29)->pluck('text')[0],
                            'pathology' => $path,
                            'work' => "si",
                        ];
                        $i++;
                    } 
                }
                
            }
        }
        return view('pages.admin.reports.healthConditions', compact('dataP'));
    }

    public function createPDF(){
        $data[0] = [
            'id' => '1010022902',
            'name' => 'Natalia Erira',
            'cargo' => 'Analista de sistemas',
            'pathology' => 'fiebre',
            'work' => "si",
        ];
        //view()->share('employee',$data);
        $pdf = PDF::loadView('pages.admin.reports.pdf', compact('data'));
        return $pdf->download('pdf_file.pdf');
    }
}
