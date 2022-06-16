<?php
class MessangerController extends Controller{
    private $messagesmodel;
    public function __construct()
    {
        $this->messagesmodel = $this->model('Messanger');
    }
    public function AddMessage()
    {
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->messagesmodel->Newmessage($data);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
        // var_dump($data);
        // $this->pusher->trigger('my-channel' , 'my-event', ['message' => $data]);
    }
    public function GetConversation(){
        $data = json_decode(file_get_contents("php://input"));
        $result = $this->messagesmodel->GetConversations($data);
        // $time = $result->Created_at;
        // foreach ($result as $res) {
        //    echo ($res->Created_at);
        // }
        // var_dump($time);
        // die;
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['message'=> 'error']);
        }
    }

}