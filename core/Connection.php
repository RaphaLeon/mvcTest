<?php

class Connection {
    private $driver;
    private $user;
    private $host;
    private $password;
    private $dataBase;
    private $charset;
    
    public function __construct() {
        extract(require "config/Database.php");
        $this->driver = $driver;
        $this->user = $user;
        $this->host = $host;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
    }
    
    public function connect() {
        if($this->driver=="mysql" || $this->driver==null) {
            $con=new mysqli($this->host, $this->user, $this->password, $this->database);
            $con->query("SET NAMES '".$this->charset."'");
        }
        return $con;
    }
    
}


?>