<?php
// views/layout/header.php — bagian atas setiap halaman.
// Variabel $judulHalaman dan $deskripsiHalaman diisi oleh masing-masing controller
// sebelum file view di-include.
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($judulHalaman ?? 'Dashboard Admin') ?> — Bye Prokrastinasi</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="app">

  <aside class="sidebar">
    <div class="brand">
      <div class="logo">🐱</div>
      Bye admin
    </div>
    <nav>
      <a href="index.php?page=dashboard" class="<?= $halamanAktif === 'dashboard' ? 'active' : '' ?>">
        <span class="icon">▦</span> Dashboard
      </a>
      <a href="index.php?page=article" class="<?= $halamanAktif === 'article' ? 'active' : '' ?>">
        <span class="icon">📄</span> Article
      </a>
      <a href="index.php?page=motivation" class="<?= $halamanAktif === 'motivation' ? 'active' : '' ?>">
        <span class="icon">💡</span> Motivation
      </a>
      <a href="index.php?page=profile" class="<?= $halamanAktif === 'profile' ? 'active' : '' ?>">
        <span class="icon">👤</span> Profile
      </a>
    </nav>
    <div class="sidebar-bottom">
      <a href="#"><span class="icon">↩</span> Keluar</a>
    </div>
  </aside>

  <main class="main">
