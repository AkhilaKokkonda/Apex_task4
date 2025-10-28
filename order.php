<?php
session_start();
include 'config/db.php';

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Please login to order!'); window.location='login.php';</script>";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_id'];
  $item_name = $_POST['item_name'];
  $price = $_POST['price'];

  $query = "INSERT INTO orders (user_id, item_name, price, status) VALUES ('$user_id', '$item_name', '$price', 'Pending')";
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Order placed successfully!'); window.location='my_orders.php';</script>";
  } else {
    echo "<script>alert('Error placing order.');</script>";
  }
}
?>
