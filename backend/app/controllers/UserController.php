<?php

use LDAP\Result;

class UserController extends Controller
{    private $userModel;
  
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    
    public function add_user(){
            $data = json_decode(file_get_contents("php://input"))->form;
            $result = $this->userModel->newUser($data);
            echo json_encode($result);

            // if($result){
            //     // echo json_encode(["message" => "success"]);
            // }else{
            //     // echo json_encode(["message" => "error not created"]);
            //     echo json_encode($result);
            // }
    }

    public function check_user(){
    
            $data = json_decode(file_get_contents("php://input")); 
            
            $result = $this->userModel->checkUser($data);
            if($result){
                if(password_verify($data->password,$result->password))
                {
                    echo json_encode(["data" =>$result]);
                }else{    
                    echo json_encode(["message1" => "Password invalid"]);
                }
            }else{
                echo json_encode(["message2" => "Invalid Email "]);
            }
    }
    public function GetRandUsers(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->getRandomUser($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
        
    }
    public function AddFreind(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->NewFreind($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }
    public function GetAllFriends(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->GetFriends($data);
        echo json_encode($result);
    }
    public function GetAllRequests(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->GetRequests($data);
        echo json_encode($result);
    }
    public function accept_friend(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->AcceptRequests($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
    }
    public function reject_friend(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->RejectRequests($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
    }
    
    public function GetUserById(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->GetUser($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
    }
    public function CountUserFriends(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->GetUserFriends($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
    }
    public function UpdateUserInfo(){
        $data = [
            'fullName' => $_POST['fullName'],
            'email' => $_POST['email'],
            'id' => $_POST['id']
        ];
        if (empty($_FILES['image'])) {
            $oldPic=$_POST['oldimage'];
            $result=$this->userModel->UpdateUser($oldPic,$data);
            if ($result) {
                echo json_encode(['message' => 'ok']);
            }
            else {
                echo json_encode(['message' => 'Error uploading file']);
            }
        } else {
            $Image = $_FILES['image']['name'];
    
            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            if (in_array($imageFileType, $extensions_arr)) {
                $file_name = uniqid('', true) . '.' . $imageFileType;
                $target_path = $file_name;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'C:\xampp\htdocs\ToTheTop\backend\public\imgUploaded\\' . $target_path)) {
                    $result=$this->userModel->UpdateUser($target_path,$data);
                    echo json_encode(['message' => 'ok']);
                } else {
                    echo json_encode(['message' => 'Error uploading file']);
                }
            }
        }
        
    }
    public function UserStatusOnline(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->UpdateStatusOnline($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
        
    }
    public function UserStatusOffline(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->UpdateStatusOffline($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
        
    }
    public function UnfriendUser(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->userModel->Unfriended($data);
        if ($result) {
            echo json_encode($result);
        }
        else{
            echo json_encode(['message'=> 'error']);
        }
    }

}