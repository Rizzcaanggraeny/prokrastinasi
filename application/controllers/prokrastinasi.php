<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prokrastinasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

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
        // 1. Load model yang berisi fungsi query ke database
        $this->load->model('Quiz_Prokrastinasi');

        // 2. Ambil id_user dari session yang sudah aktif saat login
        $id_user = $this->session->userdata('id_user');

        // 3. Ambil data todo list berdasarkan id_user tersebut
        $data['todo'] = $this->Quiz_Prokrastinasi->getTodo($id_user);

        // 4. Kirim data ke view profile
        $this->load->view('profile', $data);
    }
}