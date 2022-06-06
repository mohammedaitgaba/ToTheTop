<?php
class Comments {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function AddComment($data){
        if (empty($data->id_maker)) {
            $this->db->query("INSERT INTO comments (body,id_admin,id_post) VALUES (:body,:id_admin,:id_post)");
            $this->db->bind(':id_admin',$data->id_admin);
        } else {
            $this->db->query("INSERT INTO comments (body,id_maker,id_post) VALUES (:body,:id_maker,:id_post)");
            $this->db->bind(':id_maker',$data->id_maker);
        }
        $this->db->bind(':body',$data->comment);
        $this->db->bind(':id_post',$data->id_post);

        try{
            $this->db->execute();
            return $data;
        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function GetComment($data){
            $this->db->query(' (SELECT users.full_name,users.user_photo,users.id_user,comments.body,comments.id_post FROM users 
            JOIN comments ON users.id_user = comments.id_maker WHERE comments.id_post = :id_post ORDER BY comments.id_comment DESC)
            UNION (SELECT admin.name,admin.photo,admin.id,comments.body,comments.id_post FROM admin 
            JOIN comments ON admin.id = comments.id_admin WHERE comments.id_post = :id_post ORDER BY comments.id_comment DESC) ');
        $this->db->bind(':id_post',$data->id_post);
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    

}