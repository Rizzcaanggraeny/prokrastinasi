<?php
// models/Stats.php — Model kecil untuk angka yang bukan berasal dari tabel lain,
// misalnya jumlah pengunjung (biasanya ini datang dari sistem analytics terpisah).

class Stats
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/stats.json';
    }

    public function ambil(): array
    {
        if (!is_file($this->file) || !is_readable($this->file)) {
            return ['pengunjungMingguIni' => 0];
        }

        $content = file_get_contents($this->file);
        $data = json_decode($content, true);

        return is_array($data) ? $data : ['pengunjungMingguIni' => 0];
    }
}
