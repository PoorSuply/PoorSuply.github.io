<?php
require('koneksi.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Login Berhasil!.'); window.location='index.php';</script>";
        exit();
    } else {
        $loginError = "Username atau password salah";
    }
}

if (isset($_POST['register'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    $insertQuery = "INSERT INTO user (username, password) VALUES ('$newUsername', '$newPassword')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "<script>alert('Registrasi anda berhasil!'); window.location='login.php';</script>";
    } else {
        $loginError = "Gagal mendaftar. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="wrapper">
    <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Register</label>
            <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <form action="login.php" method="post" class="login">
                <div class="field">
                    <input type="text" name="username" placeholder="Masukan Username" required>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="Masukan Password" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="login" value="Login">
                </div>
            </form>
            <form action="login.php" method="post" class="signup">
                <div class="field">
                    <input type="text" name="newUsername" placeholder="Masukan Username" required>
                </div>
                <div class="field">
                    <input type="password" name="newPassword" placeholder="Masukan Password" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="register" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");

    signupBtn.onclick = () => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    };

    loginBtn.onclick = () => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    };

    signupLink.onclick = () => {
        signupBtn.click();
        return false;
    };
</script>
</body>
</html>



