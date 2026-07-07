<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body{ margin:0; min-height:100vh; display:flex; justify-content:center; align-items:center; font-family:Arial,sans-serif; background-color:#000; background-image: radial-gradient(circle at center, #ffffff 0%, #f0f0f0 18%, #000000 45%); }
        .profile-card{ width:350px; background:white; padding:30px; border-radius:25px; text-align:center; box-shadow:0 10px 20px rgba(0,0,0,0.15); }
        .avatar{ width:90px; height:90px; border-radius:50%; background:#111; color:white; font-size:40px; font-weight:bold; display:flex; justify-content:center; align-items:center; margin:auto; }
        .stats{ display:flex; justify-content:space-around; margin-top:20px; }
        .menu-btn{ display:inline-block; padding:10px 20px; border-radius:25px; text-decoration:none; background:#111; color:white; margin-top:20px;}
    </style>
</head>
<body>

<div class="profile-card">
    <div class="avatar"><?= strtoupper(substr($username, 0, 1)); ?></div>
    <h2><?= $username; ?></h2>
    <p>Stay productive and achieve your goals.</p>

    <div class="stats">
        <div><h3>15</h3><p>Completed</p></div>
        <div><h3>4</h3><p>Active</p></div>
        <div><h3>85%</h3><p>Progress</p></div>
    </div>

    <a href="<?= base_url('index.php/dashboard'); ?>" class="menu-btn">Kembali</a>
</div>
<!-- Di dalam file views/profile.php -->
<div class="user-profile">
    <h2>Selamat Datang, <?= $this->session->userdata('username'); ?>!</h2>
    <p>Ini adalah halaman profil kamu.</p>
    
    <!-- Link Logout -->
    <a href="<?= site_url('auth/logout'); ?>">Logout</a>
</div>
</body>
</html>