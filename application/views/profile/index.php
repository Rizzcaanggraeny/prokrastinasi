<?php
// views/profile/index.php
?>

<div class="profile-page">
  <div class="profile-breadcrumb">
    <a href="<?= base_url('index.php/admin') ?>">Dashboard</a>
    <span>/ Profil Admin</span>
  </div>

  <div class="profile-topbar">
    <div>
      <h1>Profil Admin</h1>
      <p>Kelola informasi akun administrator di dashboard.</p>
    </div>
    <div class="profile-actions">
      <button id="editProfileBtn" class="btn-secondary" type="button">Edit Profile</button>
      <button id="changePasswordBtn" class="btn-secondary" type="button">Change Password</button>
    </div>
  </div>

  <div id="profileToast" class="profile-toast hidden"></div>
  <div id="profileError" class="profile-error hidden">
    <p>Data profil gagal dimuat. Silakan coba lagi.</p>
    <button id="profileRetryBtn" class="btn-primary btn-sm" type="button">Retry</button>
  </div>

  <div id="profileSkeleton" class="profile-skeleton">
    <div class="skeleton-card"></div>
    <div class="skeleton-grid">
      <div class="skeleton-line"></div>
      <div class="skeleton-line"></div>
      <div class="skeleton-line"></div>
      <div class="skeleton-line"></div>
      <div class="skeleton-line"></div>
      <div class="skeleton-line"></div>
    </div>
  </div>

  <div id="profileView" class="profile-grid hidden">
    <section class="profile-summary card">
      <div class="profile-avatar" id="profileAvatar">A</div>
      <div>
        <h2 id="profileName">Administrator</h2>
        <p id="profileEmail">admin@example.com</p>
        <p class="profile-role" id="profileRole">Administrator</p>
      </div>
    </section>

    <section class="profile-details card">
      <h3>Detail Akun</h3>
      <div class="detail-row"><span>Nama Lengkap</span><strong id="profileNameDetail">Administrator</strong></div>
      <div class="detail-row"><span>Username</span><strong id="profileUsername">admin</strong></div>
      <div class="detail-row"><span>Email</span><strong id="profileEmailDetail">admin@example.com</strong></div>
      <div class="detail-row"><span>Role</span><strong id="profileRoleDetail">Administrator</strong></div>
      <div class="detail-row"><span>Nomor Telepon</span><strong id="profilePhone">081234567890</strong></div>
      <div class="detail-row"><span>Status Akun</span><strong id="profileStatus">Aktif</strong></div>
      <div class="detail-row"><span>Tanggal Bergabung</span><strong id="profileJoined">2024-01-01</strong></div>
      <div class="detail-row"><span>Terakhir Login</span><strong id="profileLastLogin">2024-01-01 12:00</strong></div>
    </section>

    <section class="profile-panel card" id="profileEditPanel">
      <div class="panel-header">
        <h3>Edit Profile</h3>
        <span class="panel-note">Mode tampilan. Klik Edit Profile untuk mulai mengubah.</span>
      </div>

      <form id="profileForm" class="profile-form">
        <div class="form-grid">
          <label>
            Nama Lengkap
            <input id="inputName" name="nama" type="text" placeholder="Nama lengkap" disabled required>
          </label>
          <label>
            Username
            <input id="inputUsername" name="username" type="text" placeholder="Username" disabled>
          </label>
          <label>
            Email
            <input id="inputEmail" name="email" type="email" placeholder="Email" disabled required>
          </label>
          <label>
            Role
            <input id="inputRole" name="role" type="text" placeholder="Role" disabled required>
          </label>
          <label>
            Nomor Telepon
            <input id="inputPhone" name="phone" type="tel" placeholder="08xxxx" disabled>
          </label>
          <label>
            Status Akun
            <select id="inputStatus" name="status" disabled>
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            </select>
          </label>
          <label>
            Tanggal Bergabung
            <input id="inputJoined" name="joined_at" type="date" disabled>
          </label>
          <label>
            Terakhir Login
            <input id="inputLastLogin" name="last_login" type="datetime-local" disabled>
          </label>
          <label class="full-width">
            Bio
            <textarea id="inputBio" name="bio" rows="5" placeholder="Tulis bio singkat..." disabled></textarea>
          </label>
        </div>

        <div class="form-actions profile-form-actions hidden" id="profileFormActions">
          <button id="saveProfileBtn" class="btn-primary" type="button">Save Changes</button>
          <button id="cancelProfileBtn" class="btn-secondary" type="button">Cancel</button>
        </div>
      </form>
    </section>
  </div>

  <section class="profile-panel card hidden" id="passwordPanel">
    <div class="panel-header">
      <h3>Change Password</h3>
      <span class="panel-note">Aman dan cepat, dengan validasi langsung.</span>
    </div>
    <form id="passwordForm" class="profile-form">
      <div class="form-grid">
        <label>
          Password Saat Ini
          <input id="currentPassword" name="current_password" type="password" placeholder="Password saat ini" required>
        </label>
        <label>
          Password Baru
          <input id="newPassword" name="new_password" type="password" placeholder="Password baru" required>
        </label>
        <label>
          Konfirmasi Password
          <input id="confirmPassword" name="confirm_password" type="password" placeholder="Konfirmasi password" required>
        </label>
      </div>
      <div class="form-actions">
        <button id="savePasswordBtn" class="btn-primary" type="button">Save Changes</button>
      </div>
    </form>
  </section>
</div>

<style>
.profile-page{max-width:1180px;margin:0 auto;padding:24px 20px;}
.profile-breadcrumb{display:flex;align-items:center;gap:.75rem;color:var(--text-dim);font-size:.95rem;margin-bottom:18px;}
.profile-breadcrumb a{color:var(--text);text-decoration:none;font-weight:600;}
.profile-topbar{display:flex;justify-content:space-between;align-items:flex-start;gap:18px;margin-bottom:24px;flex-wrap:wrap;}
.profile-topbar h1{margin:0;font-size:2rem;letter-spacing:-.02em;}
.profile-topbar p{margin:.4rem 0 0;color:var(--text-dim);max-width:640px;}
.profile-actions{display:flex;gap:12px;flex-wrap:wrap;}
.profile-grid{display:grid;grid-template-columns:320px minmax(380px,1fr);gap:20px;}
.card{background:var(--panel);border:1px solid var(--border);border-radius:22px;padding:24px;}
.profile-summary{display:flex;align-items:center;gap:18px;}
.profile-avatar{width:98px;height:98px;border-radius:24px;background:linear-gradient(135deg,#3b82f6,#0f172a);display:flex;align-items:center;justify-content:center;font-size:36px;font-weight:700;color:#fff;box-shadow:0 18px 48px rgba(16,24,40,.15);}
.profile-role{margin:.55rem 0 0;color:var(--accent-dim);font-weight:600;}
.profile-details h3,.profile-panel .panel-header h3{margin:0 0 18px 0;font-size:1.1rem;}
.detail-row{display:grid;grid-template-columns:150px 1fr;gap:12px;padding:14px 0;border-top:1px solid var(--border);} 
.detail-row:first-child{border-top:none;}
.detail-row span{color:var(--text-dim);font-size:.95rem;}
.detail-row strong{color:var(--text);}
.panel-header{display:flex;justify-content:space-between;align-items:flex-start;gap:16px;margin-bottom:18px;}
.panel-note{color:var(--text-dim);font-size:.95rem;max-width:65%;}
.profile-form .form-grid{display:grid;grid-template-columns:repeat(2,minmax(180px,1fr));gap:18px;}
.profile-form label{display:flex;flex-direction:column;gap:10px;color:var(--text-dim);font-size:.95rem;}
.profile-form label.full-width{grid-column:1/-1;}
.profile-form input,.profile-form textarea,.profile-form select{background: #0d0f12;border:1px solid var(--border);border-radius:12px;color:var(--text);padding:14px 16px;font-size:1rem;}
.profile-form textarea{resize:vertical;min-height:120px;}
.profile-form-actions{display:flex;justify-content:flex-end;gap:12px;margin-top:24px;}
.btn-sm{padding:.7rem 1rem;}
.profile-toast, .profile-error{border-radius:18px;padding:16px 20px;margin-bottom:18px;display:flex;justify-content:space-between;align-items:center;gap:16px;box-shadow:0 18px 48px rgba(16,24,40,.12);}
.profile-toast{background:rgba(53,197,106,.12);color:var(--green);border:1px solid rgba(53,197,106,.22);}
.profile-error{background:rgba(227,154,59,.12);color:var(--orange);border:1px solid rgba(227,154,59,.22);}
.profile-error p{margin:0;font-size:1rem;}
.profile-skeleton{display:grid;gap:18px;}
.skeleton-card,.skeleton-line{background:rgba(255,255,255,.05);border-radius:14px;animation:shimmer 1.4s ease infinite;}
.skeleton-card{height:140px;}
.skeleton-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
.skeleton-line{height:48px;}
.hidden{display:none;}
@keyframes shimmer{0%{background-position:-400px 0;}100%{background-position:400px 0;}}
@media (max-width: 900px){.profile-grid{grid-template-columns:1fr;} .profile-form .form-grid{grid-template-columns:1fr;}}
</style>

<script>
(function(){
  const profileView = document.getElementById('profileView');
  const skeleton = document.getElementById('profileSkeleton');
  const errorBox = document.getElementById('profileError');
  const toast = document.getElementById('profileToast');
  const retryBtn = document.getElementById('profileRetryBtn');
  const editBtn = document.getElementById('editProfileBtn');
  const changeBtn = document.getElementById('changePasswordBtn');
  const saveProfileBtn = document.getElementById('saveProfileBtn');
  const cancelBtn = document.getElementById('cancelProfileBtn');
  const savePasswordBtn = document.getElementById('savePasswordBtn');
  const formActions = document.getElementById('profileFormActions');
  const passwordPanel = document.getElementById('passwordPanel');

  const fields = {
    avatar: document.getElementById('profileAvatar'),
    name: document.getElementById('profileName'),
    email: document.getElementById('profileEmail'),
    role: document.getElementById('profileRole'),
    nameDetail: document.getElementById('profileNameDetail'),
    username: document.getElementById('profileUsername'),
    emailDetail: document.getElementById('profileEmailDetail'),
    roleDetail: document.getElementById('profileRoleDetail'),
    phone: document.getElementById('profilePhone'),
    status: document.getElementById('profileStatus'),
    joined: document.getElementById('profileJoined'),
    lastLogin: document.getElementById('profileLastLogin'),
    inputName: document.getElementById('inputName'),
    inputUsername: document.getElementById('inputUsername'),
    inputEmail: document.getElementById('inputEmail'),
    inputRole: document.getElementById('inputRole'),
    inputPhone: document.getElementById('inputPhone'),
    inputStatus: document.getElementById('inputStatus'),
    inputJoined: document.getElementById('inputJoined'),
    inputLastLogin: document.getElementById('inputLastLogin'),
    inputBio: document.getElementById('inputBio')
  };

  let originalData = {};
  let editing = false;

  function showToast(message, isError) {
    toast.textContent = message;
    toast.className = isError ? 'profile-error' : 'profile-toast';
    toast.classList.remove('hidden');
    setTimeout(() => toast.classList.add('hidden'), 4500);
  }

  function setLoading(enabled) {
    skeleton.classList.toggle('hidden', !enabled);
    profileView.classList.toggle('hidden', enabled);
    errorBox.classList.add('hidden');
  }

  function showError() {
    skeleton.classList.add('hidden');
    profileView.classList.add('hidden');
    errorBox.classList.remove('hidden');
  }

  function toggleEditMode(enable) {
    editing = enable;
    const inputs = [fields.inputName, fields.inputEmail, fields.inputRole, fields.inputPhone, fields.inputStatus, fields.inputJoined, fields.inputLastLogin, fields.inputBio];
    inputs.forEach(input => input.disabled = !enable);
    formActions.classList.toggle('hidden', !enable);
    editBtn.textContent = enable ? 'Viewing Profile' : 'Edit Profile';
  }

  function formatDateTime(value) {
    if (!value) return '';
    const dt = new Date(value);
    if (isNaN(dt)) return value;
    const pad = n => String(n).padStart(2,'0');
    return `${dt.getFullYear()}-${pad(dt.getMonth()+1)}-${pad(dt.getDate())}T${pad(dt.getHours())}:${pad(dt.getMinutes())}`;
  }

  function populate(data) {
    originalData = data;
    const initials = data.avatar ? '' : (data.nama || 'A').charAt(0).toUpperCase();
    fields.avatar.textContent = data.avatar ? '' : initials;
    fields.name.textContent = data.nama || 'Administrator';
    fields.email.textContent = data.email || 'admin@example.com';
    fields.role.textContent = data.role || 'Administrator';
    fields.nameDetail.textContent = data.nama || 'Administrator';
    fields.username.textContent = data.username || 'admin';
    fields.emailDetail.textContent = data.email || 'admin@example.com';
    fields.roleDetail.textContent = data.role || 'Administrator';
    fields.phone.textContent = data.phone || '-';
    fields.status.textContent = data.status || 'Aktif';
    fields.joined.textContent = data.joined_at || '-';
    fields.lastLogin.textContent = data.last_login || '-';

    fields.inputName.value = data.nama || '';
    fields.inputUsername.value = data.username || '';
    fields.inputEmail.value = data.email || '';
    fields.inputRole.value = data.role || 'Administrator';
    fields.inputPhone.value = data.phone || '';
    fields.inputStatus.value = data.status || 'Aktif';
    fields.inputJoined.value = data.joined_at || '';
    fields.inputLastLogin.value = formatDateTime(data.last_login || '');
    fields.inputBio.value = data.bio || '';
  }

  function cancelChanges() {
    populate(originalData);
    toggleEditMode(false);
  }

  async function fetchProfile() {
    setLoading(true);
    try {
      const response = await fetch('<?= base_url('index.php/admin/profile_data') ?>');
      const json = await response.json();
      if (json.status !== 'success') throw new Error(json.message || 'Gagal memuat data');
      populate(json.data);
      profileView.classList.remove('hidden');
      skeleton.classList.add('hidden');
      errorBox.classList.add('hidden');
    } catch (err) {
      console.error(err);
      showError();
      showToast('Gagal memuat profil. Coba ulang.', true);
    }
  }

  async function saveProfile() {
    const formData = new FormData();
    formData.append('nama', fields.inputName.value.trim());
    formData.append('email', fields.inputEmail.value.trim());
    formData.append('role', fields.inputRole.value.trim());
    formData.append('phone', fields.inputPhone.value.trim());
    formData.append('status', fields.inputStatus.value);
    formData.append('joined_at', fields.inputJoined.value);
    formData.append('last_login', fields.inputLastLogin.value);
    formData.append('bio', fields.inputBio.value.trim());

    if (!fields.inputName.value.trim()) {
      showToast('Nama tidak boleh kosong.', true);
      return;
    }
    if (!fields.inputEmail.value.trim() || !fields.inputEmail.checkValidity()) {
      showToast('Email tidak valid.', true);
      return;
    }

    saveProfileBtn.disabled = true;
    saveProfileBtn.textContent = 'Saving...';
    try {
      const response = await fetch('<?= base_url('index.php/admin/update_profile') ?>', {
        method: 'POST',
        body: formData
      });
      const json = await response.json();
      if (json.status !== 'success') throw new Error(json.message || 'Gagal menyimpan');
      showToast(json.message, false);
      await fetchProfile();
      toggleEditMode(false);
    } catch (err) {
      console.error(err);
      showToast(err.message || 'Gagal menyimpan perubahan.', true);
    } finally {
      saveProfileBtn.disabled = false;
      saveProfileBtn.textContent = 'Save Changes';
    }
  }

  async function savePassword() {
    const current = document.getElementById('currentPassword').value.trim();
    const next = document.getElementById('newPassword').value.trim();
    const confirm = document.getElementById('confirmPassword').value.trim();
    if (!current || !next || !confirm) {
      showToast('Lengkapi semua field password.', true);
      return;
    }
    if (next.length < 8) {
      showToast('Password baru minimal 8 karakter.', true);
      return;
    }
    if (next !== confirm) {
      showToast('Konfirmasi password tidak cocok.', true);
      return;
    }

    savePasswordBtn.disabled = true;
    savePasswordBtn.textContent = 'Saving...';
    try {
      const response = await fetch('<?= base_url('index.php/admin/change_password') ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
          current_password: current,
          new_password: next,
          confirm_password: confirm
        })
      });
      const json = await response.json();
      if (json.status !== 'success') throw new Error(json.message || 'Gagal mengubah password');
      showToast(json.message, false);
      document.getElementById('passwordForm').reset();
    } catch (err) {
      console.error(err);
      showToast(err.message || 'Gagal mengubah password.', true);
    } finally {
      savePasswordBtn.disabled = false;
      savePasswordBtn.textContent = 'Save Changes';
    }
  }

  retryBtn.addEventListener('click', fetchProfile);
  editBtn.addEventListener('click', () => toggleEditMode(!editing));
  cancelBtn.addEventListener('click', cancelChanges);
  saveProfileBtn.addEventListener('click', saveProfile);
  changeBtn.addEventListener('click', () => passwordPanel.classList.toggle('hidden'));
  savePasswordBtn.addEventListener('click', savePassword);

  fetchProfile();
})();
</script>
