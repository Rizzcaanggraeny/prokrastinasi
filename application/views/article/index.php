<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <span>Artikel</span>
</div>

<div class="topbar">
  <div>
    <h1>Artikel</h1>
    <p>Semua artikel yang pernah dibuat</p>
  </div>
  <div class="topbar-actions">
    <a href="index.php?page=article&action=create" class="btn-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
      Artikel Baru
    </a>
  </div>
</div>

<div class="panel">
  <h2>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
    Daftar Artikel
  </h2>
  <table>
    <thead>
      <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($articles)): ?>
      <tr>
        <td colspan="4">
          <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
            <p>Belum ada artikel. Klik "Artikel Baru" untuk membuat.</p>
          </div>
        </td>
      </tr>
      <?php endif; ?>

      <?php foreach ($articles as $item): ?>
      <tr>
        <td class="judul"><?= htmlspecialchars($item['judul']) ?></td>
        <td style="color:var(--text-dim);"><?= htmlspecialchars($item['dibuat']) ?></td>
        <td>
          <span class="badge <?= $item['status'] === 'Terbit' ? 'terbit' : 'draft' ?>">
            <span class="badge-dot"></span>
            <?= htmlspecialchars($item['status']) ?>
          </span>
        </td>
        <td>
          <div class="actions">
            <a href="index.php?page=article&action=edit&id=<?= $item['id'] ?>" title="Edit" class="action-view">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            </a>
            <a href="index.php?page=article&action=delete&id=<?= $item['id'] ?>"
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
