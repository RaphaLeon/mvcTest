<?php

class User extends BaseEntity {
     
     private $id;
     private $rolId;
     private $name;
     private $password;
     private $status;
     
     public function __construct() {
        parent::__construct("User");
     }
     
     public function save() {
        $query = "INSERT INTO ".$this->getTable()."(rolId,name,password,status)
                  VALUES(".$this->getRolId().",
                        '".$this->getName()."',
                        '".$this->getPassword()."',
                        '".$this->getStatus()."');";
        return $this->getDb()->query($query);
     }
     
     public function getAllData() {
        $rol = new Rol();
        $query = "SELECT u.id, u.rolId, u.name, r.name as 'rol' FROM ".$this->getTable().
                 " u JOIN ".$rol->getTable().
                 " r ON u.rolId = r.id;";
        $result = $this->getDb()->query($query);
        while($row = $result->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;         
     }
     
     public function login($name, $password) {
        $query = "SELECT id, rolId, name, password, status FROM ".$this->getTable()." WHERE name='".$name."' AND password='".$password."';";
        $result = $this->getDb()->query($query);
        if($result->num_rows == 1){
            return $result->fetch_object();
        }else {
            return null;
        }
     }

     public function setId($id){
        $this->id = $id;
     }
     
     public function setRolId($rolId){
        $this->rolId = $rolId;
     }
     
     public function setName($name){
        $this->name = $name;
     }
     
     public function setPassword($password){
        $this->password = $password;
     }
     
     public function setStatus($status){
        $this->status = $status;
     }
     
     public function getId() {
        return $this->id;
     }
     
     public function getRolId() {
        return $this->rolId;
     }
     
     public function getName() {
        return $this->name;
     }
     
     public function getPassword() {
        return $this->password;
     }
     
     public function getStatus() {
        return $this->status;
     }
}

?>