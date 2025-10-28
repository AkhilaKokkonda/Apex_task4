<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

$total_users = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users"))[0] ?? 0;
$total_orders = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM orders"))[0] ?? 0;
$total_items = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM food_items"))[0] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | FoodHub</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 40px;
    }
    .card {
      background-color: #1b1b1b;
      color: #fff;
      border-radius: 12px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.5);
      transition: 0.3s ease;
    }
    .card:hover { transform: scale(1.05); background-color: #262626; }
    .admin-nav {
      text-align: center;
      margin: 20px;
    }
    .admin-nav a {
      color: #00ff88;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    .logout-btn { background-color: #ff4444; color: white; padding: 6px 14px; border-radius: 6px; }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">🍴 FoodHub Admin Dashboard</div>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="manage_users.php">Users</a></li>
      <li><a href="manage_orders.php">Orders</a></li>
      <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>
  </nav>
</header>

<h2 style="text-align:center;color:#00ff88;margin-top:30px;">Welcome, <?php echo $_SESSION['admin']; ?> 👋</h2>

<div class="dashboard">
  <div class="card"><h3>Total Users</h3><p><?php echo $total_users; ?></p></div>
  <div class="card"><h3>Total Orders</h3><p><?php echo $total_orders; ?></p></div>
  <div class="card"><h3>Total Food Items</h3><p><?php echo $total_items; ?></p></div>
</div>

<footer class="footer"><p>© 2025 FoodHub | Admin Panel</p></footer>

</body>
</html>
