<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function newUser($data)
     {

        $this->db->query('INSERT INTO users (full_name, email,password)VALUES(:full_name, :email, :password)');

        $this->db->bind(':full_name',$data->full_name);
        $this->db->bind(':email',$data->email);
        $this->db->bind(':password',password_hash($data->password,PASSWORD_BCRYPT));

        //Execute function
        // ternary operator
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function checkUser($data)
    {
        // echo($data['email']);die;
        $this->db->query('SELECT * FROM users WHERE email =:email');
        $this->db->bind(":email", $data->email);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllusers(){
        $this->db->query('SELECT * FROM client');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function delet_user($data){
        $this->db->query('DELETE  FROM client WHERE id = :id');
        $this->db->bind(":id", $data);
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateInfo($data)
    {
        $this->db->query("UPDATE client SET 

        name=:name,
        date_nais = :date_nais,
        CIN =:CIN,
        profession = :profession WHERE id=:id");
        // Bind value
        // 

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':date_nais', $data['date_nais']);
        $this->db->bind(':CIN', $data['CIN']);
        $this->db->bind(':profession', $data['profession']);
        $this->db->bind(':id', $data['id']);

        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function getInfor($id){
        $this->db->query('SELECT * FROM  client WHERE id = :id');
        $this->db->bind(":id",$id);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}
