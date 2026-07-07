<div class="topbar">
  <div>
    <h1>Profile</h1>
    <p>Informasi akun admin</p>
  </div>
</div>

<?php if (!empty($tersimpan)): ?>
<div class="alert-success">Profil berhasil disimpan.</div>
<?php endif; ?>

<div class="panel form-panel">
  <form method="POST" action="index.php?page=profile&action=update">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($profile['nama']) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($profile['email']) ?>" required>

    <label>Bio</label>
    <textarea name="bio" rows="4"><?= htmlspecialchars($profile['bio']) ?></textarea>

    <div class="form-actions">
      <button type="submit" class="btn-primary">Simpan perubahan</button>
    </div>
  </form>
</div>
