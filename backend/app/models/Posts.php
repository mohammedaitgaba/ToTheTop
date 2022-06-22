<?php
class Posts{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // create new post with picture by admin or user
    public function CreatePost($target_path,$data){
        if (empty($data['id'])) {
            $this->db->query("INSERT INTO posts (title,description,photo,id_admin ) VALUES (:title,:description,:photo,:id_admin)");
            $this->db->bind(':id_admin',$data['id_admin']);
        }else{
            $this->db->query("INSERT INTO posts (title,description,photo,id_maker ) VALUES (:title,:description,:photo,:id)");
            $this->db->bind(':id',$data['id']);
        }
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':photo',$target_path);
        return $this->db->execute();
    }

    // create new post withourt pic by admin or user
    public function CreatePost_withoutPic($data){
        if (empty($data['id'])) {
            $this->db->query("INSERT INTO posts (title,description,id_admin) VALUES (:title,:description,:id_admin)");
            $this->db->bind(':id_admin',$data['id_admin']);
        } else {
            $this->db->query("INSERT INTO posts (title,description,id_maker) VALUES (:title,:description,:id)");
            $this->db->bind(':id',$data['id']);
        }
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':description',$data['description']);
        return $this->db->execute();
    }

    // get all posts 
    public function getposts(){
        
        $this->db->query('SELECT posts.*,users.full_name,users.user_photo FROM posts INNER JOIN users ON posts.id_maker = users.id_user ORDER BY id_post DESC');
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // update post by id_post and id user
    public function UpdatePost($target_path,$data){
        $this->db->query('UPDATE posts SET title=:title,description=:description,photo=:photo WHERE id_post = :id');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':photo',$target_path);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // get post by id_post to show it in popup for update 
    public function GetpostsById($data){
        $this->db->query('SELECT posts.*,users.full_name,users.user_photo FROM posts INNER JOIN users ON posts.id_maker = users.id_user  WHERE id_maker = :id ORDER BY id_post DESC');
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    // count user posts by id user 
    public function CountUserPosts($data){
        $this->db->query("SELECT COUNT(*) AS counter FROM posts WHERE id_maker = :id");
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // delete post by id post
    public function DeletPostById($data){
        $this->db->query('DELETE FROM posts WHERE id_post = :id');
        $this->db->bind(':id',$data->id_post);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // get posts of admin to separate user posts from admin posts 
    public function getadminposts(){
        $this->db->query("SELECT posts.*,admin.name,admin.pic,admin.id FROM posts INNER JOIN admin ON posts.id_admin = admin.id ORDER BY id_post DESC");
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    // get latest 3 posts to show them in homepage 
    public function GetLatestposts(){
        $this->db->query('SELECT posts.*,users.full_name,users.user_photo FROM posts INNER JOIN users ON posts.id_maker = users.id_user ORDER BY id_post DESC LIMIT 3');
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    
}