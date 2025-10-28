<?php
include 'includes/header.php';
include 'config/db.php';

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Please login first!'); window.location='login.php';</script>";
  exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['cancel'])) {
  $id = $_GET['cancel'];
  mysqli_query($conn, "UPDATE orders SET status='Cancelled' WHERE id=$id AND user_id=$user_id");
}

$orders = mysqli_query($conn, "SELECT * FROM orders WHERE user_id=$user_id ORDER BY id DESC");
?>

<div class="container">
  <h2>My Orders</h2>
  <?php while ($row = mysqli_fetch_assoc($orders)) { ?>
    <div class="order-item">
      <p><b><?= $row['item_name']; ?></b> - ₹<?= $row['price']; ?> | Status: <span class="<?= strtolower($row['status']); ?>"><?= $row['status']; ?></span></p>
      <?php if ($row['status'] == 'Pending') { ?>
        <a href="?cancel=<?= $row['id']; ?>"><button class="cancel-btn">Cancel</button></a>
      <?php } ?>
    </div>
  <?php } ?>
</div>

<?php include 'includes/footer.php'; ?>
