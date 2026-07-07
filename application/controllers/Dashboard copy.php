<?php
// controllers/DashboardController.php

require_once __DIR__ . '/application/models/Article.php';
require_once __DIR__ . '/application/models/Motivation.php';
require_once __DIR__ . '/application/models/Stats.php';

class DashboardController
{
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

        require __DIR__ . '/application/views/layout/header.php';
        require __DIR__ . '/application/views/dashboard/index.php';
        require __DIR__ . '/application/views/layout/footer.php';
    }
}