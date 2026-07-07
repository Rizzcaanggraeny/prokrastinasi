<?php
// controllers/ProfileController.php

require_once APPPATH . 'models/Profile.php';

class ProfileController
{
    private Profile $model;

    public function __construct()
    {
        $this->model = new Profile();
    }

    public function index($tersimpan = false)
    {
        $data['profile']       = $this->model->ambil();
        $data['tersimpan']     = $tersimpan;
        $data['judulHalaman']  = 'Profile';
        $data['halamanAktif']  = 'profile';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/profile/index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    public function update()
    {
        $nama  = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $bio   = trim($_POST['bio'] ?? '');

        $this->model->simpan($nama, $email, $bio);

        header('Location: index.php?page=profile&saved=1');
        exit;
    }
}