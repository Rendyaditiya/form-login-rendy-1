<?php
    session_start();
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.php');
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
    <h2>Selamat Datang <?= $_SESSION["username"] ?> </h2>

    <form action="login.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

    <footer>
      <hr />
      <i>dibuat oleh @rendyaditiya</i>
    </footer>

  </div>
</body>
</html>