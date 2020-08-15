<?php

use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

if (!function_exists('setActive')) {
    function setActive(string $path, string $class_name = "active")
    {
        return Request::url() === $path ? $class_name : "";
    }
}

//Check if the sent section has already been answered
if (!function_exists('sectionExist')) {
    function sectionExist(int $section, object $data)
    {
        $i=0;
        $bandera = false;
        while(!$bandera &&  $i < $data->count()){
            $ant = DB::table('question_section')->where ('section_id', $section)->where('question_id', $data[$i]->question_id)->get();
            $i++;
            if ($ant->count() > 0){
                $bandera = true;
            }
        }

        return $bandera;
    }
}

//Check if the question sent has already been answered
if (!function_exists('questionExist')) {
    function questionExist(int $ask, object $data)
    {
        $i=0;
        $bandera = false;
        while(!$bandera &&  $i < $data->count()){
            if ($data[$i]->question_id == $ask){
                $bandera = true;
            }
            $i++;
        }

        return $bandera;
    }
}

//Check if the question sent has already been answered
if (!function_exists('getAnswerChoice')) {
    function getAnswerChoice(int $question, object $data)
    {
        $aux = $data[0]->survey_id;
        $resp = (Answer::where('survey_id', $aux)->where('question_id', $question)->get()->pluck('choice_id'));
        return $resp;
    }
}