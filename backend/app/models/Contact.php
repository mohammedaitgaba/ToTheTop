<?php
class Contact{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function contact($data){
        $this->db->query('INSERT INTO contact (Full_name,email,message)VALUES(:name,:email,:message)');
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':message',$data['message']);
        try {
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    public function get_num_contacts(){
        $this->db->query('SELECT COUNT(*) as counter FROM contact');
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
    public function get_all_contacts(){
        $this->db->query('SELECT * FROM contact');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}