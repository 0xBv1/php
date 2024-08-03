<?php
session_start();


function sqladd($data, $table = "reg")
{
	global $conn;


	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$columns = implode(", ", array_keys($data));
	$placeholders = implode(", ", array_fill(0, count($data), "?"));
	$values = array_values($data);

	$sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

	if ($stmt = mysqli_prepare($conn, $sql)) {
		$types = str_repeat('s', count($values));
		mysqli_stmt_bind_param($stmt, $types, ...$values);

		if (mysqli_stmt_execute($stmt)) {
			echo "Record added successfully.";
		} else {
			echo "Error adding record: " . mysqli_error($conn);
		}

		mysqli_stmt_close($stmt);
	} else {
		echo "Failed to prepare statement.";
	}

	mysqli_close($conn);
}

function sqldelete($table, $condition)
{
	global $servername, $username_db, $password, $dbname;

	$conn = mysqli_connect($servername, $username_db, $password, $dbname);

	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$conditionString = "";
	$values = [];
	foreach ($condition as $column => $value) {
		$conditionString .= "$column = ? AND ";
		$values[] = $value;
	}
	$conditionString = rtrim($conditionString, " AND ");
	var_dump($conditionString);
	$sql = "DELETE FROM $table WHERE $conditionString";

	if ($stmt = mysqli_prepare($conn, $sql)) {
		$types = str_repeat('s', count($values));
		mysqli_stmt_bind_param($stmt, $types, ...$values);

		if (mysqli_stmt_execute($stmt)) {
			echo "Record deleted successfully.";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}

		mysqli_stmt_close($stmt);
	} else {
		echo "Failed to prepare statement.";
	}

	mysqli_close($conn);
}
function sqlread($statm)
{
	global $servername, $username_db, $password, $dbname;
	$conn = mysqli_connect($servername, $username_db, $password, $dbname);

	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$data = [];

	if ($stmt = mysqli_prepare($conn, $statm)) {
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		} else {
			echo "No results found.";
		}

		mysqli_stmt_close($stmt);
	} else {
		echo "Failed to prepare statement.";
	}

	mysqli_close($conn);

	return $data;
}
function sqldelet($table, $condition)
{
    global $servername, $username_db, $password, $dbname;

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username_db, $password, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare condition string and values for SQL statement
    $conditionString = "";
    $values = [];
    foreach ($condition as $column => $value) {
        $conditionString .= "`$column` = ? AND "; // Enclose column name in backticks
        $values[] = $value;
    }
    $conditionString = rtrim($conditionString, " AND ");

    // Prepare the SQL statement
    $sql = "DELETE FROM `$table` WHERE $conditionString";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Determine the types for binding parameters
        $types = str_repeat('s', count($values));
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_stmt_error($stmt); // Use mysqli_stmt_error for statement-specific errors
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }

    // Close the database connection
    mysqli_close($conn);
}
function removeAllData($tableName)
{
	$servername = "localhost";
	$username_db = "root";
	$password = "";
	$dbname = "regg";

	// Create a connection to the database
	$conn = mysqli_connect($servername, $username_db, $password, $dbname);

	$sql = "TRUNCATE TABLE $tableName";
	if (mysqli_query($conn, $sql)) {
		echo "All data removed from table: $tableName";
	} else {
		echo "Error removing data: " . mysqli_error($conn);
	}

}

$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);


$carts = sqlread("SELECT * FROM cart");
$reg = sqlread("SELECT * FROM reg");
$products = sqlread("SELECT * FROM products");
// echo"<pre>";
// print_r($carts );
// echo"</pre>";
// echo"<pre>";
// print_r($products );
// echo"</pre>";
// echo"<pre>";
// print_r($reg );
// echo"</pre>";
if (isset($_SESSION["user"])) {
	$user_id = $_SESSION["id_user"]; // Assume user ID is stored in session
	if (isset($_SESSION["user"])) {
		$user_id = $_SESSION["id_user"]; // Assume user ID is stored in session
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
	}
	// var_dump($cart_items);
	mysqli_close($conn);


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">

			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> BV1@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
				</ul>
				<ul>
					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><?= count($cart_items) ?></div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<?php foreach ($cart_items as $cart_item): ?>
											<?php if (count($cart_items) > 0): ?>


												<div class="product-widget">
													<div class="product-img">
														<img src="../dash/<?= $cart_item['img'] ?>" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a
																href="product.php?<?= $id_product ?>"><?= $cart_item['product_names'] ?></a>
														</h3>
														<h4 class="product-price"><span
																class="qty"><?= $cart_item['qty'] ?>x</span>$<?= $cart_item['prices'] - ($cart_item['prices'] * $cart_item['discounts'] / 100); ?>
														</h4>
													</div>
												

											<?php endif; ?>
										<?php endforeach; ?>

										<div class="cart-summary">
											<small><?= count($cart_items) ?> Item(s) selected</small>
											<?php foreach ($cart_items as $cart_item): ?>
												<?php
												$all = 0;
												$all += $cart_item['prices'] * $cart_item['qty'];

												?>
											<?php endforeach; ?>
<?php if (isset($all)){
echo "<h5>SUBTOTAL:$$all</h5>";
}?>
											
										</div>
										<div class="cart-btns">
											<a href="Checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
				</ul>
				<ul class="header-links pull-right">
					<?php if (isset($_SESSION["user"])): ?>
						<li><a href="logout.php"><i class="fa fa-dollar"></i> log out</a></li>
					<?php else: ?>
						<li><a href="../logi/index-l.php"><i class="fa fa-dollar"></i>Login</a></li>
					<?php endif ?>

					<li><a href="#"><i class="fa fa-user-o"></i><?= $_SESSION["user"] ?></a></li>
				</ul>

			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->


					<!-- /SEARCH BAR -->

					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="inde1x.php">Home</a></li>
					<li><a href="store.php">Categories</a></li>

				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->