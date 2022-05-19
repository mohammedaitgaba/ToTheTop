<?php
class Posts{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function CreatePost($target_path,$data){
        $this->db->query("INSERT INTO posts (title,description,photo) VALUES (:title,:description,:photo)");
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':photo',$target_path);
        $this->db->execute();
    }   
    //  public function CreatePosts($target_path){
    //     $this->db->query("INSERT INTO posts (photo) VALUES (:photo)");
    //     // $this->db->bind(':title',$data->title);
    //     // $this->db->bind(':description',$data->description);
    //     $this->db->execute();
    // }
}