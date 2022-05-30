<?php
class Posts{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function CreatePost($target_path,$data){
        
        $this->db->query("INSERT INTO posts (title,description,photo,id_maker ) VALUES (:title,:description,:photo,:id)");
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':photo',$target_path);
        return $this->db->execute();
    }
    public function CreatePost_withoutPic($data){
        $this->db->query("INSERT INTO posts (title,description,id_maker) VALUES (:title,:description,:id)");
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':description',$data['description']);
        return $this->db->execute();
    }

    public function getposts(){
        
        $this->db->query('SELECT posts.*,users.full_name,users.user_photo FROM posts INNER JOIN users ON posts.id_maker = users.id_user ORDER BY id_post DESC');
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function UpdatePost($target_path,$data){
        $this->db->query('UPDATE posts SET title=:title,description=:description,photo=:photo WHERE id_post = :id');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':photo',$target_path);
        $this->db->execute();
    }
    public function GetpostsById($data){
        $this->db->query('SELECT posts.*,users.full_name,users.user_photo FROM posts INNER JOIN users ON posts.id_maker = users.id_user  WHERE id_maker = :id ORDER BY id_post DESC');
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function CountUserPosts($data){
        $this->db->query("SELECT COUNT(*) AS counter FROM posts WHERE id_maker = :id");
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function DeletPostById($data){
        $this->db->query('DELETE FROM posts WHERE id_post = :id');
        $this->db->bind(':id',$data->id_post);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}