<?php

function loadController($controller) {
    $controller = ucwords($controller)."Controller";
    $fileController = "controller/".$controller.".php";
    
    if(!is_file($fileController)){
        "controller/".ucwords(DEFAULT_CONTROLLER)."Controller.php";
    }
    require_once $fileController;
    return new $controller();
}

function loadAction($controller, $actionName) {
    $action = $actionName;
    $controller->$action();
}

function executeAction($controller){
    if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])){
        loadAction($controller, $_GET["action"]);
    }else{
        loadAction($controller, DEFAULT_ACTION);
    }
}

?>