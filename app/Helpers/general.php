<?php

if (!function_exists('setActive')) {
    function setActive(string $path, string $class_name = "active")
    {
        return Request::url() === $path ? $class_name : "";
    }
}
