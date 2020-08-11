<?php

if (!function_exists('is_positive')) {
    function is_positive(string $answer)
    {
        if ($answer == 'Si') {
            return 'POSITIVO';
        }
        return 'NEGATIVO';
    }
}