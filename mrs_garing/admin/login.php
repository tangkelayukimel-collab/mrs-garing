<?php
session_start();
include '../config/koneksi.php';

// Jika sudah login, langsung ke index
if (isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['user']);
    $pass = md5($_POST['pass']);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE user='$user' AND pass='$pass'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $user;
        header("Location: index.php");
        exit;
    } else {
        $error = "User atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Mrs Garing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background: #FFF8C5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .login-box h3 {
            color: #D90429;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 12px;
        }
        .form-group input {
            width: 100%;
            padding: 11px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }
        .form-group input:focus {
            border-color: #D90429;
        }
        .btn-login {
            width: 100%;
            padding: 11px;
            margin-top: 10px;
            background: #D90429;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-login:hover {
            background: #b80322;
        }
        .alert-error {
            background: #ffe0e0;
            color: #D90429;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h3>Login Admin Mrs Garing</h3>

        <?php if ($error != "") : ?>
            <div class="alert-error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">
            <div class="form-group">
                <input type="text" name="user" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn-login">Login</button>
        </form>
    </div>

</body>
</html>