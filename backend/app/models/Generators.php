<?php
class Generators {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function generate($data){
       $this->db->query('SELECT * FROM generator WHERE category = :category ORDER BY RAND()');
       $this->db->bind(':category',$data['type']);
       return $this->db->single();
    }

}