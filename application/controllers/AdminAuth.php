<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->database();
        $this->ensureDefaultAdmin();
    }

    public function index()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
            return;
        }

        $this->load->view('admin/login_view');
    }

    public function login_process()
    {
        $identifier = trim($this->input->post('username'));
        $password   = trim($this->input->post('password'));

        if (empty($identifier) || empty($password)) {
            $this->session->set_flashdata('error', 'Tolong isi username/email dan password admin.');
            redirect('adminauth');
            return;
        }

        $admin = $this->db
            ->group_start()
                ->where('username', $identifier)
                ->or_where('email', $identifier)
            ->group_end()
            ->get('admin')
            ->row_array();

        if (!$admin) {
            // ===== PERBAIKAN DI SINI =====
            log_message('debug', 'AdminAuth: admin not found for identifier=' . $identifier);

            $this->session->set_flashdata('error', 'Email atau password admin salah.');
            redirect('adminauth');
            return;
        }

        $verifyResult = $this->verifyPassword($password, $admin['password']);

        if ($verifyResult === 0) {
            log_message('debug', 'AdminAuth: password mismatch for admin_id=' . $admin['id'] . ' identifier=' . $identifier);

            $this->session->set_flashdata('error', 'Email atau password admin salah.');
            redirect('adminauth');
            return;
        }

        if ($verifyResult === 2) {
            $this->db->where('id', $admin['id'])
                ->update('admin', [
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);
        }

        $this->setAdminSession($admin);

        log_message('debug', 'AdminAuth: login success for admin_id=' . $admin['id']);

        redirect('admin');
    }

    public function logout()
    {
        $this->session->unset_userdata([
            'admin_logged_in',
            'admin_id',
            'admin_name',
            'admin_email',
            'admin_role',
            'admin_last_login',
        ]);

        redirect('adminauth');
    }

    private function ensureDefaultAdmin()
    {
        $count = $this->db->count_all_results('admin');

        if ($count === 0) {
            $this->db->insert('admin', [
                'nama'       => 'Administrator',
                'username'   => 'admin',
                'email'      => 'admin@example.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            log_message('debug', 'AdminAuth: default admin account created.');
        }
    }

    private function verifyPassword(string $password, string $storedHash): int
    {
        if (password_verify($password, $storedHash)) {
            return 1;
        }

        if (strlen($storedHash) === 32 && md5($password) === $storedHash) {
            return 2;
        }

        return 0;
    }

    private function setAdminSession(array $admin): void
    {
        $this->session->set_userdata([
            'admin_logged_in' => true,
            'admin_id'        => $admin['id'],
            'admin_name'      => $admin['nama'],
            'admin_email'     => $admin['email'] ?? '',
            'admin_role'      => $admin['role'] ?? 'Administrator',
            'admin_last_login'=> date('Y-m-d H:i'),
        ]);
    }
}