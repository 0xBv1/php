<?php
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

$user_id = 22; // Assume user ID is stored in session
$sql = "SELECT products.count,products.discounts,products.img, products.id_p, products.product_names, products.prices, cart.qty 
        FROM cart 
        JOIN products ON cart.id_p = products.id_p 
        WHERE cart.id_u = $user_id";
        
$result = mysqli_query($conn, $sql);

$cart_items = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }
}
var_dump(count($cart_items));



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <!-- <div class="cart-icon">
        <a href="#" id="cart-link">Cart</a>
        <div id="cart-dropdown" style="display:none;">
            
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item">
                        <p><?php echo htmlspecialchars($item['product_names']); ?></p>
                        <p>Price: $<?php echo htmlspecialchars($item['prices']); ?></p>
                        <p>Quantity: <?php echo htmlspecialchars($item['qty']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.getElementById('cart-link').addEventListener('click', function(event) {
            event.preventDefault();
            var dropdown = document.getElementById('cart-dropdown');
            if (dropdown.style.display === 'none') {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        });
    </script> -->
</body>
</html