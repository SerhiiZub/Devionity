<?php


class Message extends Model
{
    public function save($data, $id = null){
        if(!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {
            return false;
        }
        
        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);
        
        if (!$id){
            //add new record
            $sql = "INSERT INTO messages (`name`, `email`, `message`) VALUES ('{$name}', '{$email}', '{$message}')";

        } else {
            //update existing record
            $sql = "UPDATE messages
                    set `name` = '{$name}',
                    `email` = '{$email}',
                    `message` = '{$message}'
                    WHERE id = {$id}
              ";
        }
        
        return $this->db->query($sql);
    }
    
    public function getList(){
        $sql = "SELECT * FROM messages WHERE 1";
        return $this->db->query($sql);
    }

}