<?php
class PostsController extends Controller{
    private $Postsmodel;
    public function __construct()
    {
        $this->Postsmodel = $this->model('Posts');
    }
    public function AddNewPosts(){
        // $data = [
        //     'title' => $_POST['title'],
        //     'description' => $_POST['description'],
        //     'id'=>$_POST['id']
        // ];
        // $Image = $_FILES['image']['name'];
        //     $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
        //     $extensions_arr = array("jpg", "jpeg", "png", "gif");
        //     if (in_array($imageFileType, $extensions_arr)) {
        //         $file_name = uniqid('', true) . '.' . $imageFileType;
        //         $target_path = $file_name;
                
        //         if (move_uploaded_file($_FILES['image']['tmp_name'], 'C:\xampp\htdocs\ToTheTop\backend\public\imgUploaded\\' . $target_path)) {
        //             $result=$this->Postsmodel->CreatePost($target_path,$data);
        //             echo json_encode(['message' => 'ok']);
        //         } else {
        //             echo json_encode(['message' => 'Error uploading file']);
        //         }
        //     }
        
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'id' => $_POST['id']
            ];
            $Image = $_FILES['image']['name'];
            $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "jpeg", "png", "gif");
            if (in_array($imageFileType, $extensions_arr)) {
                $file_name = uniqid('', true) . '.' . $imageFileType;
                $target_path = $file_name;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'C:\xampp\htdocs\ToTheTop\backend\public\imgUploaded\\' . $target_path)) {
                    $result=$this->Postsmodel->CreatePost($target_path,$data);
                    echo json_encode(['message' => 'ok']);
                } else {
                    echo json_encode(['message' => 'Error uploading file']);
                }
            }
        


        
    }

    public function GetAllPosts(){
        $result=$this->Postsmodel->getposts();
        if ($result){
            echo json_encode($result);
        } else {
            echo json_encode(['data'=>'error']);
        }
        
    }
    public function UpdatePost(){
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'id' => $_POST['id_post']
        ];
        $Image = $_FILES['image']['name'];
        var_dump($_FILES['image']);die;

        $imageFileType = strtolower(pathinfo($Image, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr)) {
            $file_name = uniqid('', true) . '.' . $imageFileType;
            $target_path = $file_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], 'C:\xampp\htdocs\ToTheTop\backend\public\imgUploaded\\' . $target_path)) {
                $result=$this->Postsmodel->UpdatePost($target_path,$data);
                echo json_encode(['message' => 'ok']);
            } else {
                echo json_encode(['message' => 'Error uploading file']);
            }
        }
    }
    public function GetPostsByIdMaker(){
        $data = json_decode(file_get_contents("php://input"));
        $result=$this->Postsmodel->GetpostsById($data);
        if ($result){
            echo json_encode($result);
        } else {
            echo json_encode(['data'=>'error']);
        }
    }
    public function CountPostsByIdUser(){
        $data = json_decode(file_get_contents("php://input"));
        $result=$this->Postsmodel->CountUserPosts($data);
        if ($result){
            echo json_encode($result);
        } else {
            echo json_encode(['data'=>'error']);
        }
    }
}