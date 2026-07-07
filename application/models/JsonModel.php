<?php
// models/JsonModel.php — Model dasar.
// Semua model (Article, Motivation, dst) mewarisi class ini supaya
// tidak perlu menulis ulang logic baca/tulis file setiap kali.
// Kalau nanti pindah ke MySQL, cukup ganti isi class ini (atau bikin
// BaseModel versi database) — Controller & View tidak perlu diubah.

class JsonModel
{
    protected string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    protected function baca(): array
    {
        if (!file_exists($this->file)) return [];
        $json = file_get_contents($this->file);
        return json_decode($json, true) ?: [];
    }

    protected function tulis(array $data): void
    {
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function semua(): array
    {
        return $this->baca();
    }

    public function cari(int $id): ?array
    {
        foreach ($this->baca() as $item) {
            if ($item['id'] === $id) return $item;
        }
        return null;
    }

    protected function idBerikutnya(array $data): int
    {
        $max = 0;
        foreach ($data as $item) {
            if ($item['id'] > $max) $max = $item['id'];
        }
        return $max + 1;
    }

    public function hapus(int $id): void
    {
        $data = $this->baca();
        $data = array_values(array_filter($data, fn($item) => $item['id'] !== $id));
        $this->tulis($data);
    }
}
