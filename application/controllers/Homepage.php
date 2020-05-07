<?php

class Homepage extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Classes_model');
    }

    public function index()
    {
        $data['class'] = $this->Classes_model->getAllClasses();
        $this->load->view('homepage',$data);
    }
}