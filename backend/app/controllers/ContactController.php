<?php
class ContactController extends Controller{
    private $Contactmodel;
    public function __construct()
    {
        $this->Contactmodel = $this->model('Contact');
    }

    // send contact message 
    public function contact_us(){
        $data = json_decode(file_get_contents("php://input"),true);
        
        $result = $this->Contactmodel->contact($data);
        if ($result) {
            echo json_encode("ok");
        } else {
            echo json_encode('error');
        }
    }

    // get all contact us messages and show them in dushboard admin
    public function getAllContacts(){
        $result = $this->Contactmodel->get_all_contacts();
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
}