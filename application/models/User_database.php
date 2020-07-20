<?php

class User_database extends CI_Model
{
    public function http_request_get($function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_post($data, $function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_update($data, $function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "UPDATE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_delete($function)
    {
        $curl = curl_init();
        $url = "http://classico.id:9090/$function";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    //Login Function
    public function login($data)
    {

        $username = $data['email'];
        $password = $data['password'];
        $hashed = hash('sha256', $password);

        $data = [
            'email' => $username,
            'password' => $hashed
        ];
        $user = $this->http_request_post($data, "home/login");

        return $user;
    }

    public function getFirstAccount($email)
    {
        $dataparam = [
            'email' => $email
        ];
        return $this->http_request_get("user/account/$email");
    }

    // Register Function
    public function register($data)
    {
        $data = [
            "id_user" => $data['user_id'],
            "email" => $data['email'],
            'password' => hash('sha256', $data['password']),
            "nama" => $data['nama'],
            "no_telepon" => $data['no_telepon']
        ];
        return $this->http_request_post($data, "home/register");
    }

    public function getIDUser($email)
    {
        return $this->http_request_get("user/id_user/$email");
    }

    public function getEmailUser($id_user)
    {
        $dataparam = [
            'id_user' => $id_user
        ];
        return $this->http_request_get("user/account/email/$id_user");
    }

    //Set token for reset password request
    public function setToken($id_user, $token)
    {
        $data = [
            'id_user' => $id_user,
            'token' => $token
        ];

        $this->http_request_post($data, "users/lupapassword/token");
    }

    public function getValidToken($token)
    {

        return $this->http_request_get("users/validtoken/$token");
    }

    public function getIDbyToken($token)
    {
        $dataparam = [
            'token' => $token
        ];
        return $this->http_request_get("users/lupapassword/$token");
    }

    public function updatePasswordUser($id_user, $newPassword)
    {
        $newPasswordHashed = hash('sha256', $newPassword);

        $data = [
            'password' => $newPasswordHashed
        ];
        return $this->http_request_update($data, "users/lupapassword/change_password/$id_user");
    }

    // Read data from database to show data in any page
    public function read_user_information($email)
    {

        $data = $this->http_request_delete("?email=$email");

        if ($data['status'] == 200 && count($data['data']) == 1) {
            return $data['data'];
        } else {
            return "fail";
        }
    }
}
