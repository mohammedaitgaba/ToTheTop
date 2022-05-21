<?php

class UserController extends Controller
{    private $userModel;
  
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    
    public function add_user(){
            $data = json_decode(file_get_contents("php://input"))->form;
            $result = $this->userModel->newUser($data);

            if($result){
                echo json_encode(["message" => "success"]);
            }else{
                echo json_encode(["message" => "error not created"]);
            }
    }

    public function check_user(){
    
            $data = json_decode(file_get_contents("php://input")); 
            $result = $this->userModel->checkUser($data);
            // var_dump($result);die;
            if($result){
                if(password_verify($data->password,$result->password))
                {
                    echo json_encode(["data" =>$result]);
                }else{    
                    echo json_encode(["message" => "you entred false info"]);
                }
            }else{
                echo json_encode(["message" => "you entred false info"]);
            }
    }
    public function GetRandUsers(){
        $result = $this->userModel->getRandomUser();
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
        
    }
    // public function getAllusers(){
       
    //         $result = $this->userModel->getAllusers(); 
    //         if($result){
    //             echo json_encode($result);
    //         }else{
    //             echo json_encode(["message" => "error"]);
    //         }
    // }
    // public function delete_user(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //         $id = json_decode(file_get_contents("php://input"), true); 
    //         $result = $this->userModel->delet_user($id);
    //         if($result){
    //             echo json_encode(["message" => "success","yoyo"=>$id]);
    //         }else{
    //             echo json_encode(["message" => "failed"]);
    //         }
    //     } 
    // }

    // public function getInfo(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $data = json_decode(file_get_contents("php://input"),true);
    //         $result = $this->userModel->getInfor($data);
    //         if($result){
    //             echo json_encode(["message" => "success","data"=> $result]);
    //         }else{
    //             echo json_encode(["message" => "error d'affichage"]);
    //         }
    //     }
    // }


    // public function updateinfo(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $data = json_decode(file_get_contents("php://input"),true);

    //         if($this->userModel->updateInfo($data)){
    //             echo json_encode(array(
    //                 "message"=>"done"
    //             ));
    //         }else{
    //             echo json_encode(["message" => "error"]);
    //         }

    //     }
    // }
}