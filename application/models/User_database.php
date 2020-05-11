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

public function getEmailUser($id_user){
    $condition = "id_user =" . "'" . $id_user . "'";
    $this->db->select('email');
    $this->db->from('user');
    $this->db->where($condition);
    //$this->db->limit(1);
    $query = $this->db->get(); 

    return $query->result_array()[0];
}

//Set token for reset password request
public function setToken($id_user, $token)
{
    $sql = "INSERT INTO lupa_password (id_user, token, status_token, expire_date)
            VALUES ('$id_user','$token',0, DATE_ADD(NOW(), INTERVAL 5 MINUTE))";
    return $this->db->query($sql);
}

public function getValidToken($id_user, $token){
    $sql = "SELECT id_user FROM lupa_password WHERE
    id_user='$id_user' AND token='$token' AND token<>'' AND expire_date > NOW()";
    $query = $this->db->query($sql);
    return $query->num_rows();
}

public function updatePassword($id_user, $newPassword)
{
    $newPasswordHashed = hash('sha256', $newPassword);
    $sql = "UPDATE user SET password = '$newPasswordHashed'
    WHERE id_user='$id_user'";
    $this->db->query($sql);

    $sql = "DELETE FROM lupa_password WHERE id_user='$id_user'";
    return $this->db->query($sql);
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