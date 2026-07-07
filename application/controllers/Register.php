<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Tampilkan form register
    public function index() {
        $this->load->view('register_view');
    }

    // Proses data yang disubmit dari form register
    public function register_process() {
        $nama     = $this->input->post('nama');
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        // Validasi dasar: semua field wajib diisi
        if (empty($nama) || empty($email) || empty($password)) {
            $this->session->set_flashdata('error', 'Tolong isi semua data!');
            redirect('register');
            return;
        }

        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Format email tidak valid!');
            redirect('register');
            return;
        }

        // Cek apakah email sudah terdaftar sebelumnya
        $existing = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($existing) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar, silakan login.');
            redirect('register');
            return;
        }

        // Hash password sebelum disimpan (JANGAN pernah simpan password polos)
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->insert('users', [
            'nama'     => $nama,
            'email'    => $email,
            'password' => $password_hash
        ]);

        // Ambil id_user yang baru saja dibuat
        $id_user_baru = $this->db->insert_id();

        // Auto-login: langsung buatkan session tanpa perlu login manual
        $this->session->set_userdata('id_user', $id_user_baru);
        $this->session->set_userdata('username', $nama);
        $this->session->set_userdata('email', $email);

        // Langsung arahkan ke halaman utama setelah register (ganti 'prokrastinasi' sesuai controller dashboard kamu)
        redirect('prokrastinasi');
    }
}