<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prokrastinasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Proteksi agar tidak bisa diakses tanpa login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('prokrastinasi');
    }

    public function motivasi()
    {
        $this->load->view('motivasi');
    }

    public function profile()
    {
        // Contoh cara panggil id_user untuk kuis/todo list
        $data['id_user'] = $this->session->userdata('id_user');
        $this->load->view('profile', $data);
    }
}