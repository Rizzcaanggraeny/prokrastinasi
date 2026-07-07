<div class="topbar">
  <div>
    <h1>Article</h1>
    <p>Semua artikel yang pernah dibuat</p>
  </div>
  <div class="topbar-actions">
    <a href="index.php?page=article&action=create" class="btn-primary">+ Artikel baru</a>
  </div>
</div>

<div class="panel">
  <h2>Daftar artikel</h2>
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
      <tr><td colspan="4" style="color:var(--text-dim); padding:20px 0;">Belum ada artikel. Klik "+ Artikel baru" untuk membuat.</td></tr>
      <?php endif; ?>

      <?php foreach ($articles as $item): ?>
      <tr>
        <td class="judul"><?= htmlspecialchars($item['judul']) ?></td>
        <td><?= htmlspecialchars($item['dibuat']) ?></td>
        <td>
          <span class="badge <?= $item['status'] === 'Terbit' ? 'terbit' : 'draft' ?>">
            <?= htmlspecialchars($item['status']) ?>
          </span>
        </td>
        <td>
          <div class="actions">
            <a href="index.php?page=article&action=edit&id=<?= $item['id'] ?>" title="Edit">✎</a>
            <a href="index.php?page=article&action=delete&id=<?= $item['id'] ?>"
               title="Hapus" onclick="return confirm('Hapus &quot;<?= htmlspecialchars($item['judul'], ENT_QUOTES) ?>&quot;?');">🗑</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
