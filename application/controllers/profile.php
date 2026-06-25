<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('profile');
    }

    public function profile()
    {
        $this->load->view('profile');
    }
}