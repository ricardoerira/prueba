<?php



use App\Models\Answer;

//detects status (positive or negative) of the first admission of the follow-up
if (!function_exists('initialDiagnostic')) {
    function initialDiagnostic(array $data)
    {
        $resultado = "negativo";

        if(array_key_exists('126', $data)){
            if($data["126"] == 3){
                if (array_key_exists('128', $data)){
                    if($data["128"] == 182){
                        $resultado = "positivo";
                        if(array_key_exists('131', $data)){
                            if($data["131"] == 182){
                                $resultado = "positivo";
                            }elseif($data["131"] == 183){
                                $resultado = "negativo";
                            }
                        }
                    }elseif($data["128"] == 183){
                        $resultado = "negativo";
                        if(array_key_exists('135', $data)){
                            if($data["135"] == 182){
                                $resultado = "positivo";
                            }elseif($data["135"] == 183){
                                $resultado = "negativo";
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
                                        $resultado = "positivo";
                                    }elseif($data["142"] == 183){
                                        $resultado = "negativo";
                                        if(array_key_exists('135', $data)){
                                            if($data["135"] == 182){
                                                $resultado = "positivo";
                                            }elseif($data["135"] == 183){
                                                $resultado = "negativo";
                                            }
                                        }
                                    }
                                }
                            }elseif($data["139"] == 185){
                                if(array_key_exists('143', $data)){
                                    if($data["143"] == 182){
                                        $resultado = "positivo";
                                    }elseif($data["143"] == 183){
                                        $resultado = "negativo";
                                    }
                                }
                            }elseif($data["139"] == 186){
                                $resultado = "negativo";
                            }
                        }
                    }
                }
            }
        }
        return $resultado;
    }
}

