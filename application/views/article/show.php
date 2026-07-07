<?php
// views/article/show.php — simple article detail view for admin/user preview
// expects $article array with keys: judul, isi, dibuat, status
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
  <a href="<?= base_url('index.php/admin') ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
  </a>
  <span class="sep">/</span>
  <a href="<?= base_url('index.php/admin/articles') ?>">Artikel</a>
  <span class="sep">/</span>
  <span>Detail</span>
</div>

<div class="topbar">
  <div>
    <h1><?= htmlspecialchars($article['judul']) ?></h1>
    <p style="display:flex; align-items:center; gap:16px;">
      <span style="display:inline-flex; align-items:center; gap:6px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <?= htmlspecialchars($article['dibuat'] ?? '') ?>
      </span>
      <span class="badge <?= ($article['status'] ?? '') === 'Terbit' ? 'terbit' : 'draft' ?>">
        <span class="badge-dot"></span>
        <?= htmlspecialchars($article['status'] ?? '') ?>
      </span>
    </p>
  </div>
  <div class="topbar-actions">
    <a href="<?= base_url('index.php/admin/articles') ?>" class="btn-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
      Kembali
    </a>
  </div>
</div>

<div class="panel">
  <div style="line-height:1.9; white-space:pre-wrap; color:var(--text); font-size:15px;">
    <?= nl2br(htmlspecialchars($article['isi'])) ?>
  </div>
</div>
