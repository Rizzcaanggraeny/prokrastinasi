<?php
// views/admin/users_index.php — admin listing of users
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <span>Pengguna</span>
</div>

<div class="topbar">
  <div>
    <h1>Pengguna</h1>
    <p>Daftar pengguna terdaftar</p>
  </div>
</div>

<div class="panel">
  <h2>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
    Daftar Pengguna
  </h2>
  <table>
    <thead>
      <tr>
        <th>Pengguna</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($users)): ?>
      <tr>
        <td colspan="3">
          <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
            <p>Belum ada pengguna terdaftar.</p>
          </div>
        </td>
      </tr>
      <?php endif; ?>

      <?php foreach ($users as $u): ?>
      <tr>
        <td>
          <div class="user-row">
            <div class="user-avatar"><?= strtoupper(substr($u['nama'] ?? 'U', 0, 1)) ?></div>
            <span class="judul"><?= htmlspecialchars($u['nama'] ?? '') ?></span>
          </div>
        </td>
        <td style="color:var(--text-dim);"><?= htmlspecialchars($u['email'] ?? '') ?></td>
        <td>
          <div class="actions">
            <a href="<?= base_url('index.php/admin/view_user/' . ($u['id_user'] ?? '')) ?>" title="Lihat Detail" class="action-view">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
