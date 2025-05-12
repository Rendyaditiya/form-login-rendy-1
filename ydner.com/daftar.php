<?php
    include "service/database.php";
    session_start();

    $register_message = "";

        if(isset($_SESSION["is_login"])) {
        header("location: login.php");
    }

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        try {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if($db->query($sql)) {
               $register_message = "daftar akun berhasil, silahkan login";
            }else {
               $register_message = "daftar akun gagal, silahkan coba lagi";
            }
        }catch (mysqli_sql_exception) {
            $register_message = "username sudah ada, silahkan ganti yang lain";
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
    <h2>Silakan daftar terlebih dahulu</h2>
    <i><?= $register_message ?></i>
    <form action="daftar.php" method="POST">
      <label for="username">Nama pengguna:</label>
      <input type="text" id="username" name="username" placeholder="Masukkan nama pengguna" required>
      <label for="password">Kata sandi:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
      <button type="submit" name="register">Daftar</button>
      <p><a href="index.php">Kembali Kehalaman Login</a></p>
    </form>
    <footer>
      <hr />
      <i>dibuat oleh @rendyaditiya</i>
    </footer>
  </div>
</body>
</html>