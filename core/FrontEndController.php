<?php

class FrontEndController {
    
    protected $url;
    protected $controller;
    protected $defaultController = DEFAULT_CONTROLLER; //"user";
    protected $action;
    protected $defaultAction = DEFAULT_ACTION; //"index";
    protected $params = array();
    
    public function __construct($url)
    {
        $this->url = $url;
        
        $segments = explode('/', $this->getUrl());
        $this->resolveController($segments);
        $this->resolveAction($segments);
        $this->resolveParams($segments);
    }
    
    public function resolveController(&$segments)
    {
        $this->controller = array_shift($segments);
        
        if(empty($this->controller))
        {
            $this->controller = $this->defaultController;
        }
    }

    public function resolveAction(&$segments)
    {
        $this->action = array_shift($segments);
        
        if(empty($this->action))
        {
            $this->action = $this->defaultAction;
        }
    }
    
    public function resolveParams(&$segments)
    {
        $this->params = $segments;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    
    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
    
    public function getControllerClassName()
    {
        return Util::camel($this->getController())."Controller";
    }
    
    public function getControllerFileName()
    {
        return "controller/". $this->getControllerClassName() .".php";
    }
    
    public function getActionMethodName()
    {
        return Util::lowerCamel($this->getAction());
    }
    
    public function execute()
    {

        if(Util::checkSesion()) {

           /* if(!Util::sessionIsAlive()){
                Util::clearSession();
                echo "<script>
                        alert('session expired!');
                        window.location='".APP_PATH."/user/login';
                      </script>";
            }*/
            $controllerClassName = $this->getControllerClassName();
            $controllerFileName = $this->getControllerFileName();
            $actionMethodName = $this->getActionMethodName();
            $params = $this->getparams();
            
            if(!file_exists($controllerFileName))
            {
                exit("controller not found");
                /**
                 * instance a ErrorController or redirect to index
                 */
            }

            require $controllerFileName;
            
            $controller = new $controllerClassName();
            if(!method_exists($controller, $actionMethodName))
            {
                //$controller->index();
                exit("method not exists");
                /**
                 * call index method by $controller()
                 */
            }
            call_user_func_array([$controller, $actionMethodName], $params);    
        }else {
            require "controller/UserController.php";
            
            $controller = new UserController(); 
            $controller->login();  
        }
    }
    
    public function executeResponse($response)
    {
        if($response instanceof Response)
        {
            $response->execute();
        }
        elseif(is_string($response))
        {
            echo $response;
        }
        elseif(is_array($response))
        {
            echo json_encode($response);
        }
        else
        {
            exit('Invalid response');
        }
    }
}

?>