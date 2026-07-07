<?php
// views/dashboard/index.php — View: hanya menampilkan data yang sudah disiapkan
// oleh DashboardController. Tidak ada query/logic data di sini.
?>
<div class="topbar">
  <div>
    <h1>Dashboard admin</h1>
    <p>Kelola konten Bye Prokrastinasi</p>
  </div>
  <div class="topbar-actions">
    <a href="index.php?page=article&action=create" class="btn-primary">+ Artikel baru</a>
    <button class="icon-btn">⋯</button>
  </div>
</div>

<div class="stats">
  <div class="stat-card">
    <div class="label">Total artikel</div>
    <div class="value"><?= (int)$totalArtikel ?></div>
  </div>
  <div class="stat-card">
    <div class="label">Motivasi terbit</div>
    <div class="value"><?= (int)$motivasiTerbit ?></div>
  </div>
  <div class="stat-card">
    <div class="label">Pengunjung minggu ini</div>
    <div class="value"><?= (int)$pengunjungMingguIni ?></div>
  </div>
</div>

<div class="panel">
  <h2>Konten terbaru</h2>
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
      <tr><td colspan="4" style="color:var(--text-dim); padding:20px 0;">Belum ada konten.</td></tr>
      <?php endif; ?>

      <?php foreach ($kontenTerbaru as $item): ?>
      <tr>
        <td class="judul"><?= htmlspecialchars($item['judul']) ?></td>
        <td><?= htmlspecialchars($item['tipe']) ?></td>
        <td>
          <span class="badge <?= $item['status'] === 'Terbit' ? 'terbit' : 'draft' ?>">
            <?= htmlspecialchars($item['status']) ?>
          </span>
        </td>
        <td>
          <div class="actions">
            <a href="index.php?page=<?= $item['tipe'] === 'Article' ? 'article' : 'motivation' ?>&action=edit&id=<?= $item['id'] ?>" title="Edit">✎</a>
            <a href="index.php?page=<?= $item['tipe'] === 'Article' ? 'article' : 'motivation' ?>&action=delete&id=<?= $item['id'] ?>"
               title="Hapus" onclick="return confirm('Hapus &quot;<?= htmlspecialchars($item['judul'], ENT_QUOTES) ?>&quot;?');">🗑</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
