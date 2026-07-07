<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body{ 
            margin:0; 
            min-height:100vh; 
            display:flex; 
            justify-content:center; 
            align-items:center; 
            background:white; 
            font-family:Arial,sans-serif; 
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 50px 0;
        }

        .top-image {
            width: 200px;
            position: relative;
            z-index: 2;
            margin-bottom: -60px;
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 60px 35px 35px 35px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .login-box h1{ 
            color:#111; 
            margin-top: 0;
            margin-bottom:10px; 
        }

        .login-box p{ 
            color:#555; 
            margin-bottom:25px; 
        }

        .input-box{ 
            margin-bottom:18px; 
            text-align: left;
        }

        .input-box label {
            display: block;
            font-size: 13px;
            color: #555;
            margin-bottom: 6px;
        }

        .input-box input{ 
            width:100%; 
            padding:14px; 
            border:none; 
            border-radius:30px; 
            background:#f3f3f3; 
            font-size:16px; 
            outline:none; 
            box-sizing:border-box; 
        }

        .password-box{ 
            position:relative; 
        }

        .password-box span{ 
            position:absolute; 
            right:18px; 
            top:42px; 
            cursor:pointer; 
        }

        button{ 
            width:100%; 
            padding:14px; 
            border:none; 
            border-radius:30px; 
            background:#111; 
            color:white; 
            font-size:16px; 
            cursor:pointer; 
        }

        button:hover{ 
            background:#333; 
        }

        .alert { 
            color: red; 
            margin-bottom: 15px; 
        }

        .login-link {
            margin-top: 18px;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #111;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="<?= base_url('img/login.jpeg'); ?>" alt="Register Image" class="top-image">

        <div class="login-box">
            <h1>Buat Akun Baru</h1>
            <p>Daftar untuk mulai kelola produktivitasmu.</p>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form action="<?= base_url('index.php/register/register_process'); ?>" method="POST">
                <div class="input-box">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama lengkap" required>
                </div>

                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box password-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span onclick="togglePassword()">👁</span>
                </div>

                <button type="submit">Daftar</button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="<?= base_url('index.php/auth'); ?>">Login di sini</a>
            </div>
        </div>
    </div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    password.type = password.type === "password" ? "text" : "password";
}
</script>
</body>
</html>