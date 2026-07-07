<?php
// views/dashboard/index.php — View: hanya menampilkan data yang sudah disiapkan
// oleh DashboardController. Tidak ada query/logic data di sini.

$adminName = '';
if (isset($this) && isset($this->session)) {
    $adminName = $this->session->userdata('username') ?? 'Admin';
}
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <span>Dashboard</span>
</div>

<!-- Welcome Banner -->
<div class="welcome-banner">
  <h2>Selamat datang, <?= htmlspecialchars($adminName) ?>!</h2>
  <p>Kelola konten Bye Prokrastinasi dan bantu pengguna menjadi lebih produktif.</p>
  <div class="welcome-date">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
    <?= date('l, d F Y') ?>
  </div>
</div>

<!-- Stat Cards -->
<div class="stats">
  <div class="stat-card">
    <div class="stat-header">
      <div class="label">Total Artikel</div>
      <div class="stat-icon purple">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
      </div>
    </div>
    <div class="value"><?= (int)$totalArtikel ?></div>
  </div>

  <div class="stat-card">
    <div class="stat-header">
      <div class="label">Pengunjung Minggu Ini</div>
      <div class="stat-icon green">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      </div>
    </div>
    <div class="value"><?= (int)$pengunjungMingguIni ?></div>
  </div>

  <div class="stat-card">
    <div class="stat-header">
      <div class="label">Motivasi Terbit</div>
      <div class="stat-icon orange">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
      </div>
    </div>
    <div class="value"><?= isset($motivasiTerbit) ? (int)$motivasiTerbit : 0 ?></div>
  </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
  <a href="<?= base_url('index.php/admin/articles') ?>" class="quick-action">
    <div class="qa-icon purple">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
    </div>
    Tulis Artikel
  </a>
  <a href="<?= base_url('index.php/admin/users') ?>" class="quick-action">
    <div class="qa-icon green">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
    </div>
    Kelola Pengguna
  </a>
  <a href="<?= base_url('index.php/admin/profile') ?>" class="quick-action">
    <div class="qa-icon orange">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
    </div>
    Pengaturan Profil
  </a>
</div>

<!-- Recent Content Table -->
<div class="panel">
  <h2>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
    Konten Terbaru
  </h2>
  <table>
    <thead>
      <tr>
        <th>Judul</th>
        <th>Tipe</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($kontenTerbaru)): ?>
      <tr>
        <td colspan="4">
          <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
            <p>Belum ada konten. Mulai buat artikel pertama Anda!</p>
          </div>
        </td>
      </tr>
      <?php endif; ?>

      <?php foreach ($kontenTerbaru as $item): ?>
      <tr>
        <td class="judul"><?= htmlspecialchars($item['judul']) ?></td>
        <td>
          <span class="type-badge">
            <?php if ($item['tipe'] === 'Article'): ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
            <?php else: ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            <?php endif; ?>
            <?= htmlspecialchars($item['tipe']) ?>
          </span>
        </td>
        <td>
          <span class="badge <?= $item['status'] === 'Terbit' ? 'terbit' : 'draft' ?>">
            <span class="badge-dot"></span>
            <?= htmlspecialchars($item['status']) ?>
          </span>
        </td>
        <td>
          <div class="actions">
            <a href="index.php?page=<?= $item['tipe'] === 'Article' ? 'article' : 'motivation' ?>&action=edit&id=<?= $item['id'] ?>" title="Edit" class="action-view">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </a>
            <a href="index.php?page=<?= $item['tipe'] === 'Article' ? 'article' : 'motivation' ?>&action=delete&id=<?= $item['id'] ?>"
               title="Hapus" class="action-danger" onclick="return confirm('Hapus &quot;<?= htmlspecialchars($item['judul'], ENT_QUOTES) ?>&quot;?');">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
            </a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
