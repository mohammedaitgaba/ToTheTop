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
    
    public function CheckUserLike(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->Reactmodel->CheckLike($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }
    public function CheckUserClap(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->Reactmodel->CheckClap($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }

    public function AddClap (){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->Reactmodel->addClaps($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }
    public function CountClpas(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->Reactmodel->CountClpas($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }

}