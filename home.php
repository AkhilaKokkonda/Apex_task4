<?php include 'includes/header.php'; ?>

<div class="container">
  <h2>Welcome to FoodHub 🍔</h2>
  <p class="tagline">Order your favorite food anytime, anywhere!</p>

  <div class="food-grid">
    <?php
    $foods = [
      ["Pizza", "Cheesy Italian pizza with veggies", 299, "assets/images/pizza.jpg"],
      ["Burger", "Grilled burger with cheese", 199, "assets/images/burger.jpg"],
      ["Pasta", "Creamy white sauce pasta", 249, "assets/images/pasta.jpg"],
      ["Sandwich", "Veggie-loaded sandwich", 149, "assets/images/sandwich.jpg"],
      ["Fries", "Golden crispy fries", 99, "assets/images/fries.jpg"],
      ["Ice Cream", "Sweet dessert for every mood", 149, "assets/images/icecream.jpg"]
    ];

    foreach ($foods as $food) {
      echo "
      <div class='food-card'>
        <img src='{$food[3]}' alt='{$food[0]}'>
        <h3>{$food[0]}</h3>
        <p>{$food[1]}</p>
        <p class='price'>₹{$food[2]}</p>
        <form action='order.php' method='POST'>
          <input type='hidden' name='item_name' value='{$food[0]}'>
          <input type='hidden' name='price' value='{$food[2]}'>
          <button type='submit' class='btn-order'>Order Now</button>
        </form>
      </div>";
    }
    ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
