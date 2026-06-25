<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Saya</title>

    <link rel="stylesheet"
    href="<?= base_url('assets/css/styleprofile.css'); ?>">
</head>

<body>

<nav>
    <ul>
        <li>
            <a href="<?= site_url('profile'); ?>">
                Home
            </a>
        </li>

        <li><a href="#">Motivation</a></li>
        <li><a href="#">Profile</a></li>
    </ul>
</nav>

<section class="profile-header">

    <h1>Profil Anda</h1>

    <p>
        Kenali karakteristik dan kebiasaan
        Anda dalam mengatasi prokrastinasi
    </p>

</section>

<section class="result-container">

    <div class="left-card">

        <img src="<?= base_url('assets/img/avatar.png'); ?>">

        <h2>The Planner</h2>

        <p>
            Anda cenderung terorganisir,
            mampu mengatur prioritas,
            dan menyelesaikan tugas tepat waktu.
        </p>

    </div>

    <div class="right-card">

        <h2>Sifat-Sifat Kepribadian</h2>

        <div class="trait">
            <span>85% Disiplin</span>
            <div class="bar">
                <div class="fill" style="width:85%"></div>
            </div>
        </div>

        <div class="trait">
            <span>78% Fokus</span>
            <div class="bar">
                <div class="fill" style="width:78%"></div>
            </div>
        </div>

        <div class="trait">
            <span>90% Motivasi</span>
            <div class="bar">
                <div class="fill" style="width:90%"></div>
            </div>
        </div>

        <div class="trait">
            <span>80% Manajemen Waktu</span>
            <div class="bar">
                <div class="fill" style="width:80%"></div>
            </div>
        </div>

    </div>

</section>
<link rel="stylesheet" type="text/css" hreaf="<?php echo base_url()
?>assets/css/styleprofile.css">

</body>
</html>