<?php
defined("BASEPATH") or die("Acceso prohibido");

class Recovery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("overall/header2");
        $this->load->view("register");
        $this->load->view("overall/footer2");
    }
}