<?php
// models/Article.php — Model untuk data artikel.

require_once __DIR__ . '/JsonModel.php';

class Article extends JsonModel
{
    public function __construct()
    {
        parent::__construct(__DIR__ . '/../data/articles.json');
    }

    public function tambah(string $judul, string $isi, string $status = 'Draft'): void
    {
        $data = $this->baca();
        $data[] = [
            'id' => $this->idBerikutnya($data),
            'judul' => $judul,
            'isi' => $isi,
            'status' => $status,
            'dibuat' => date('Y-m-d'),
        ];
        $this->tulis($data);
    }

    public function ubah(int $id, string $judul, string $isi, string $status): void
    {
        $data = $this->baca();
        foreach ($data as &$item) {
            if ($item['id'] === $id) {
                $item['judul'] = $judul;
                $item['isi'] = $isi;
                $item['status'] = $status;
            }
        }
        $this->tulis($data);
    }

    public function jumlahTerbit(): int
    {
        return count(array_filter($this->baca(), fn($item) => $item['status'] === 'Terbit'));
    }
}
