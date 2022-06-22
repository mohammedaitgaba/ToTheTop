<?php
class Messanger {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // add new message 
    public function Newmessage($data){
        $this->db->query('INSERT INTO conversation (id_sender,id_reciver,message)VALUES(:id_sender,:id_reciver,:message)');
        $this->db->bind(':id_sender',$data->id_sender);
        $this->db->bind(':id_reciver',$data->id_reciver);
        $this->db->bind(':message',$data->message);
        return $this->db->execute();
    }

    // get data of conversation by id sender and reciver
    public function GetConversations($data){
        // var_dump($data);die;
        $this->db->query('
        (SELECT * FROM conversation WHERE id_sender = :id_sender AND id_reciver = :id_reciver)UNION
        (SELECT * FROM conversation WHERE id_sender = :id_reciver AND id_reciver = :id_sender)
        ORDER BY Created_at ASC
        ');
        $this->db->bind(':id_sender',$data->id_sender);
        $this->db->bind(':id_reciver',$data->id_reciver);
        try{
            return $this->db->resultSet();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

}