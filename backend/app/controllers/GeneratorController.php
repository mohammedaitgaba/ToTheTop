<?php
class GeneratorController extends Controller
{
    private $GeneratorModel;

    public $data=[];

    public function __construct()
    {
        $this->GeneratorModel = $this->model('Generators');
    }

    // get one Quote randomly
    public function generateQuote(){
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->GeneratorModel->generate($data);
        if($result){
            echo json_encode($result);
        }else{
            echo json_encode(["message" => "error"]);
        }
    }
}