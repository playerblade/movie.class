<?php
/**
 * Created by PhpStorm.
 * User: jarda
 * Date: 18.6.2019
 * Time: 2:12
 */

function debug($data){
    echo "<pre>";
    print_r($data);
    die;
}

function dd($data){ debug($data); }

function view($template, $data = []){
    extract($data);
    include "./Core/views/app.php";
}

function redirect($link){
    header("location: $link");
    die;
}
function isChecked($varible , $value)
{
    if (!empty($varible) && $varible[$column] == $value)
        return "checked";
    else
        return "algo salio mal";
}
