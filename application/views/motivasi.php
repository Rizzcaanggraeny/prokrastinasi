<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Motivasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylemotivasi.css'); ?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="<?= site_url('prokrastinasi'); ?>">Home</a></li>
        <li><a href="<?= site_url('prokrastinasi/motivasi'); ?>">Motivation</a></li>
        <li><a href="<?= site_url('prokrastinasi/profile'); ?>">Profile</a></li>
    </ul>
</nav>

<section class="hero">
    <h1>MOTIVASI</h1>
</section>

<div class="container-hover">
    <img src="<?= base_url('img/bingung.jpeg'); ?>" class="tampilan-gambar" alt="bingung">
    <video class="tampilan-video" loop muted playsinline>
        <source src="<?= base_url('assets/video/bingung.mp4'); ?>" type="video/mp4">
    </video>
</div>

<div class="container-hover">
    <img src="<?= base_url('img/sad.jpeg'); ?>" class="tampilan-gambar" alt="sad">
    <video class="tampilan-video" loop muted playsinline>
        <source src="<?= base_url('assets/video/sad.mp4'); ?>" type="video/mp4">
    </video>
</div>

<script src="<?= base_url('assets/js/hover-video.js'); ?>"></script>
<script>
    const containers = document.querySelectorAll('.container-hover');
    containers.forEach(container => {
        const video = container.querySelector('.tampilan-video');

        container.addEventListener('mouseenter', () => {
            video.play();
        });

        container.addEventListener('mouseleave', () => {
            video.pause();
            video.currentTime = 0; // Mengulang video ke awal
        });
    });
</script>
</body>
</html>