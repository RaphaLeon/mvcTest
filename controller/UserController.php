<?php

class UserController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($message = "") {
        $user = new User();
        $rol = new Rol();
        $userList = $user->getAllData();
        $rolList = $rol->getAll();  
        $this->view2("user",array("userList"=>$userList,
                                  "rolList" =>$rolList,
                                  "title"   =>"User",
                                  "message" =>$message));
        //$this->view("index");
    }
    
    public function create() {
        if(isset($_POST["name"])){
            $user = new User();
            
            $user->setRolId((int)$_POST["rolId"]);
            $user->setName($_POST["name"]);
            $user->setPassword($_POST["password"]);
            $user->setStatus(1);
            
            $user->save();
        }
        $this->index("Successful create!");
        //$this->redirect2("User","index",array("message"=>"Successful create!"));
    }

    public function update($id, $rolId, $name){
        $userEdit = new User();
        $userEdit->setId = $id;
        $userEdit->setRolId = $rolId;
        $userEdit->setName = $name;
        $this->view2("user", array("userEdit"=>$userEdit));
    }
    
    public function delete($id) {
        if(!empty($id)){
            $user = new User();
            $user->delete($id);
        }
        $this->index("Successful delete!");
    }

    public function delete2() {
        if(isset($_POST["id"])){
            $user = new User();
            $id = (int)$_POST["id"];
            $user->delete($id);
            $this->index("Successful delete!");
            //return json_encode(array("message"=>"Successful delete"));
        }
    }

    public function getUserList(){
        $user = new User();
        echo $this->view2("userList", array('userList' => $user->getAllData()));
    }

    public function login(){

        if(Util::checkSesion()) {
            $this->redirect("User","index");
        }
        $user = new User();
        $name = isset($_POST["login"]) ? $_POST["login"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        if(!empty($user) && !empty($password)){
            $logedUser = $user->login($name, $password);
            if($logedUser != null){
                $_SESSION["logedUser"] = $logedUser;
                Util::setSessionTimeOut();
                //$_SESSION["sessionExpire"] = time()+(SESSION_TIMEOUT);
                $this->redirect("User","index");
            }else{
                $this->view("login", array("error"=>"login or password invalid."));
            }    
        }else{
            $this->view("login");
        }    
    }

    public function logout(){
        //session_destroy();
        Util::clearSession();
        $this->view("login");
    }
}

?>