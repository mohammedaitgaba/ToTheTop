<?php
class PostsController extends Controller{
    private $Postsmodel;
    public function __construct()
    {
        $this->Postsmodel = $this->model('Posts');
    }
    public function AddNewPosts(){
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
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
}