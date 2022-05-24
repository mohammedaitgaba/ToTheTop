<?php
class CommentsController extends Controller
{

    private $CommentsModel;
    public function __construct()
    {
        $this->CommentsModel = $this->model('Comments');
    }
    public function NewComment(){
        $data = json_decode(file_get_contents("php://input")); 
        $result = $this->CommentsModel->AddComment($data);

        if ($result) {
            echo json_encode('Added');
        } else {
            echo json_encode('error');
        } 
    }
    public function GetComment(){
        $data = json_decode(file_get_contents("php://input"));
        $result =  $this->CommentsModel->GetComment($data);
        if ($result) {
            echo json_encode($result);
        }
        
    }
}