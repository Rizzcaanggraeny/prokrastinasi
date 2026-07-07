<?php
// controllers/Admin.php

require_once APPPATH . 'models/Article.php';
require_once APPPATH . 'models/Motivation.php';
require_once APPPATH . 'models/Stats.php';
require_once APPPATH . 'models/Profile.php';

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('admin_logged_in')) {
            redirect('adminauth');
        }
    }

    public function index()
    {
        $articleModel    = new Article();
        $motivationModel = new Motivation();
        $statsModel      = new Stats();

        $articles    = $articleModel->semua();
        $motivations = $motivationModel->semua();

        $data['totalArtikel']         = count($articles);
        $data['motivasiTerbit']       = $motivationModel->jumlahTerbit();
        $data['pengunjungMingguIni']  = $statsModel->ambil()['pengunjungMingguIni'];
        $data['adminName']            = $this->session->userdata('admin_name') ?? 'Administrator';
        $data['adminEmail']           = $this->session->userdata('admin_email') ?? 'admin@example.com';
        $data['adminRole']            = $this->session->userdata('admin_role') ?? 'Administrator';

        // Gabungkan artikel dan motivasi menjadi daftar konten terbaru
        $konten = [];

        foreach ($articles as $a) {
            $konten[] = [
                'id'     => $a['id'],
                'judul'  => $a['judul'],
                'tipe'   => 'Article',
                'status' => $a['status'],
                'dibuat' => $a['dibuat']
            ];
        }

        foreach ($motivations as $m) {
            $konten[] = [
                'id'     => $m['id'],
                'judul'  => $m['kutipan'],
                'tipe'   => 'Motivation',
                'status' => $m['status'],
                'dibuat' => $m['dibuat']
            ];
        }

        usort($konten, function ($a, $b) {
            return strcmp($b['dibuat'], $a['dibuat']);
        });

        $data['kontenTerbaru'] = array_slice($konten, 0, 5);
        $data['judulHalaman']  = 'Dashboard';
        $data['halamanAktif']  = 'dashboard';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/dashboard/index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    // List articles (admin area)
    public function articles()
    {
        $articleModel = new Article();

        $data['articles']     = array_reverse($articleModel->semua());
        $data['judulHalaman'] = 'Article';
        $data['halamanAktif'] = 'article';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/article/index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    // View single article (admin can view same as user-facing)
    public function view_article($id)
    {
        $articleModel = new Article();
        $article = $articleModel->cari($id);

        if (!$article) {
            redirect('admin/articles');
            return;
        }

        $data['article'] = $article;
        $data['judulHalaman'] = $article['judul'] ?? 'Artikel';
        $data['halamanAktif'] = 'article';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/article/show.php';
        require APPPATH . 'views/layout/footer.php';
    }

    // Show and edit admin profile
    public function profile()
    {
        $profileModel = new Profile();

        $data['profile']      = $profileModel->ambil();
        $data['tersimpan']    = false;
        $data['judulHalaman'] = 'Profile';
        $data['halamanAktif'] = 'profile';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/profile/index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    public function profile_data()
    {
        $profileModel = new Profile();
        $profile = $profileModel->ambil();
        $adminId = $this->session->userdata('admin_id');
        $admin = $this->db->get_where('admin', ['id' => $adminId])->row_array();

        if (!$admin) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Admin tidak ditemukan.']);
            return;
        }

        $data = [
            'nama'        => $admin['nama'],
            'username'    => $admin['username'] ?? 'admin',
            'email'       => $admin['email'] ?? $profile['email'],
            'role'        => $profile['role'] ?? 'Administrator',
            'phone'       => $profile['phone'] ?? '081234567890',
            'status'      => $profile['status'] ?? 'Aktif',
            'joined_at'   => !empty($admin['created_at']) ? substr($admin['created_at'], 0, 10) : ($profile['joined_at'] ?? date('Y-m-d')),
            'last_login'  => $this->session->userdata('admin_last_login') ?? $profile['last_login'] ?? date('Y-m-d H:i'),
            'bio'         => $profile['bio'] ?? '',
            'avatar'      => $profile['avatar'] ?? '',
        ];

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'data' => $data]);
    }

    public function update_profile()
    {
        $adminId = $this->session->userdata('admin_id');
        $admin = $this->db->get_where('admin', ['id' => $adminId])->row_array();
        $profileModel = new Profile();
        $currentProfile = $profileModel->ambil();

        if (!$admin) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Admin tidak ditemukan.']);
            return;
        }

        $nama      = trim($this->input->post('nama') ?? '');
        $email     = trim($this->input->post('email') ?? '');
        $role      = trim($this->input->post('role') ?? $currentProfile['role'] ?? 'Administrator');
        $phone     = trim($this->input->post('phone') ?? '');
        $status    = trim($this->input->post('status') ?? $currentProfile['status'] ?? 'Aktif');
        $joinedAt  = trim($this->input->post('joined_at') ?? $currentProfile['joined_at'] ?? date('Y-m-d'));
        $lastLogin = trim($this->input->post('last_login') ?? $currentProfile['last_login'] ?? date('Y-m-d H:i'));
        $bio       = trim($this->input->post('bio') ?? '');

        $this->db->where('id', $adminId)->update('admin', [
            'nama'  => $nama,
            'email' => $email,
        ]);

        $profileModel->simpan([
            'nama'       => $nama,
            'email'      => $email,
            'role'       => $role,
            'phone'      => $phone,
            'status'     => $status,
            'joined_at'  => $joinedAt,
            'last_login' => $lastLogin,
            'bio'        => $bio,
            'avatar'     => $currentProfile['avatar'] ?? '',
        ]);

        $this->session->set_userdata([
            'admin_name'  => $nama,
            'admin_email' => $email,
            'admin_role'  => $role,
        ]);

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Profil berhasil disimpan.']);
    }

    public function change_password()
    {
        $adminId = $this->session->userdata('admin_id');
        $admin = $this->db->get_where('admin', ['id' => $adminId])->row_array();

        if (!$admin) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Admin tidak ditemukan.']);
            return;
        }

        $current = trim($this->input->post('current_password') ?? '');
        $new     = trim($this->input->post('new_password') ?? '');
        $confirm = trim($this->input->post('confirm_password') ?? '');

        if (!$this->verifyPassword($current, $admin['password'])) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Password saat ini salah.']);
            return;
        }

        if ($new === '' || strlen($new) < 8) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Password baru minimal 8 karakter.']);
            return;
        }

        if ($new !== $confirm) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Konfirmasi password tidak cocok.']);
            return;
        }

        $this->db->where('id', $adminId)->update('admin', ['password' => password_hash($new, PASSWORD_DEFAULT)]);

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Password berhasil diubah.']);
    }

    private function verifyPassword(string $password, string $storedHash): bool
    {
        if (password_verify($password, $storedHash)) {
            return true;
        }

        if (strlen($storedHash) === 32 && md5($password) === $storedHash) {
            return true;
        }

        return false;
    }

    // List all registered users for admin
    public function users()
    {
        // DB is autoloaded in this app
        $users = $this->db->order_by('id_user', 'DESC')->get('users')->result_array();

        $data['users'] = $users;
        $data['judulHalaman'] = 'Users';
        $data['halamanAktif'] = 'users';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/admin/users_index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    // View single user profile (admin)
    public function view_user($id)
    {
        $user = $this->db->get_where('users', ['id_user' => $id])->row_array();

        if (!$user) {
            redirect('admin/users');
            return;
        }

        $data['user'] = $user;
        $data['judulHalaman'] = 'User Profile';
        $data['halamanAktif'] = 'users';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/admin/user_show.php';
        require APPPATH . 'views/layout/footer.php';
    }
}