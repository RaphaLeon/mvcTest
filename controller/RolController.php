<?php

class RolController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($message = "") {
        
        $title = "Rol";
        $rol = new Rol();
        $rolList = $rol->getAll();
        $rolViews = $rol->getViewsByRol(1);
        $this->view2("rol",compact('title', 'rolList','rolViews','message'));
    }
    
    public function getViews() {
        $rolId = isset($_POST["rolId"]) ? $_POST["rolId"] : "";
        if(isset($rolId) && !empty($rolId)){
            $rol = new Rol();
            $result[] = array("code"=>"ok");
            $result[] = array("message"=>$rol->getViewsByRol($rolId)); 
            print_r(json_encode($result));
        }else{
            return "ERROR!";
        }
    }

    public function create()
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $description = isset($_POST["description"]) ? $_POST["description"] : "";
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

        if(!empty($name) && !empty($description)) {
            $rol = new Rol();

            $rol->setId($id);
            $rol->setName($name);
            $rol->setDescription($description);
            $rol->setStatus(1);

            $message = "Error";
            if($rol->save() == 1){
                $message = "Success";
            }
            $this->index($message);

        }
    }

    public function delete($id) {
        if(!empty($id)){
            $rol = new Rol();
            $message = "Error, rol not deleted";
            if($rol->delete($id) == 1){
                $message = "Rol successful deleted";
            }
            $this->index($message);
        }
    }
}

?>