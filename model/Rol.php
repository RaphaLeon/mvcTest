<?php

class Rol extends BaseEntity {
    private $id;
    private $name;
    private $description;
    private $status;
    
    public function __construct() {
       $table = "Rol";
       parent::__construct($table);
    }
   
    public function save(){
      if(empty($this->getId())) {
        $query = "INSERT INTO ". $this->getTable()."(name,description,status)
                  VALUES('".$this->getName()."',
                         '".$this->getDescription()."',
                         '".$this->getStatus()."');";
      } else{
        $query = "UPDATE ". $this->getTable()." SET 
                  name='".$this->getName()."',
                  description='".$this->getDescription()."'
                  WHERE id =".$this->getId().";";
      }
       $this->getDb()->query($query);
       return mysqli_affected_rows($this->getDb());
    }

    public function getViewsByRol($id){
      $query = "SELECT rv.rolId, rv.viewId, v.name as 'name', v.url as 'url' 
                FROM View AS v 
                  JOIN  Rol_View AS rv ON v.id = rv.viewId 
                  JOIN Rol AS r ON r.id = rv.rolId 
                WHERE r.id = $id;";
      $result = $this->getDb()->query($query);

      $resultSet = [];
      while($row = $result->fetch_object()) {
          $resultSet[] = $row;
      }
      return $resultSet;
    }

    public function setId($id){
       $this->id = $id;
    }
    
    public function setName($name){
       $this->name = $name;
    }
    
    public function setDescription($description){
       $this->description = $description;
    }
    
    public function setStatus($status){
       $this->status = $status;
    }
    
    public function getId() {
       return $this->id;
    }
    
    public function getName() {
       return $this->name;
    }
    
    public function getDescription() {
       return $this->description;
    }
    
    public function getStatus() {
       return $this->status;
    }
}

?>