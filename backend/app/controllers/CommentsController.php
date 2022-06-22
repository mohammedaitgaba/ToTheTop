<?php
class CommentsController extends Controller
{

    private $CommentsModel;
    public function __construct()
    {
        $this->CommentsModel = $this->model('Comments');
    }
    // Create a new comment by user or admin
    public function NewComment(){
        $data = json_decode(file_get_contents("php://input")); 
        $result = $this->CommentsModel->AddComment($data);
        
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode('error');
        } 
    }

    // get all comments of users and admin
    public function GetComment(){
        $data = json_decode(file_get_contents("php://input"));
        $result =  $this->CommentsModel->GetComment($data);
        if ($result) {
            echo json_encode($result);
        }
        
    }

    //delete comment by id user and id post
    public function DeleteComment(){
        $data = json_decode(file_get_contents("php://input"));
        $result =  $this->CommentsModel->DeleteCommentById($data);
        if ($result) {
            echo json_encode("ok");
        } else {
            echo json_encode('error');
        } 
    }
}