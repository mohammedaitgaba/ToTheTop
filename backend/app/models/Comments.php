<?php
class Comments {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function AddComment($data){
        $this->db->query("INSERT INTO comments (body,id_maker,id_post) VALUES (:body,:id_maker,:id_post)");
        $this->db->bind(':body',$data->comment);
        $this->db->bind(':id_maker',$data->id_maker);
        $this->db->bind(':id_post',$data->id_post);

        try{
            $this->db->execute();
            return $data;
        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function GetComment($data){
        $this->db->query('SELECT users.full_name,users.user_photo ,comments.body,comments.id_post FROM users JOIN comments ON users.id_user = comments.id_maker WHERE comments.id_post = :id_post ORDER BY comments.id_comment DESC');
        $this->db->bind(':id_post',$data->id_post);
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    

}