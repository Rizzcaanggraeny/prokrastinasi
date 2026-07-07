<?php
// views/article/form.php — dipakai untuk mode "create" maupun "edit".
// $article bernilai null kalau mode create, atau array data kalau mode edit.
$modeEdit = isset($article);
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <a href="<?= base_url('index.php/admin/articles') ?>">Artikel</a>
  <span class="sep">/</span>
  <span><?= $modeEdit ? 'Edit' : 'Baru' ?></span>
</div>

<div class="topbar">
  <div>
    <h1><?= $modeEdit ? 'Edit Artikel' : 'Artikel Baru' ?></h1>
    <p><?= $modeEdit ? 'Ubah isi artikel ini' : 'Tulis artikel baru untuk pembaca' ?></p>
  </div>
</div>

<div class="panel form-panel">
  <form method="POST" action="index.php?page=article&action=<?= $modeEdit ? 'update&id=' . $article['id'] : 'store' ?>">

    <label>
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
      Judul
    </label>
    <input type="text" name="judul" value="<?= htmlspecialchars($article['judul'] ?? '') ?>" placeholder="Masukkan judul artikel..." required>

    <label>
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
      Isi Artikel
    </label>
    <textarea name="isi" rows="10" placeholder="Tulis konten artikel di sini..." required><?= htmlspecialchars($article['isi'] ?? '') ?></textarea>

    <label>
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
      Status
    </label>
    <select name="status">
      <option value="Draft" <?= ($article['status'] ?? '') === 'Draft' ? 'selected' : '' ?>>Draft</option>
      <option value="Terbit" <?= ($article['status'] ?? '') === 'Terbit' ? 'selected' : '' ?>>Terbit</option>
    </select>

    <div class="form-actions">
      <button type="submit" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
        Simpan
      </button>
      <a href="index.php?page=article" class="btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        Batal
      </a>
    </div>
  </form>
</div>
