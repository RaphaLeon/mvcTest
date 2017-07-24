<?php

class BaseEntity {
    private $table;
    private $db;
    private $connector;
    
    public function __construct($table) {
        $this->table = (string) $table;
        require_once "Connection.php";
        $this->connector = new Connection();
        $this->db = $this->connector->connect(); 
    }
    
    public function getConnector() {
        return $this->connector;
    }
    
    public function getDb() {
        return $this->db;
    }
    
    public function getTable() {
        return $this->table;
    }
    
    public function getAll() {
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        
        $resultSet = [];
        while($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    
    public function getById($id) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id ='$id'");
        
        $resultSet;
        if($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }
    
    public function getBy($column, $value) {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column = '$value'");
        
        $resultSet = [];
        foreach($query->fetch_object() as $row) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    
    public function delete($id) {
        $query = $this->db->query("DELETE FROM $this->table WHERE id = '$id'");
        //return $query;
        return mysqli_affected_rows($this->getDb());
    }

    public function deleteBy($column, $value) {
        $query = $this->db->query("DELETE FROM $this->table WHERE $column = '$value'");
        return $query;
    }    
}

?>