<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Quiz_Prokrastinasi');

        // Proteksi: Jika tidak ada session 'username', tendang ke halaman login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        // Ambil id_user dari session yang sedang login (bukan hardcode lagi)
        $id_user = $this->session->userdata('id_user');

        $data['todo'] = $this->Quiz_Prokrastinasi->getTodo($id_user);

        $this->load->view('profile', $data);
    }
}