<?php
session_start();
include("../config/db.php");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "❌ Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | FoodHub</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header class="navbar">
  <div class="logo">🍴 FoodHub Admin</div>
  <nav>
    <ul>
      <li><a href="../home.php">Home</a></li>
    </ul>
  </nav>
</header>

<div class="form-container">
  <h2 style="text-align:center;color:#00ff88;">Admin Login</h2>

  <?php if (isset($error)) echo "<p style='color:red;text-align:center;'>$error</p>"; ?>

  <form action="" method="POST">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <button type="submit" name="login">Login</button>
  </form>
</div>

<footer class="footer">
  <p>© 2025 FoodHub | Admin Panel</p>
</footer>

</body>
</html>
