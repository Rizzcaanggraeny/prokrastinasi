<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin — Bye Prokrastinasi</title>
<style>
:root{font-family:Inter,system-ui,Segoe UI,Arial,sans-serif;color:#111;background:#f5f7fb}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
.login-shell{width:100%;max-width:460px;background:#fff;border-radius:24px;box-shadow:0 28px 80px rgba(15,23,42,.12);overflow:hidden}
.login-hero{padding:32px 32px 28px;border-bottom:1px solid #eef0f5}
.login-hero h1{margin:0;font-size:1.9rem;letter-spacing:-.03em;color:#111}
.login-hero p{margin:.85rem 0 0;color:#5e667c;line-height:1.6}
.login-body{padding:32px;display:grid;gap:18px}
.form-group{display:grid;gap:10px}
.form-group label{font-size:.95rem;color:#475569}
.form-group input{width:100%;border:1px solid #d2d6dc;border-radius:16px;padding:14px 16px;font-size:1rem;color:#0f172a;background:#f8fafc}
.form-group input:focus{outline:none;border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.12)}
.alert{border-radius:14px;padding:14px 16px;font-size:.95rem}
.alert-error{background:#ffe4e6;color:#9d174d;border:1px solid #fda4af}
.btn-primary{border:none;width:100%;padding:14px 16px;border-radius:16px;background:#2563eb;color:#fff;font-size:1rem;font-weight:600;cursor:pointer}
.btn-primary:hover{background:#1d4ed8}
.login-footer{font-size:.94rem;color:#64748b;text-align:center}
.login-footer a{color:#2563eb;text-decoration:none;font-weight:600}
@media (max-width: 560px){body{padding:16px}.login-shell{border-radius:20px}}
</style>
<body>
<div class="login-shell">
  <div class="login-hero">
    <h1>Login Admin</h1>
    <p>Masuk dengan akun administrator untuk mengelola dashboard dan profil admin.</p>
  </div>
  <div class="login-body">
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-error"><?= htmlspecialchars($this->session->flashdata('error')) ?></div>
    <?php endif; ?>
    <form action="<?= base_url('index.php/adminauth/login_process') ?>" method="POST">
      <div class="form-group">
        <label for="username">Username / Email</label>
        <input id="username" type="text" name="username" placeholder="Masukkan email admin" required autofocus>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="Masukkan password" required>
      </div>
      <button type="submit" class="btn-primary">Login</button>
    </form>
  </div>
  <div class="login-footer">Belum punya akun admin? Hubungi administrator sistem.</div>
</div>
</body>
</html>
