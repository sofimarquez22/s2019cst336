<?php

$dbname = 'ottermart';// default dbname
function getDatabaseConnection($dbname){
    $host = 'localhost'; //cloud 9
    $username = 'blancamarquez';
    $password = '';
    
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>