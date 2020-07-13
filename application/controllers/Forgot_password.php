<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Forgot_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load database

        $this->load->model('user_database');
        $this->load->helper('url');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            redirect('homepage');
        } else {
            $this->load->view('user/forgot_password');
        }
    }

    public function request()
    {
        require 'vendor/autoload.php';

        $email = $this->input->post('email');
        $emailDBe = $this->user_database->getFirstAccount($email);
        if ($emailDBe['status'] == 200)
            $emailDBe = $emailDBe['data'];
        else
            $this->session->set_flashdata("errorAPI", $emailDBe['message']);
        $emailDB = $emailDBe['email'];

        if ($email != $emailDB) {
            $this->session->set_flashdata('error_message', 'Email is not registered');
            redirect('forgot_password');
        }

        function generateNewString($len = 16)
        {
            $token = "YUIOPQWERTASDFGZXCVBHJKLNMqwertyuiopasdfgzxcvbhjklnm1234567890";
            $token = str_shuffle($token);
            $token = substr($token, 0, $len);

            return $token;
        }

        $token = generateNewString();
        $id_user = $this->user_database->getIDUser($email);
        if ($id_user['status'] == 200)
            $id_user = $id_user['data'];
        else
            $this->session->set_flashdata("errorAPI", $id_user['message']);

        $this->user_database->setToken($id_user['id_user'], $token);

        $mail = new PHPMailer;

        // SMTP gmail configuration
        $mail->isSMTP();
        //$mail->SMTPDebug = 2; ///Untuk melihat pesan dari server dan client
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'biawakencer@gmail.com';
        $mail->Password = 'password@12';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('biawakencer@gmail.com', 'no-reply');
        //$mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress($email);

        // Add cc or bcc 
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = 'Please Verify Your Email to Reset Your Password';

        // Set email format to HTML
        $mail->isHTML(true);

        $user_id = $id_user['id_user'];
        // Email body content
        $mail->Body = "
	            Hi,<br><br>
	            
	            In order to reset your password, please click on the link below:<br>
	            <a href='
	            http://localhost/elearning/reset_password/valid/$token
	            '>http://localhost/elearning/reset_password/valid/$token</a><br><br>
	            
	            Kind Regards,<br>
	            Classico
	        ";

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }


        $this->session->set_flashdata('message_display', 'An email has been sent, you have 5 minutes to verify');
        redirect('forgot_password');
    }
}
