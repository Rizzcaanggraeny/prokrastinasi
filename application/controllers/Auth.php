<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    // Method ini yang dipanggil saat user buka halaman utama (default_controller)
    public function index() {
        $this->load->view('login_view');
    }

    public function login_process() {
        $email    = $this->input->post('username'); // input form namanya 'username' tapi isinya email
        $password = $this->input->post('password');

        if (empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Tolong isi semuanya!');
            redirect('auth');
            return;
        }

        // Cari user berdasarkan kolom EMAIL (bukan username, karena tabelnya tidak punya kolom itu)
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        // Cek user ada DAN password cocok
        // (asumsi password di database disimpan dengan password_hash())
        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('id_user', $user['id_user']);
            $this->session->set_userdata('username', $user['nama']); // pakai kolom 'nama' sebagai identitas session
            $this->session->set_userdata('email', $user['email']);
            redirect('prokrastinasi');
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah!');
            redirect('auth');
        }
    }

} // Akhir dari class Auth