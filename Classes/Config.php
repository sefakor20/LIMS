<?php

//create connection to the database
try{
    $connection = new PDO('mysql:dbname=landmmis;host=localhost', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
    die($e->getMessage);
}

error_reporting(0);