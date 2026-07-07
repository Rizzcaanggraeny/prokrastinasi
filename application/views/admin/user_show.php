<?php
// views/admin/user_show.php — admin view of a single user profile
$userInitial = strtoupper(substr($user['nama'] ?? 'U', 0, 1));
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <a href="<?= base_url('index.php/admin/users') ?>">Pengguna</a>
  <span class="sep">/</span>
  <span>Detail</span>
</div>

<div class="topbar">
  <div>
    <h1><?= htmlspecialchars($user['nama'] ?? 'User') ?></h1>
    <p>Detail profil pengguna</p>
  </div>
  <div class="topbar-actions">
    <a href="<?= base_url('index.php/admin/users') ?>" class="btn-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
      Kembali
    </a>
  </div>
</div>

<div class="panel">
  <!-- Profile header in detail -->
  <div class="profile-header">
    <div class="profile-avatar-lg"><?= $userInitial ?></div>
    <div class="profile-info">
      <h3><?= htmlspecialchars($user['nama'] ?? '') ?></h3>
      <p><?= htmlspecialchars($user['email'] ?? '') ?></p>
    </div>
  </div>

  <!-- Detail cards -->
  <div class="user-detail-card">
    <div class="detail-item">
      <div class="detail-label">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        Nama Lengkap
      </div>
      <div class="detail-value"><?= htmlspecialchars($user['nama'] ?? '') ?></div>
    </div>
    <div class="detail-item">
      <div class="detail-label">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        Email
      </div>
      <div class="detail-value"><?= htmlspecialchars($user['email'] ?? '') ?></div>
    </div>
    <?php if (isset($user['created_at'])): ?>
    <div class="detail-item">
      <div class="detail-label">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        Terdaftar Sejak
      </div>
      <div class="detail-value"><?= htmlspecialchars($user['created_at']) ?></div>
    </div>
    <?php endif; ?>
  </div>
</div>
