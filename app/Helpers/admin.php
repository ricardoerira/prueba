<?php



use App\Models\Answer;
use App\Models\Observation;
use App\Models\User;

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
            $res = "Caso positivo para covid-19";
        }elseif($resultado[0] == 3){
            $res = "Caso negativo para covid-19";
        }

        //Record in observations table
        Observation::create([
            'user_id' => auth()->user()->id,
            'level_id' => $resultado[1],
            'observation' => $res,
        ]);
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
            $detail = "Caso positivo para covid-19";
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