<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body{ 
            margin:0; 
            height:100vh; 
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
            margin-top: 50px;
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
            top:50%; 
            transform:translateY(-50%); 
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
    </style>
</head>
<body>

    <div class="container">
        <img src="<?= base_url('img/login.jpeg'); ?>" alt="Login Image" class="top-image">

        <div class="login-box">
            <h1>Ready to Be Productive?</h1>
            <p>Log in and turn your plans into action.</p>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert" style="color:#1a7a1a;"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>

            <form action="<?= base_url('index.php/auth/login_process'); ?>" method="POST">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Email" required>
                </div>

                <div class="input-box password-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span onclick="togglePassword()">👁</span>
                </div>

                <button type="submit">Login</button>
            </form>

            <div style="margin-top:18px; font-size:14px; color:#555;">
                Belum punya akun? <a href="<?= base_url('index.php/register'); ?>" style="color:#111; font-weight:bold; text-decoration:none;">Daftar di sini</a>
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