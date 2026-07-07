<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Saya</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleprofile.css'); ?>">
</head>
<body>

<nav>
    <ul>
        <li><a href="<?= site_url('prokrastinasi'); ?>">Home</a></li>
        <li><a href="<?= site_url('motivasi'); ?>">Motivation</a></li>
        <li><a href="<?= site_url('profile'); ?>">Profile</a></li>
    </ul>
</nav>

<section class="profile-header">
    <h1>Profil Anda</h1>
    <p>Kenali karakteristik dan kebiasaan Anda dalam mengatasi prokrastinasi</p>
</section>

<section class="result-container">
    <div class="left-card">
        <img src="<?= base_url('assets/img/avatar.png'); ?>" alt="Avatar">
        <h2>The Planner</h2>
        <p>Anda cenderung terorganisir, mampu mengatur prioritas, dan menyelesaikan tugas tepat waktu.</p>
    </div>

    <div class="right-card">
        <h2>Nih To Do List Lu</h2>
        <p>JANGAN LUPA DI LAKUIN BWANG</p>
        
        <?php if (!empty($todo)): ?>

    <?php foreach ($todo as $row): ?>

        <div class="todo-item" style="margin-bottom:10px; display:flex; align-items:center;">

            <input type="checkbox" style="margin-right:10px;">

            <span><?= $row->isi; ?></span>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>Belum ada To Do List, silakan kerjakan kuis terlebih dahulu.</p>

<?php endif; ?>
    </div>
</section>

</body>
</html>