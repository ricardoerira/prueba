<?php



use App\Models\Answer;
use App\Models\Choice;
use App\Models\Observation;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use App\Models\workArea;
use Illuminate\Support\Facades\DB;

//detects status (positive or negative) of the first admission of the follow-up
if (!function_exists('initialDiagnostic')) {
    function initialDiagnostic(array $data)
    {
        if(array_key_exists('126', $data)){
            if($data["126"] == 3){
                if (array_key_exists('128', $data)){
                    if($data["128"] == 182){
                        $resultado =getResult(128, $data, "positivo", 0);
                        if(array_key_exists('131', $data)){
                            if($data["131"] == 182){
                                $resultado = getResult(131, $data, "positivo", 0);
                            }elseif($data["131"] == 183){
                                $resultado = getResult(131, $data, "negativo", 0);
                            }
                        }
                    }elseif($data["128"] == 183){
                        $resultado = $resultado =getResult(128, $data, "negativo", 0);
                        if(array_key_exists('135', $data)){
                            if($data["135"] == 182){
                                $resultado = getResult(135, $data, "positivo", 0);
                            }elseif($data["135"] == 183){
                                $resultado = getResult(135, $data, "negativo", 0);
                            }
                        }
                    }
                }
            }elseif($data["126"] == 4){
                if(array_key_exists('127', $data)){
                    if($data["127"] == 3){
                        if(array_key_exists('139', $data)){
                            if($data["139"] == 184){
                                if(array_key_exists('142', $data)){
                                    if($data["142"] == 182){
                                        $resultado = getResult(142, $data, "positivo", 0);
                                    }elseif($data["142"] == 183){
                                        $resultado = getResult(142, $data, "negativo", 0);
                                        if(array_key_exists('135', $data)){
                                            if($data["135"] == 182){
                                                $resultado = getResult(135, $data, "positivo", 0);
                                            }elseif($data["135"] == 183){
                                                $resultado = getResult(135, $data, "negativo", 0);
                                            }
                                        }
                                    }
                                }
                            }elseif($data["139"] == 185){
                                if(array_key_exists('143', $data)){
                                    if($data["143"] == 182){
                                        $resultado = getResult(143, $data, "positivo", 0);
                                    }elseif($data["143"] == 183){
                                        $resultado = getResult(143, $data, "negativo", 0);
                                    }
                                }
                            }elseif($data["139"] == 186){
                                $resultado = getResult(139, $data, "negativo", 0);
                            }
                        }
                    }
                }
            }
        }

        //Update result in user table
        $aux = User::where('id', auth()->user()->id)->update(['status'=>$resultado[0]]);


        if ($resultado[0] == 1){
            $res = "Caso positivo covid-19";
        }elseif($resultado[0] == 3){
            $res = "Caso negativo covid-19";
        }

        //Record in observations table
        Observation::create([
            'user_id' => auth()->user()->id,
            'level_id' => $resultado[1],
            'observation' => $res,
        ]);

        $noti =[
            'user_id' => auth()->user()->id,
            'level_id' => $resultado[1],
            'observation' => $res,
        ];
        return $noti;
    }
}

if (!function_exists('continuityNotification')) {
    function continuityNotification(array $data)
    {
        $previous = user::where('id', auth()->user()->id) -> get()->pluck('status');
        $previous = $previous[0];
        if(array_key_exists('131', $data)){
            if($data["131"] == 182){
                $resultado = getResult(131, $data, "positivo", $previous);
            }elseif($data["131"] == 183){
                $resultado = getResult(131, $data, "negativo", $previous);
            }
        }elseif(array_key_exists('135', $data) && !array_key_exists('142', $data)){
            if($data["135"] == 182){
                $resultado = getResult(135, $data, "positivo", $previous);
            }elseif($data["135"] == 183){
                $resultado = getResult(135, $data, "negativo", $previous);
            }
        }elseif(array_key_exists('142',$data)){
            if($data["142"] == 182){
                $resultado = getResult(142, $data, "positivo", $previous);
            }elseif($data["142"] == 183){
                $resultado = getResult(142, $data, "negativo", $previous);
                if(array_key_exists('135', $data)){
                    if($data["135"] == 182){
                        $resultado = getResult(135, $data, "positivo", $previous);
                    }elseif($data["135"] == 183){
                        $resultado = getResult(135, $data, "negativo", $previous);
                    }
                }
            }elseif(array_key_exists('143',$data)){
                if($data["143"] == 182){
                    $resultado = getResult(143, $data, "positivo", $previous);
                }elseif($data["143"] == 183){
                    $resultado = getResult(143, $data, "negativo", $previous);
                }
            }
        }
        
        //Update result in user table
        $aux = User::where('id', auth()->user()->id)->update(['status'=>$resultado[0]]);
        
        if ($resultado[2]=="nuevo"){
            $detail = "Caso positivo covid-19";
        }elseif($resultado[2]=="recuperado"){
            $detail = "Caso recuperado de covid-19";
        }elseif($resultado[2]=="continua"){
            if($resultado[0] == 1){
                $aux1 = "positivo";
            }else{
                $aux1 = "negativo";
            }
            if ($resultado[3] == 131){
                $detail = "Continua "+$aux1+" tras prueba dia 14";
            }elseif ($resultado[3] == 135){
                $detail = "Continua ".$aux1." tras prueba 48 o 72h";
            }
        }

        //Record in observations table
        Observation::create([
            'user_id' => auth()->user()->id,
            'level_id' => $resultado[1],
            'observation' => $detail,
        ]);

        $noti = [
            'user_id' => auth()->user()->id,
            'level_id' => $resultado[1],
            'observation' => $detail,
        ];
        return $noti;

    }
}



if (!function_exists('getResult')) {
    function getResult(int $question, array $data, string $resp, int $previous)
    {
        $detail = "";
        $resultado = 3;
        $level = 3;
        if($resp == "positivo"){
            $resultado = 1;
            $level = 1;
            if($previous <> 0){
                if($previous == $resultado){
                    $detail = "continua";
                }else{
                    $detail = "nuevo";
                }
            }
        }elseif($resp == "negativo"){
            $resultado = 3;
            if ($question == 128 || $question == 142){
                $level = 2;
            }else{
                $level = 3;
            }
            if($previous <> 0){
                if($previous == $resultado || $previous == 2){
                    $detail = "continua";
                }else{
                    $detail = "recuperado";
                    $resultado = 2;
                }
            }
        }

        return(array($resultado, $level, $detail, $question));
    }
}


if (!function_exists('checkPathology')) {
    function checkPathology(string $idSurvey)
    {
        $pathology = false;
        for ($i = 44; $i<63; $i++){

                $aux = Answer::where('survey_id', $idSurvey)->where('question_id', $i)->where('choice_id', 3)->get();

            if($aux->count() > 0){
                $pathology = true;
            }
        }
       /* $aux = Answer::where('survey_id', $idSurvey)->where('question_id', 63)->where('text', '<>', null)->pluck('text')[0];
        dd($aux);
        if($aux <> 'No' || $aux <> 'no' || $aux <> 'N0'|| $aux <> 'ninguna' || $aux <> 'Ninguna' || $aux <> 'NINGUNA' || $aux <> 'N/A' || $aux <> 'n/a' ){
            $pathology = true;
        }*/

        return $pathology;
    }
}


if (!function_exists('healthFilter')) {
    function healthFilter(string $surveyId)
    {
                $text = "";
                $resp = "Si";
                $mayor = (Answer::where('survey_id', $surveyId)->where('question_id', 19)->where('text', '>', 60))->first();
                $pathology = checkPathology($surveyId);
                $discapacidad = Answer::where('survey_id', $surveyId)->where('question_id', 23)->where('choice_id', 3)->OrderBy('created_at', 'desc')->first();
                $cuidador = Answer::where('survey_id', $surveyId)->where('question_id', 43)->where('choice_id', 3)->OrderBy('created_at', 'desc')->first();
                $infancia = Answer::where('survey_id', $surveyId)->where('question_id', 36)->where('text', '>' , 0)->OrderBy('created_at', 'desc')->where( function($query) {
                    $query->orWhere('question_id', 37)->Where('text', '>' , 0);
                })->first();
                $lactante = Answer::where('survey_id', $surveyId)->where('question_id', 41)->where('text', '>' , 0)->OrderBy('created_at', 'desc')->first();
                $adulto = Answer::where('survey_id', $surveyId)->where('question_id', 42)->where('text', '>' , 0)->OrderBy('created_at', 'desc')->first();  
                
                    if($discapacidad != null){
                        $text = "Discapacidad";
                        $resp = "No";
                    }
                    if($mayor != null){
                        $text = $text.", adulto mayor";
                        $resp = "No";
                    }
                    if($pathology){
                        $text = $text.", enfermedad inmunologica";
                        $resp = "No";
                    }
                    if($cuidador != null){
                        $text = $text.", cuidador";
                        $resp = "No";
                    }
                    if($infancia != null){
                        $text = $text.", niños en edad de escolarizacion";
                        $resp = "No";
                    }
                    if($lactante != null){
                        $text = $text.", persona lactante";
                        $resp = "No";
                    }
                    if($adulto != null){
                        $text = $text.", convive adulto mayor";
                        $resp = "No";
                    }
                $array = array(
                    "resp" => $resp,
                    "texto" => $text,
                );
            return $array;
    }
}

if (!function_exists('correctText')) {
    function correctText(string $txt)
    {
        if ($txt <> ""){
            if($txt[0] == ','){
                $txt = substr($txt, 2);
            }
        }
        return ucfirst($txt);
    }
}

if (!function_exists('listHealthFilter')) {
    function listHealthFilter(array $data)
    {
        $i = 0;
        $t = 0;
        $dataP = null;
        if($data[0] != null){
            foreach($data as $index){
                $user = User::where('id', Survey::where('id', $index)->pluck('surveyed_id')[0])->get();
                $aux = healthFilter($index);
                    $dataP[$i] = [
                        'id' => $user[0]->id,
                        'name' => Answer::where('survey_id', $index)->where('question_id', 17)->pluck('text')[0],
                        'cargo' => Answer::where('survey_id', $index)->where('question_id', 29)->pluck('text')[0],
                        'vinculacion' => Choice::where('id', Answer::where('survey_id', $index)->where('question_id', 28)->pluck('choice_id')[0])->pluck('name')[0],
                        'observacion' => correctText($aux['texto']),
                        'trabaja' => $aux['resp'],
                    ];
                    $i++;
             }
        }
        
        return $dataP;
    }
}

if (!function_exists('typeOfNotification')) {
    function typeOfNotification(string $text)
    {
        $color = 'warning'; 
        if($text == 'Caso positivo covid-19'){
            $color = 'danger';
        }elseif($text == 'Persona alto riesgo'){
            $color = 'primary';
        }elseif($text == 'antiguo'){
            $color = 'secondary';
        }

        return $color;
    }
}

//verifies if another person can enter the area and in any case updates the current capacity
if (!function_exists('checkCapacity')) {
    function checkCapacity(int $area)
    {
        $resp = false;
        $actual = workArea::where('id', $area)->pluck('current_capacity')[0];
        $perm = workArea::where('id', $area)->pluck('permitted_capacity')[0];
        if ($actual < $perm){
            DB::table('work_areas')->where('id', $area)->increment('current_capacity');
            $resp = true;
        }
        return $resp;
    }
}


//Output capacity upgrade
if (!function_exists('outputCapacity')) {
    function outputCapacity(int $area)
    {
        $actual = workArea::where('id', $area)->pluck('current_capacity')[0];
        if ($actual > 0){
            DB::table('work_areas')->where('id', $area)->decrement('current_capacity');
        }
    }
}


