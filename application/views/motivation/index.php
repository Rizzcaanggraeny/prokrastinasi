<div class="topbar">
  <div>
    <h1>Motivation</h1>
    <p>Kutipan motivasi harian</p>
  </div>
  <div class="topbar-actions">
    <a href="index.php?page=motivation&action=create" class="btn-primary">+ Kutipan baru</a>
  </div>
</div>

<div class="panel">
  <h2>Daftar kutipan</h2>
  <table>
    <thead>
      <tr>
        <th>Kutipan</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($motivations)): ?>
      <tr><td colspan="4" style="color:var(--text-dim); padding:20px 0;">Belum ada kutipan.</td></tr>
      <?php endif; ?>

      <?php foreach ($motivations as $item): ?>
      <tr>
        <td class="judul"><?= htmlspecialchars($item['kutipan']) ?></td>
        <td><?= htmlspecialchars($item['dibuat']) ?></td>
        <td>
          <span class="badge <?= $item['status'] === 'Terbit' ? 'terbit' : 'draft' ?>">
            <?= htmlspecialchars($item['status']) ?>
          </span>
        </td>
        <td>
          <div class="actions">
            <a href="index.php?page=motivation&action=edit&id=<?= $item['id'] ?>" title="Edit">✎</a>
            <a href="index.php?page=motivation&action=delete&id=<?= $item['id'] ?>"
               title="Hapus" onclick="return confirm('Hapus kutipan ini?');">🗑</a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
