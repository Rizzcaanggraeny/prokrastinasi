<?php
// views/article/form.php — dipakai untuk mode "create" maupun "edit".
// $article bernilai null kalau mode create, atau array data kalau mode edit.
$modeEdit = isset($article);
?>
<div class="topbar">
  <div>
    <h1><?= $modeEdit ? 'Edit artikel' : 'Artikel baru' ?></h1>
    <p><?= $modeEdit ? 'Ubah isi artikel ini' : 'Tulis artikel baru untuk pembaca' ?></p>
  </div>
</div>

<div class="panel form-panel">
  <form method="POST" action="index.php?page=article&action=<?= $modeEdit ? 'update&id=' . $article['id'] : 'store' ?>">
    <label>Judul</label>
    <input type="text" name="judul" value="<?= htmlspecialchars($article['judul'] ?? '') ?>" required>

    <label>Isi artikel</label>
    <textarea name="isi" rows="8" required><?= htmlspecialchars($article['isi'] ?? '') ?></textarea>

    <label>Status</label>
    <select name="status">
      <option value="Draft" <?= ($article['status'] ?? '') === 'Draft' ? 'selected' : '' ?>>Draft</option>
      <option value="Terbit" <?= ($article['status'] ?? '') === 'Terbit' ? 'selected' : '' ?>>Terbit</option>
    </select>

    <div class="form-actions">
      <button type="submit" class="btn-primary">Simpan</button>
      <a href="index.php?page=article" class="btn-secondary">Batal</a>
    </div>
  </form>
</div>
