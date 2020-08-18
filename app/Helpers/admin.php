<?php



use App\Models\Answer;
use App\Models\Observation;
use App\Models\User;

//detects status (positive or negative) of the first admission of the follow-up
if (!function_exists('initialDiagnostic')) {
    function initialDiagnostic(array $data)
    {
        $resultado = 3;
        $level = 3;

        if(array_key_exists('126', $data)){
            if($data["126"] == 3){
                if (array_key_exists('128', $data)){
                    if($data["128"] == 182){
                        $resultado = 1;
                        $level = 1;
                        if(array_key_exists('131', $data)){
                            if($data["131"] == 182){
                                $resultado = 1;
                                $level = 1;
                            }elseif($data["131"] == 183){
                                $resultado = 3;
                                $level = 3;
                            }
                        }
                    }elseif($data["128"] == 183){
                        $resultado = 3;
                        $level = 2;
                        if(array_key_exists('135', $data)){
                            if($data["135"] == 182){
                                $resultado = 1;
                                $level = 1;
                            }elseif($data["135"] == 183){
                                $resultado = 3;
                                $level = 3;
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
                                        $resultado = 1;
                                        $level = 3;
                                    }elseif($data["142"] == 183){
                                        $resultado = 3;
                                        $level = 2;
                                        if(array_key_exists('135', $data)){
                                            if($data["135"] == 182){
                                                $resultado = 1;
                                                $level = 1;
                                            }elseif($data["135"] == 183){
                                                $resultado = 3;
                                                $level = 3;
                                            }
                                        }
                                    }
                                }
                            }elseif($data["139"] == 185){
                                if(array_key_exists('143', $data)){
                                    if($data["143"] == 182){
                                        $resultado = 1;
                                        $level = 1;
                                    }elseif($data["143"] == 183){
                                        $resultado = 3;
                                        $level = 3;
                                    }
                                }
                            }elseif($data["139"] == 186){
                                $resultado = 3;
                                $level = 3;
                            }
                        }
                    }
                }
            }
        }

        //Update result in user table
        $aux = User::where('id', auth()->user()->id)->update(['status'=>$resultado]);

        //Record in observations table
        if ($resultado == 1){
            $res = "Caso positivo para covid-19";
        }elseif($resultado == 3){
            $res = "Caso negativo para covid-19";
        }

        Observation::create([
            'user_id' => auth()->user()->id,
            'level_id' => $level,
            'observation' => $res,
        ]);
    }
}

