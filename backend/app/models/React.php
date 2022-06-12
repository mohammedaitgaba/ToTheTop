<?php
class React{
    private $db ;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addLike($data){

        if ($this->CheckLike($data)==false) {

            if (empty($data->id_user)) {
                $this->db->query("INSERT INTO likes (id_admin,id_post)VALUES(:id_admin,:id_post)");
                $this->db->bind('id_admin',$data->id_admin);
            } else {
                $this->db->query("INSERT INTO likes (id_user,id_post)VALUES(:id_user,:id_post)");
                $this->db->bind('id_user',$data->id_user);
            }
            $this->db->bind('id_post',$data->id_post);
            try{
                $this->db->execute();
                return 1;
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }else{
            if (empty($data->id_user)) {
                $this->db->query('DELETE FROM likes WHERE id_admin = :id_admin AND id_post = :id_post');
                $this->db->bind('id_admin',$data->id_admin);
            }else {
                $this->db->query('DELETE FROM likes WHERE id_user = :id_user AND id_post = :id_post');
                $this->db->bind('id_user',$data->id_user);
            }
            $this->db->bind('id_post',$data->id_post);
            try{
                $this->db->execute();
                return 2;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        
    }

    
    public function CountLikes($data){
        $this->db->query("SELECT COUNT(*) AS counter FROM likes WHERE id_post = :id_post");
        $this->db->bind('id_post',$data->id_post);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function CheckLike($data){
        if (empty($data->id_user)) {
            $this->db->query('SELECT * FROM likes WHERE id_admin = :id_admin AND id_post = :id_post');
            $this->db->bind('id_admin',$data->id_admin);
        } else {
            $this->db->query('SELECT * FROM likes WHERE id_user = :id_user AND id_post = :id_post');
            $this->db->bind('id_user',$data->id_user);
        }
        $this->db->bind('id_post',$data->id_post);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }

    } 
    

    public function addClaps($data){
        if ($this->CheckClap($data)==false) {

            if (empty($data->id_user)) {
                $this->db->query("INSERT INTO claps (id_admin,id_post)VALUES(:id_admin,:id_post)");
                $this->db->bind('id_admin',$data->id_admin);
            } else {
                $this->db->query("INSERT INTO claps (id_user,id_post)VALUES(:id_user,:id_post)");
                $this->db->bind('id_user',$data->id_user);
            }
            $this->db->bind('id_post',$data->id_post);
            try{
                $this->db->execute();
                return 1;
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }else{
            if (empty($data->id_user)) {
                $this->db->query('DELETE FROM claps WHERE id_admin = :id_admin AND id_post = :id_post');
                $this->db->bind('id_admin',$data->id_admin);
            }else {
                $this->db->query('DELETE FROM claps WHERE id_user = :id_user AND id_post = :id_post');
                $this->db->bind('id_user',$data->id_user);
            }
            $this->db->bind('id_post',$data->id_post);
            try{
                $this->db->execute();
                return 2;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        
    }
    public function CheckClap($data){
        if (empty($data->id_user)) {
            $this->db->query('SELECT * FROM claps WHERE id_admin = :id_admin AND id_post = :id_post');
            $this->db->bind('id_admin',$data->id_admin);
        } else {
            $this->db->query('SELECT * FROM claps WHERE id_user = :id_user AND id_post = :id_post');
            $this->db->bind('id_user',$data->id_user);
        }
        $this->db->bind('id_post',$data->id_post);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function CountClpas($data){
        $this->db->query("SELECT COUNT(*) AS counter FROM claps WHERE id_post = :id_post");
        $this->db->bind('id_post',$data->id_post);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    
    // public function DeletPostsLike($data){
    //     $this->db->query('DELETE FROM likes WHERE id_user = :id_user AND id_post = :id_post');
    //     $this->db->bind('id_user',$data->id_user);
    //     $this->db->bind('id_post',$data->id_post);
    //     try{
    //         return $this->db->execute();
    //     }catch(PDOException $e){
    //         return $e->getMessage();
    //     }
    // }
}