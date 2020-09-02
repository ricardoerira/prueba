<?php

namespace App\Exports;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportHigh implements FromView
{

    public function __construct($name) {
        $this->name = $name;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $pp = Survey::where('header_id', 2)->get()->unique('surveyed_id')->pluck('id');
        $nameP = strtr($this->name ,"_", " ");
        
            $j = 0;
            for ($i = 0; $i < count($pp); $i++){
                if ($this->name != "todas"){
                    if(Answer::where('survey_id', $pp[$i])->where('question_id', 30)->where('choice_id', Choice::where('name', $nameP)->pluck('id')[0])->get()->count() > 0){
                        $data[$j] = $pp[$i];
                        $j++;
                    }
                }else{
                    $data[$j] = $pp[$i];
                    $j++;
                }
            }
            $dataP = listHealthFilter($data);
            return View('export.admin.healthyConditions.index', compact('dataP'));
    }
}
