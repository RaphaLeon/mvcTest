<?php
    //init session to handled loged user
    session_start();
    //load all necesaries resources
    require_once "config/global.php";
    require_once "core/BaseController.php";
    require_once "core/Util.php";
    require_once "core/FrontEndController.php";


    $url = empty($_GET["url"]) ? "" : $_GET["url"];
    $controller = new FrontEndController($url); 
    $controller->execute();
    
?>