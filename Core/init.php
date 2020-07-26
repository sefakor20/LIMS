<?php

session_start();

set_exception_handler(function($exception){
    exit($exception->getMessage());
});


//require files
require_once dirname(__DIR__).'/Classes/Config.php';
require_once dirname(__DIR__).'/Classes/Database.php';
require_once dirname(__DIR__).'/Classes/Filter.php';
require_once dirname(__DIR__).'/Classes/DateFormat.php';
require_once dirname(__DIR__).'/Classes/Inputs.php';
require_once dirname(__DIR__).'/Classes/Fetch.php';
require_once dirname(__DIR__).'/Classes/Login.php';
require_once dirname(__DIR__).'/Classes/ClientLogin.php';
require_once dirname(__DIR__).'/Classes/Functions.php';
require_once dirname(__DIR__).'/vendor/autoload.php';