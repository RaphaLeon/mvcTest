<?php
class BaseController {
    
    public function __construct() {
        require_once "BaseEntity.php";
        require_once "BaseModel.php";
        
        //including all models
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    public function view($view, $ars = array()) {
        extract($ars);
        require_once "Helper.php";
        $helper = new Helper();
        require "view/".$view."View.php";
    }

    public function view2($view, $vars = array()) {
        
        call_user_func(function() use ($view, $vars){
            extract($vars);
            ob_start();
            
            require "view/".$view."View.php";
            
            $tplContent = ob_get_clean();
            require_once "view/layout.tpl.php";
        });
    }
    
    public function redirect($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION) {
        header("Location: ".APP_PATH."/".$controller."/".$action);
        exit();
    }

    public function redirect2($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION, $vars = array()) {
        $params = implode("/", $vars);
        header("Location: http://localhost/mvcTest/".$controller."/".$action."/".$params);
       //die();
    }
}
?>