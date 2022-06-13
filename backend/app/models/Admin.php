<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ValidAdmin($data)
    {
        $this->db->query("SELECT name,CIN,email,id  FROM admin WHERE email = :email");
        $this->db->bind('email',$data->email);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function get_info(){
        $this->db->query('SELECT name,pic, email,CIN FROM admin');
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function get_users_num(){
        $this->db->query('SELECT COUNT(*) as counter FROM users');
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function get_Posts_num(){
        $this->db->query('SELECT COUNT(*) as counter FROM posts');
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }  
    public function get_comments_num(){
        $this->db->query('SELECT COUNT(*) as counter FROM comments');
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getUsers(){
        $this->db->query('SELECT * FROM users');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function DeleteUser($data){
        $this->db->query('DELETE FROM users WHERE id_user = :id');
        $this->db->bind(':id',$data);
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function DeleteMessage($data){
        $this->db->query('DELETE FROM contact WHERE id = :id');
        $this->db->bind(':id',$data);
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}