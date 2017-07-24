<?php

class UserModel extends BaseModel{
    
    private $table;
    
    public function __construct() {
        $this->table = "User";
        parent::__construct($table);
    }
    
    public function getUser() {
        $query = "SELECT * FROM User WHERE id = '2'";
        $user = $this->executeQuery($query);
        return $user;
    }
}

?>