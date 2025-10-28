<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['admin'])) {
  header("Location: admin_login.php");
  exit;
}

$result = mysqli_query($conn, "SELECT orders.id, users.name, orders.total_amount, orders.status, orders.created_at 
                              FROM orders 
                              JOIN users ON orders.user_id = users.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Orders | FoodHub</title>
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    table {
      width: 90%;
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
    .status {
      padding: 4px 8px;
      border-radius: 4px;
      color: #000;
      font-weight: bold;
    }
    .completed { background-color: #00ff88; }
    .pending { background-color: yellow; }
    .cancelled { background-color: #ff4444; color: #fff; }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">📦 Manage Orders</div>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="manage_users.php">Users</a></li>
      <li><a href="logout.php" class="logout-btn">Logout</a></li>
    </ul>
  </nav>
</header>

<h2 style="text-align:center;color:#00ff88;">All Orders</h2>

<table>
  <tr>
    <th>Order ID</th>
    <th>User</th>
    <th>Total Amount</th>
    <th>Status</th>
    <th>Date</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td>₹<?php echo $row['total_amount']; ?></td>
      <td>
        <span class="status <?php echo strtolower($row['status']); ?>">
          <?php echo ucfirst($row['status']); ?>
        </span>
      </td>
      <td><?php echo $row['created_at']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<footer class="footer"><p>© 2025 FoodHub | Admin Panel</p></footer>

</body>
</html>
