<?php
// controllers/MotivationController.php

require_once __DIR__ . '/application/models/Motivation.php';

class MotivationController
{
    private Motivation $model;

    public function __construct()
    {
        $this->model = new Motivation();
    }

    public function index()
    {
        $data['motivations']   = array_reverse($this->model->semua());
        $data['judulHalaman']  = 'Motivation';
        $data['halamanAktif']  = 'motivation';

        extract($data);

        require __DIR__ . '/application/views/layout/header.php';
        require __DIR__ . '/application/views/motivation/index.php';
        require __DIR__ . '/application/views/layout/footer.php';
    }

    public function create()
    {
        $data['motivation']    = null;
        $data['judulHalaman']  = 'Kutipan Baru';
        $data['halamanAktif']  = 'motivation';

        extract($data);

        require __DIR__ . '/application/views/layout/header.php';
        require __DIR__ . '/application/views/motivation/form.php';
        require __DIR__ . '/application/views/layout/footer.php';
    }

    public function store()
    {
        $kutipan = trim($_POST['kutipan'] ?? '');
        $status  = $_POST['status'] ?? 'Draft';

        if ($kutipan != '') {
            $this->model->tambah($kutipan, $status);
        }

        header('Location: index.php?page=motivation');
        exit;
    }

    public function edit($id)
    {
        $data['motivation'] = $this->model->cari($id);

        if (!$data['motivation']) {
            header('Location: index.php?page=motivation');
            exit;
        }

        $data['judulHalaman'] = 'Edit Kutipan';
        $data['halamanAktif'] = 'motivation';

        extract($data);

        require __DIR__ . '/application/views/layout/header.php';
        require __DIR__ . '/application/views/motivation/form.php';
        require __DIR__ . '/application/views/layout/footer.php';
    }

    public function update($id)
    {
        $kutipan = trim($_POST['kutipan'] ?? '');
        $status  = $_POST['status'] ?? 'Draft';

        $this->model->ubah($id, $kutipan, $status);

        header('Location: index.php?page=motivation');
        exit;
    }

    public function delete($id)
    {
        $this->model->hapus($id);

        header('Location: index.php?page=motivation');
        exit;
    }
}