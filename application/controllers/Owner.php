<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_database');
        $this->load->model('Workshops_model');
    }

    public function index()
    {

        if (isset($_SESSION['owner_logged_in'])) {
            $this->load->view('nonuser/owner/pages/navbar.php');
            $this->load->view('nonuser/owner/home_owner');
            $this->load->view('nonuser/owner/pages/footer.php');
        } else {
            redirect('nonuser');
        }
    }

    public function users()
    {
        if (isset($_SESSION['owner_logged_in'])) {
            $null = false;
            $data['user'] = $this->Admin_database->getAllUsersDetail();
            if ($data['user'] == null)
                $null = true;
            else {
                if ($data['user']['status'] == 200)
                    $data['user'] = $data['user']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['user']['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('nonuser/owner/pages/navbar.php');
                $this->load->view('nonuser/owner/pages/users.php', $data);
                $this->load->view('nonuser/owner/pages/footer.php');
            }
        } else {
            redirect('nonuser');
        }
    }

    public function classes()
    {
        $null = false;
        if (isset($_SESSION['owner_logged_in'])) {
            $data['class'] = $this->Admin_database->getAllClassesOwner();
            if ($data['class'] == null)
                $this->load->view('server_error');
            else {
                if ($data['class']['status'] == 200)
                    $data['class'] = $data['class']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['class']['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('nonuser/owner/pages/navbar.php');
                $this->load->view('nonuser/owner/pages/classes.php', $data);
                $this->load->view('nonuser/owner/pages/footer.php');
            }
        } else {
            redirect('nonuser');
        }
    }

    public function workshops()
    {
        $null = false;
        if (isset($_SESSION['owner_logged_in'])) {
            $data['class'] = $this->Admin_database->getAllWorkshopsOwner();
            if ($data['class'] == null)
                $null = true;
            else {
                if ($data['class']['status'] == 200)
                    $data['class'] = $data['class']['data'];
                else
                    $this->session->set_flashdata("errorAPI", $data['class']['message']);
            }

            if ($null)
                $this->load->view('server_error');
            else {
                $this->load->view('nonuser/owner/pages/navbar.php');
                $this->load->view('nonuser/owner/pages/workshops.php', $data);
                $this->load->view('nonuser/owner/pages/footer.php');
            }
        } else {
            redirect('nonuser');
        }
    }
}
