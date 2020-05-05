<?php

Class User_database extends CI_Model {

//Login Function
    public function login($data){
        
        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);
        $user = $this->db->get_where('user', ['email' => $username])->row_array();
    
        if($user){
            if($this->db->get_where('user', ['password' => $hashed])->row_array()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

// Register Function
public function register($data){
    $id_user = $data['user_id'];
    $email = $data['email'];
    $password = $data['password'];
    $hashed = hash('sha256', $password);
    $sql = "INSERT INTO user (id_user, email, password)
        VALUES ('$id_user','$email', '$hashed')";
    return $this->db->query($sql);
}

public function getIDUser($email){

}

// Read data from database to show data in admin page
public function read_user_information($email) {

$condition = "email =" . "'" . $email . "'";
$this->db->select('*');
$this->db->from('user');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}


}

?>