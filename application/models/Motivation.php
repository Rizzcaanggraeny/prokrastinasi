<?php
// models/Motivation.php — Model untuk data kutipan motivasi.

require_once __DIR__ . '/JsonModel.php';

class Motivation extends JsonModel
{
    public function __construct()
    {
        parent::__construct(__DIR__ . '/../data/motivations.json');
    }

    public function tambah(string $kutipan, string $status = 'Draft'): void
    {
        $data = $this->baca();
        $data[] = [
            'id' => $this->idBerikutnya($data),
            'kutipan' => $kutipan,
            'status' => $status,
            'dibuat' => date('Y-m-d'),
        ];
        $this->tulis($data);
    }

    public function ubah(int $id, string $kutipan, string $status): void
    {
        $data = $this->baca();
        foreach ($data as &$item) {
            if ($item['id'] === $id) {
                $item['kutipan'] = $kutipan;
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
