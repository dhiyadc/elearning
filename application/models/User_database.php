<?php

class User_database extends CI_Model
{
    public function http_request_get($dataparam = null, $function)
    {
        $curl = curl_init();
        if ($dataparam != null) {
            $dataparam = http_build_query($dataparam);
            $url = "http://classico.co.id/" . $function . ":" . $dataparam;
        } else
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_post($data, $dataparam = null, $function)
    {
        $curl = curl_init();
        if ($dataparam != null) {
            $dataparam = http_build_query($dataparam);
            $url = "http://classico.co.id/" . $function . ":" . $dataparam;
        } else
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }

    public function http_request_update($data, $dataparam = null, $function)
    {
        $curl = curl_init();
        if ($dataparam != null) {
            $dataparam = http_build_query($dataparam);
            $url = "http://classico.co.id/" . $function . ":" . $dataparam;
        } else
            $url = "http://classico.co.id/" . $function;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "UPDATE");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, TRUE);
    }
    public function http_request_delete($dataparam = null, $function)
    {
        $curl = curl_init();
        if ($dataparam != null) {
            $dataparam = http_build_query($dataparam);
            $url = "http://classico.co.id/" . $function . ":" . $dataparam;
        } else
            $url = "http://classico.co.id/" . $function;
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
        $user = $this->http_request_get("?email=$username");

        if ($user['status'] == 200 && count($user['data']) != 0 || count($user['data']) != null) {
            $passwordcek = $this->http_request_get("?password=$hashed");
            if ($passwordcek['status'] == 200 && count($passwordcek['data']) != 0 || count($passwordcek['data']) != null) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getFirstAccount($email)
    {
        $dataparam = [
            'email' => $email
        ];
        return $this->http_request_get($dataparam, "user/account/");
    }

    // Register Function
    public function register($data)
    {
        $data1 = [
            "id_user" => $data['user_id'],
            "email" => $data['email'],
            'hashed' => hash('sha256', $data['password'])
        ];
        $data2 = [
            "id_user" => $data['user_id'],
            "nama" => $data['nama'],
            "no_telepon" => $data['no_telepon'],
        ];
        $this->http_request_post($data1, "");
        return $this->http_request_post($data2, "");
    }

    public function getIDUser($email)
    {
        return $this->http_request_get("?email=$email");
    }

    public function getEmailUser($id_user)
    {
        $dataparam = [
            'id_user' => $id_user
        ];
        return $this->http_request_get($dataparam, "user/account/email/");
    }

    //Set token for reset password request
    public function setToken($id_user, $token)
    {
        $data = [
            'id_user' => $id_user,
            'token' => $token,
            'status_token' => 0,
            'expire_date' => "DATE_ADD(NOW(), INTERVAL 5 MINUTE)"
        ];

        $this->http_request_post($data, "");
    }

    public function getValidToken($token)
    {

        return $this->http_request_get("?token=$token");
    }

    public function getIDbyToken($token)
    {
        $dataparam = [
            'token' => $token
        ];
        return $this->http_request_get($dataparam, "users/lupapassword/");
    }

    public function updatePasswordUser($id_user, $newPassword)
    {
        $newPasswordHashed = hash('sha256', $newPassword);

        $data = [
            'password' => $newPasswordHashed
        ];
        $this->http_request_update($data, "?id_user=$id_user");

        return $this->http_request_delete("?id_user=$id_user");
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
