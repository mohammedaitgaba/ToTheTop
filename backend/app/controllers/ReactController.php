<?php
class ReactController extends Controller{
    private $Reactmodel;
    public function __construct()
    {
        $this->Reactmodel = $this->model('React');
    }
    public function AddLike (){
        $data = json_decode(file_get_contents("php://input"));

        $result = $this->Reactmodel->addLike($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }
    public function LikesCounter(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->Reactmodel->CountLikes($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }
    // public function DeletLike(){
    //     $data = json_decode(file_get_contents("php://input"));
    //     $result = $this->Reactmodel->DeletPostsLike($data);
    //     if ($result) {
    //         echo json_encode($result);
    //     } else {
    //         echo json_encode(['message'=> 'error']);
    //     }
    // }
    // public function CheckUserLike(){
    //     $data = json_decode(file_get_contents("php://input"));
    //     $result = $this->Reactmodel->CheckLike($data);
    //     if ($result) {
    //         echo json_encode($result);
    //     } else {
    //         echo json_encode(['message'=> 'error']);
    //     }
    // }

}