<?php
session_start();
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);



$user_id = $_SESSION['id_user']; // Assume user ID is stored in session
$sql = "SELECT products.id_p, products.product_names, products.prices, cart.qty 
        FROM cart 
        JOIN products ON cart.id_p = products.id_p 
        WHERE cart.id_u = $user_id";
        
$result = mysqli_query($conn, $sql);

$cart_items = [];
$total_price = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
        $total_price += $row['prices'] * $row['qty'];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <h2>Cart Items</h2>
    <?php if (!empty($cart_items)): ?>
        <ul>
            <?php foreach ($cart_items as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['product_names']); ?> - 
                    $<?php echo htmlspecialchars($item['prices']); ?> x 
                    <?php echo htmlspecialchars($item['qty']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total Price: $<?php echo $total_price; ?></p>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <h2>Billing Information</h2>
    <form action="process_checkout.php" method="post">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
