<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

$result = mysqli_query($conn, "SELECT id, name, email FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users | FoodHub</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    table {
      width: 80%;
      margin: 40px auto;
      border-collapse: collapse;
      color: white;
    }
    th, td {
      padding: 12px;
      border: 1px solid #555;
      text-align: center;
    }
    th {
      background-color: #00ff88;
      color: #000;
    }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">👥 Manage Users</div>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="manage_orders.php">Orders</a></li>
      <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>
  </nav>
</header>

<h2 style="text-align:center;color:#00ff88;">Registered Users</h2>

<table>
  <tr><th>ID</th><th>Name</th><th>Email</th></tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<footer class="footer"><p>© 2025 FoodHub | Admin Panel</p></footer>

</body>
</html>
