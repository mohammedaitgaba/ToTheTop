<?php
class MessangerController extends Controller{
    private $messagesmodel;
    public function __construct()
    {
        $this->messagesmodel = $this->model('Messanger');
    }
    // send all message data to message model 
    public function AddMessage(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->messagesmodel->Newmessage($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }

    // get conversation info and data
    public function GetConversation(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->messagesmodel->GetConversations($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }

}