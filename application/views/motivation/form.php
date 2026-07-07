<?php
$modeEdit = isset($motivation);
?>
<div class="topbar">
  <div>
    <h1><?= $modeEdit ? 'Edit kutipan' : 'Kutipan baru' ?></h1>
    <p>Motivasi singkat untuk pembaca</p>
  </div>
</div>

<div class="panel form-panel">
  <form method="POST" action="index.php?page=motivation&action=<?= $modeEdit ? 'update&id=' . $motivation['id'] : 'store' ?>">
    <label>Kutipan</label>
    <textarea name="kutipan" rows="4" required><?= htmlspecialchars($motivation['kutipan'] ?? '') ?></textarea>

    <label>Status</label>
    <select name="status">
      <option value="Draft" <?= ($motivation['status'] ?? '') === 'Draft' ? 'selected' : '' ?>>Draft</option>
      <option value="Terbit" <?= ($motivation['status'] ?? '') === 'Terbit' ? 'selected' : '' ?>>Terbit</option>
    </select>

    <div class="form-actions">
      <button type="submit" class="btn-primary">Simpan</button>
      <a href="index.php?page=motivation" class="btn-secondary">Batal</a>
    </div>
  </form>
</div>
