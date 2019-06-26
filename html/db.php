<?php
function getConnectionDB(){
    try {
        $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
    }
    catch(Exception $e)
    {
        die ("Connection mysql failed: ". $e->getMessage());
    }
    $db->exec("SET NAMES utf8;");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}
