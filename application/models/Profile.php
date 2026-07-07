<?php
// models/Profile.php — Model untuk data profil admin (single record, bukan list).

class Profile
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/profile.json';
    }

    public function ambil(): array
    {
        return json_decode(file_get_contents($this->file), true) ?: [];
    }

    public function simpan(string $nama, string $email, string $bio): void
    {
        file_put_contents($this->file, json_encode([
            'nama' => $nama,
            'email' => $email,
            'bio' => $bio,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
