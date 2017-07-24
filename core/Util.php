<?php

class Util {
    
    public static function camel($value)
    {
        $segments = explode('-', $value);
        
        array_walk($segments, function(&$item){
            $item = ucfirst($item);
        });
        
        return implode('', $segments);
    }
    
    public static function lowerCamel($value)
    {
        return lcfirst(static::camel($value));
    }

    public static function sessionExists() 
    {
        return session_status() == 2 ? TRUE : FALSE;
    }

    public static function isLogedUser() 
    {
        return (session_status() == 2 && isset($_SESSION["logedUser"])) ? TRUE : FALSE;
    }

    public static function setSessionTimeOut($time = SESSION_TIMEOUT) 
    {
        if(static::sessionExists()){
            $_SESSION["sessionExpire"] = time()+($time);
        }
    }

    public static function sessionIsAlive() 
    {
        if(static::sessionExists() && isset($_SESSION["sessionExpire"])){
            $currentTime = time();
            return $currentTime < $_SESSION["sessionExpire"] ? TRUE : FALSE;
        }
    }

    public static function checkSesion() 
    {
        if(SESSION_REFRESH_ON_REQUEST && static::sessionIsAlive()){           
           Util::setSessionTimeOut();
        }
        
        return static::isLogedUser() && static::sessionIsAlive() ? TRUE : FALSE;
    }

    public static function clearSession()
    {
        if(static::sessionExists()) 
        {
            unset($_SESSION["logedUser"]);
            unset($_SESSION["sessionExpire"]);
            session_destroy();
        }
    }

}

?>