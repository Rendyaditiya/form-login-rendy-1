<?php
    include "service/database.php";
    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"])) {
        header("location: login.php");
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'
        ";

        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
            
            header("location: login.php");

        }else {
            $login_message = "akun tidak ditemukan";
        }
        $db->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
    <h2>Silahkan login terlebih dahulu</h2>
    <i><?= $login_message ?></i>
    <form action="index.php" method="POST">
      <label for="username">Nama pengguna:</label>
      <input type="text" id="username" name="username" placeholder="Masukkan nama pengguna" required>
      <label for="password">Kata sandi:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
      <label>
        <input type="checkbox" name="remember"> Ingat saya
      </label>
      <button type="submit" name="login">Login</button>
      <p><a href="lupasandi.php">Lupa kata sandi Anda?</a></p>
      <p>Belum punya akun? <a href="daftar.php">Daftar sekarang</a>.</p>
    </form>
    <footer>
      <hr />
      <i>dibuat oleh @rendyaditiya</i>
    </footer>
  </div>
</body>
</html>