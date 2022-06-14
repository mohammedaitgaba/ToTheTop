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

        $this->db->query('INSERT INTO users (full_name, email,password,user_photo)VALUES(:full_name, :email, :password,"default.jpg")');

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
    public function getRandomUser($data){
        $this->db->query("SELECT * from users where id_user != :id and id_user not in (
            select id_sender 
            from friends 
            where id_reciver = :id
            union
            select id_reciver 
            from friends 
            where id_sender = :id ) ORDER BY RAND() LIMIT 7 ");       
        $this->db->bind(":id",$data->id);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function NewFreind($data){
        $this->db->query("INSERT INTO friends (id_sender,id_reciver,request)VALUES(:id_sender,:id_reciver,0)");
        $this->db->bind(":id_sender",$data->id_sender);
        $this->db->bind(":id_reciver",$data->id_reciver);
        try {
            $this->db->execute();
            return $data->id_reciver;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function GetFriends($data){
        $this->db->query("SELECT users.id_user,user_photo,full_name,status FROM users JOIN friends ON friends.id_reciver = users.id_user WHERE id_sender = :id AND friends.request = 1
        UNION
        SELECT users.id_user,user_photo,full_name,status FROM users JOIN friends ON friends.id_sender = users.id_user WHERE id_reciver = :id AND friends.request = 1");
        $this->db->bind(":id",$data->id);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    } 
    public function GetRequests($data){
        $this->db->query("SELECT users.id_user,user_photo,full_name,status,friends.request 
        FROM users JOIN friends ON friends.id_sender = users.id_user WHERE id_reciver = :id AND friends.request = 0");
        $this->db->bind(":id",$data->id);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function AcceptRequests($data){
        $this->db->query("UPDATE friends SET request = 1 WHERE id_sender =:id_user AND id_reciver=:id");
        $this->db->bind(":id_user",$data->id_user);
        $this->db->bind(":id",$data->id);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function RejectRequests($data){
        $this->db->query("DELETE FROM friends WHERE id_sender =:id_user AND id_reciver=:id");
        $this->db->bind(":id_user",$data->id_user);
        $this->db->bind(":id",$data->id);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function GetUser($data){
        $this->db->query('SELECT users.full_name,users.email,users.user_photo FROM users WHERE id_user = :id');
        $this->db->bind(':id',$data->id);
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function GetUserFriends($data){
        $this->db->query('SELECT COUNT(*) AS COUNTER FROM friends WHERE id_sender = :id OR id_reciver = :id');
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->single();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function UpdateUser($target_path,$data){
        
        $this->db->query('UPDATE users SET full_name=:fullName,email=:email,user_photo=:photo WHERE id_user = :id');
        $this->db->bind(':fullName',$data['fullName']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':photo',$target_path);
        $this->db->execute();
    }
    public function UpdateStatusOnline($data){
        
        $this->db->query('UPDATE users SET status = 1 WHERE id_user = :id');
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function UpdateStatusOffline($data){
        
        $this->db->query('UPDATE users SET status = 0 WHERE id_user = :id');
        $this->db->bind(':id',$data->id);
        try{
            return $this->db->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

}
