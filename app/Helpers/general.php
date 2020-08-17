<?php

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        
        $data = (object) $data;
        while(!$bandera &&  $i < $data->count()){
            $ant = DB::table('question_section')->where ('section_id', $section)->where('question_id', $data[$i]->question_id)->get();
            $i++;
            $ant = (object) $ant;
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

//Check if the question sent has already been answered
if (!function_exists('getAnswerText')) {
    function getAnswerText(int $question, object $data)
    {
        $aux = $data[0]->survey_id;
        $resp = (Answer::where('survey_id', $aux)->where('question_id', $question)->pluck('text')->first());
        return  $resp;
    }
}

//verifies whether the survey has already started
if (!function_exists('searchSurvey')) {
    function searchSurvey()
    {
        $resp = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', 6)->count());
        if ($resp > 0) {
            $bandera = true;
        } else {
            $bandera = false;
        }
        return $resp;
    }
}

//returns the section with which the edition starts
if (!function_exists('searchSurvey')) {
    function searchSurvey()
    {
        $resp = (Survey::where('surveyed_id', auth()->user()->id)->where('header_id', 6)->count());
        if ($resp > 0) {
            $bandera = true;
        } else {
            $bandera = false;
        }
        return $resp;
    }
}


//verifies whether or not that question already has an answer to add
if (!function_exists('existAnswer')) {
    function existAnswer(int $questionId, string $survey):bool
    {
        $resp = (Answer::where('survey_id', $survey)->where('question_id', $questionId)->where( function($query) {
            $query->where('choice_id', '<>', '')->orWhere('text', '<>', '');
            })->count());

        if ($resp > 0) {
            $bandera = true;
        } else {
            $bandera = false;
        }

        return $bandera;
    }
}

//check the type of field, true if it is choice and false if it is a text
if (!function_exists('questionHasChoices')) {
    function questionHasChoices(int $questionId):bool
    {
        $question = Question::find($questionId);
        if ($question->input_type_id == 8){
            $bandera = true;
        }else{
            $bandera = false;
        }
        return $bandera;
    }
}

//check the type of field, true if it is choice and false if it is a text
if (!function_exists('lastAnswer')) {
    function lastAnswer(int $previous, object $data):bool
    {
        $aux = $data[0]->survey_id;
        $ant = Answer::where('survey_id', $aux)->where( function($query) {
            $query->where('choice_id', '<>', '')->orWhere('text', '<>', '');
        })->OrderBy('id', 'desc')->first();

        if ($ant->question_id == $previous){
            $bandera = true;
        }else{
            $bandera = false;
        }
        return $bandera;
    }
}
