<?php
// controllers/ArticleController.php

require_once APPPATH . 'models/Article.php';

class ArticleController
{
    private Article $model;

    public function __construct()
    {
        $this->model = new Article();
    }

    public function index()
    {
        $data['articles']      = array_reverse($this->model->semua());
        $data['judulHalaman']  = 'Article';
        $data['halamanAktif']  = 'article';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/article/index.php';
        require APPPATH . 'views/layout/footer.php';
    }

    public function create()
    {
        $data['article']       = null;
        $data['judulHalaman']  = 'Artikel Baru';
        $data['halamanAktif']  = 'article';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/article/form.php';
        require APPPATH . 'views/layout/footer.php';
    }

    public function store()
    {
        $judul  = trim($_POST['judul'] ?? '');
        $isi    = trim($_POST['isi'] ?? '');
        $status = $_POST['status'] ?? 'Draft';

        if ($judul != '') {
            $this->model->tambah($judul, $isi, $status);
        }

        header('Location: index.php?page=article');
        exit;
    }

    public function edit($id)
    {
        $data['article'] = $this->model->cari($id);

        if (!$data['article']) {
            header('Location: index.php?page=article');
            exit;
        }

        $data['judulHalaman'] = 'Edit Artikel';
        $data['halamanAktif'] = 'article';

        extract($data);

        require APPPATH . 'views/layout/header.php';
        require APPPATH . 'views/article/form.php';
        require APPPATH . 'views/layout/footer.php';
    }

    public function update($id)
    {
        $judul  = trim($_POST['judul'] ?? '');
        $isi    = trim($_POST['isi'] ?? '');
        $status = $_POST['status'] ?? 'Draft';

        $this->model->ubah($id, $judul, $isi, $status);

        header('Location: index.php?page=article');
        exit;
    }

    public function delete($id)
    {
        $this->model->hapus($id);

        header('Location: index.php?page=article');
        exit;
    }
}