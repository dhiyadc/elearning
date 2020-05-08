<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Forgot_password extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Load database
		$this->load->model('user_database');
        
	}

    public function index(){
        if(isset($this->session->userdata['logged_in'])){
            redirect('homepage');
        }else{
            $this->load->view('user/forgot_password');
       }
        
    }

    public function request()
    {
        require 'vendor/autoload.php';

        $email = $this->input->post('email');
		$emailDB = $this->user_database->read_user_information($email);

			if(!$emailDB){
				$data = array(
					'error_message' => 'Email is not registered'
					);
			    return $this->load->view('user/forgot_password', $data);
			}

        function generateNewString($len = 10) {
            $token = "qwertyuiopasdfgzxcvbhjklnm1234567890";
            $token = str_shuffle($token);
            $token = substr($token, 0, $len);
    
            return $token;
        }

        $token = generateNewString();

        $this->user_database->setToken($email, $token);

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
        
        $mail->setFrom('biawakencer@gmail.com', 'Whuidi Email Masuk Dong');
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
        
        // Email body content
        $mail->Body = "
	            Hi,<br><br>
	            
	            In order to reset your password, please click on the link below:<br>
	            <a href='
	            http://localhost/elearning/reset_password/valid/$email/$token
	            '>http://localhost/elearning/reset_password/valid/$email/$token</a><br><br>
	            
	            Kind Regards,<br>
	            E-Learning
	        ";
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        } 
    
    


        $data = array(
        'message_display' => 'An email has been sent, you have 5 minutes to verify'
        );
        $this->load->view('user/forgot_password', $data);

    }
    
}



?>
