<?php
class AdminController extends Controller
{
    // public $data = [];
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }
    public function check_admin()
    {
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->adminModel->ValidAdmin($data);
        
        if($result){
            if($data->password === "admin_1234"){
                echo json_encode($result);
            }else{    
                echo json_encode(["message1" => "Password invalid"]);
            }
        }else{
            echo json_encode(["message2" => "Invalid Info "]);
        }
    }
    public function updateinfo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);

            if($this->adminModel->updateInfo($data)){
                echo json_encode(array(
                    "message"=>"done"
                ));
            }else{
                echo json_encode(["message" => "error"]);
            }

        }
    }
    public function GetInfoAdmin(){
        $result= $this->adminModel->get_info();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
    public function getNumberUser(){
        $result= $this->adminModel->get_users_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
    public function getNumberPosts(){
        $result= $this->adminModel->get_Posts_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
    public function getNumberComments(){
        $result= $this->adminModel->get_comments_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
    public function getAllUsers(){
        $result= $this->adminModel->getUsers();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
    public function DeleteUserById(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->adminModel->DeleteUser($data);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
 
    
}
