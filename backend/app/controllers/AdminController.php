<?php
class AdminController extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }
// check data of admin if exist
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
// get admin info 
    public function GetInfoAdmin(){
        $result= $this->adminModel->get_info();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

// get the number of users for statistics
    public function getNumberUser(){
        $result= $this->adminModel->get_users_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

// get the number of Posts for statistics
    public function getNumberPosts(){
        $result= $this->adminModel->get_Posts_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

// get the number of Comments for statistics
    public function getNumberComments(){
        $result= $this->adminModel->get_comments_num();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

// get all users 
    public function getAllUsers(){
        $result= $this->adminModel->getUsers();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

//delete a user in dushboard By id
    public function DeleteUserById(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->adminModel->DeleteUser($data);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }

// Delete contact messages 
    public function DeleteMessageById(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->adminModel->DeleteMessage($data);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
 
    
}
