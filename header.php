<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodHub 🍕</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">🍴 FoodHub</div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <?php if(isset($_SESSION['user_id'])): ?>
          <li><a href="my_orders.php">My Orders</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
        <?php endif; ?>
        <li><a href="admin/admin_login.php" style="color:gold;">Admin</a></li>
      </ul>
    </nav>
  </header>
