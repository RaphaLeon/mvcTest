<?php

class BaseModel extends BaseEntity{
    private $table;
    
    public function __construct($table) {
        $this->table = (string) $table;
        parent::__construct($table);
    }
    
    public function executeQuery($query) {
        $query = $this->getDb()->query($query);
        $resultSet;
        if($query) {
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            }elseif($query->num_rows==1){
                $resultSet = $query->fetch_object();
            }else{
                $resultSet = true;
            }
        }else{
            $resultSet = false;
        }
        return $resultSet;
    } 
    
}

?>