<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
	}

    public function index()
    {
       
        if(isset($_SESSION['owner_logged_in']))
        {
            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/home_owner');
            $this->load->view('nonuser/owner/pages/footer.php');
        }  else {
            redirect('nonuser');
        }
    }

    public function users()
    {
        if(isset($_SESSION['owner_logged_in']))
        {
            $data['user'] = $this->Admin_database->getAllUsersDetail();
            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/pages/users.php', $data);
            $this->load->view('nonuser/owner/pages/footer.php');
        }  else {
            redirect('nonuser');
        }
    }

    public function classes()
    {
        if(isset($_SESSION['owner_logged_in']))
        {
            $data['class'] = $this->Admin_database->getAllClassesOwner();
            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/pages/classes.php', $data);
            $this->load->view('nonuser/owner/pages/footer.php');
        }  else {
            redirect('nonuser');
        }
    }
    
}

?>
