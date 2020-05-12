<?php

Class Admin_database extends CI_Model {

//Login Function
    public function login($data){
        
        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);
        $user = $this->db->get_where('admin', ['email' => $username])->row_array();
    
        if($user){
            if($this->db->get_where('admin', ['password' => $hashed])->row_array()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isOwner($data){
        $email = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);
        
        $owner = $this->db->get_where('owner', ['email' => $email])->row_array();
    
        if($owner){
            if($this->db->get_where('owner', ['password' => $hashed])->row_array()){
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
    $email = $data['email'];
    $password = $data['password'];
    $nama = $data['nama'];
    $no_telepon = $data['no_telepon'];
    $hashed = hash('sha256', $password);
    $sql = "INSERT INTO user (id_user, email, password)
        VALUES ('$id_user','$email', '$hashed')";
    $this->db->query($sql);

    $sql = "INSERT INTO detail_user (id_user, nama, no_telepon)
            VALUES ('$id_user','$nama','$no_telepon')";
    return $this->db->query($sql);
}

public function getIDUser($email){
    /*$sql = "SELECT id_user FROM user
        WHERE email='$email'";
    $query = $this->db->query($sql);
    return $query->getFirstRow(); */
    
    
    $condition = "email =" . "'" . $email . "'";
    $this->db->select('id_user');
    $this->db->from('user');
    $this->db->where($condition);
    //$this->db->limit(1);
    $query = $this->db->get(); 

    return $query->result_array()[0];
}

// Read data from database to show data in any page
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