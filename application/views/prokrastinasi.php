<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bye Prokrastinasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleprokrastinasi.css'); ?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="<?= site_url('prokrastinasi'); ?>">Home</a></li>
        <li><a href="<?= site_url('prokrastinasi/motivasi'); ?>">Article</a></li>
        <li><a href="<?= site_url('prokrastinasi/profile'); ?>">Profile</a></li>
    </ul>
</nav>

<section class="hero">
    <img src="<?= base_url('img/banner.jpeg'); ?>" alt="Bye Prokrastinasi">
</section>

<section class="black-section">
    <div class="quote">
        Kamu tidak kekurangan waktu,<br>
        kamu hanya terlalu sering memberi kesempatan pada alasan<br>
    </div>
</section>
<section class="black-section">
<div style="text-align: center; margin-top: 50px;">
<a href="<?= site_url('quiz'); ?>">
    <img src="<?= base_url('img/button.png'); ?>" class="button" alt="button">
</a>
</section>
</div>
</body>
</html>