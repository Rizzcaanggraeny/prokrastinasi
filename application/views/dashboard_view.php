<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        *{ box-sizing:border-box; }
        body{ margin:0; min-height:100vh; font-family:Arial,sans-serif; background:#000; color:#111; }
        .navbar{ background:white; padding:20px 30px; display:flex; justify-content:space-between; align-items:center; }
        .navbar h2{ margin:0; font-size:24px; }
        .profile{ display:flex; align-items:center; gap:12px; }
        .avatar{ width:45px; height:45px; border-radius:50%; background:#111; color:white; display:flex; justify-content:center; align-items:center; font-weight:bold; font-size:20px; }
        .content{ min-height:calc(100vh - 85px); display:flex; justify-content:center; align-items:flex-start; padding:35px 20px; background: linear-gradient(to bottom, #ffffff 0%, #f3f3f3 20%, #d9d9d9 40%, #000000 100%); }
        .card{ background:white; width:100%; max-width:700px; padding:30px; border-radius:28px; box-shadow:0 10px 25px rgba(0,0,0,0.18); }
        .menu-btn{ display:inline-block; margin-right:12px; padding:12px 22px; border-radius:25px; text-decoration:none; background:#111; color:white; font-size:16px; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>Procrastination Tracker</h2>
        <div class="profile">
            <div class="avatar"><?= strtoupper(substr($username, 0, 1)); ?></div>
            <span><?= $username; ?></span>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <h3>Today's Tasks</h3>
            <ul>
                <li>Finish UI Design</li>
                <li>Complete Statistics Assignment</li>
                <li>Prepare Presentation</li>
            </ul>

            <a href="<?= base_url('index.php/dashboard/profile'); ?>" class="menu-btn">Profile</a>
            <a href="<?= base_url('index.php/auth/logout'); ?>" class="menu-btn">Logout</a>
        </div>
    </div>

</body>
</html>