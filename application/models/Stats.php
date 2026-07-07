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
        return json_decode(file_get_contents($this->file), true) ?: ['pengunjungMingguIni' => 0];
    }
}
