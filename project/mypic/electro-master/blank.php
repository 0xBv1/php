<?php
include ("header.php");

// Connection parameters
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// session_start();
$user_id = $_SESSION['id_user']; // Assume user ID is stored in session

// Perform checkout process (e.g., payment, order confirmation)
// ...

// After successful checkout, remove items from cart
$delete_query = "DELETE FROM cart WHERE id_u = $user_id";

if (mysqli_query($conn, $delete_query)) {
	// echo "<h3 class='breadcrumb-header'>Checkout complete! Items removed from cart.</h3>";
	// Optionally, you can redirect the user or show a success message
	// header('Location: success.php');
} else {
	echo "<p>Error removing items from cart: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Leave it to us this time, the order will arrive as soon as possible.</h3>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php include ("footer.php"); ?>