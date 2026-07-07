<?php
// models/Profile.php — Model untuk data profil admin (single record, bukan list).

class Profile
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../data/profile.json';
    }

    private function defaults(): array
    {
        return [
            'nama'       => 'Administrator',
            'username'   => 'admin',
            'email'      => 'admin@example.com',
            'role'       => 'Administrator',
            'phone'      => '081234567890',
            'status'     => 'Aktif',
            'joined_at'  => date('Y-m-d'),
            'last_login' => date('Y-m-d H:i'),
            'bio'        => '',
            'avatar'     => '',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
        ];
    }

    public function ambil(): array
    {
        if (!is_file($this->file) || !is_readable($this->file)) {
            return $this->defaults();
        }

        $data = json_decode(file_get_contents($this->file), true);
        if (!is_array($data)) {
            return $this->defaults();
        }

        return array_merge($this->defaults(), $data);
    }

    public function simpan(array $data): void
    {
        $data = array_merge($this->ambil(), $data);
        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function verifyPassword(string $password): bool
    {
        $profile = $this->ambil();
        return password_verify($password, $profile['password']);
    }
}
