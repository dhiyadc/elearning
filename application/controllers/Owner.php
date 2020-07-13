<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
        $this->load->model('Workshops_model');
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
            if($data['user']['status'] == 200)
            $data['user'] = $data['user']['data'];
            else
            $this->session->set_flashdata("errorAPI", $data['user']['message']);

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
            if($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
            else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/pages/classes.php', $data);
            $this->load->view('nonuser/owner/pages/footer.php');
        }  else {
            redirect('nonuser');
        }
    }
    public function workshops()
    {
        if(isset($_SESSION['owner_logged_in']))
        {
            $data['class'] = $this->Admin_database->getAllWorkshopsOwner();
            if($data['class']['status'] == 200)
            $data['class'] = $data['class']['data'];
            else
            $this->session->set_flashdata("errorAPI", $data['class']['message']);

            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/pages/workshops.php', $data);
            $this->load->view('nonuser/owner/pages/footer.php');
        }  else {
            redirect('nonuser');
        }
    }
    
}

?>
