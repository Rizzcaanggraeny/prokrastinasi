<?php
// views/layout/header.php — bagian atas setiap halaman.
// Variabel $judulHalaman dan $deskripsiHalaman diisi oleh masing-masing controller
// sebelum file view di-include.

// Proteksi: jika view memasukkan header tapi belum ada session admin_logged_in, arahkan ke login admin
if (isset($this) && isset($this->session) && !$this->session->userdata('admin_logged_in')) {
  redirect('adminauth');
}

$adminName = '';
if (isset($this) && isset($this->session)) {
    $adminName = $this->session->userdata('admin_name') ?? 'Admin';
}
$adminInitial = strtoupper(substr($adminName, 0, 1));
if (empty($adminInitial)) $adminInitial = 'A';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Bye Prokrastinasi — Admin Panel untuk mengelola konten anti-prokrastinasi">
<meta name="theme-color" content="#060911">
<title><?= htmlspecialchars($judulHalaman ?? 'Dashboard Admin') ?> — Bye Prokrastinasi</title>
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<!-- Mobile Toggle -->
<button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
</button>

<!-- Sidebar Overlay (mobile) -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="app">

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-inner">
      <!-- Brand -->
      <a href="<?= base_url('index.php/admin') ?>" class="brand">
        <div class="brand-icon">
          <!-- Target/Focus icon -->
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
        </div>
        <span class="brand-text">Bye Prokrastinasi</span>
      </a>

      <div class="nav-label">Menu Utama</div>

      <!-- Navigation -->
      <nav>
        <a href="<?= base_url('index.php/admin') ?>" class="<?= $halamanAktif === 'dashboard' ? 'active' : '' ?>">
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"></rect><rect x="14" y="3" width="7" height="7" rx="1"></rect><rect x="3" y="14" width="7" height="7" rx="1"></rect><rect x="14" y="14" width="7" height="7" rx="1"></rect></svg>
          Dashboard
        </a>
        <a href="<?= base_url('index.php/admin/articles') ?>" class="<?= $halamanAktif === 'article' ? 'active' : '' ?>">
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg>
          Artikel
        </a>
        <a href="<?= base_url('index.php/admin/users') ?>" class="<?= $halamanAktif === 'users' ? 'active' : '' ?>">
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          Pengguna
        </a>
        <a href="<?= base_url('index.php/admin/profile') ?>" class="<?= $halamanAktif === 'profile' ? 'active' : '' ?>">
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          Profil
        </a>
      </nav>

      <!-- Sidebar Bottom -->
      <div class="sidebar-bottom">
        <div class="sidebar-user">
          <div class="sidebar-avatar"><?= $adminInitial ?></div>
          <div class="sidebar-user-info">
            <div class="sidebar-user-name"><?= htmlspecialchars($adminName) ?></div>
            <div class="sidebar-user-role">Administrator</div>
          </div>
        </div>
        <a href="<?= base_url('index.php/auth/logout') ?>" class="logout-link">
          <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
          Keluar
        </a>
      </div>
    </div>
  </aside>

  <main class="main">
