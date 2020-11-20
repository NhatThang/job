<?php

if(!function_exists('dd'))
{
    function dd($value) {
        var_dump($value);
        die();
    }
}

if (!function_exists('str'))
{
    function str($arr) {
        return implode(" ",$arr);
    }
}

if (!function_exists('redirect'))
{
    function redirect($path) {
        header('location:'.$path, true);
    }
}
?>