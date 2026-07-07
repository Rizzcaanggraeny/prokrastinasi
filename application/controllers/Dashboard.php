<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        // Proteksi: Jika belum login, tendang balik ke halaman auth/login
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index() {
        // Ambil data session nama user untuk dikirim ke view
        $data['username'] = $this->session->userdata('username');
        $this->load->view('dashboard_view', $data);
    }

    public function profile() {
        $data['username'] = $this->session->userdata('username');
        $this->load->view('profile_view', $data);
    }
}