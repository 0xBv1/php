<?php 
session_start();

$usern =$_SESSION['user'];
$rule =$_SESSION['userrule'];
if ($rule="admin"){
// header("location:logout.php");
// echo"ok";

}

$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

// Check connection

function sqladd( $data,$table="reg") {
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

function sqldelete($table, $condition) {
    global $servername, $username_db, $password ,$dbname;

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
function sqlupdate($table,$data, $condition) {

    global $servername, $username_db, $password ,$dbname;
    
    $conn = mysqli_connect($servername, $username_db, $password, $dbname);
    
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $setString = "";
    $values = [];
    foreach ($data as $column => $value) {
        $setString .= "$column = ?, ";
        $values[] = $value;
    }
    $setString = rtrim($setString, ", ");

    $conditionString = "";
    foreach ($condition as $column => $value) {
        $conditionString .= "$column = ? AND ";
        $values[] = $value;
    }
    $conditionString = rtrim($conditionString, " AND ");

    $sql = "UPDATE $table SET $setString WHERE $conditionString";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        $types = str_repeat('s', count($values)); // Assuming all parameters are strings
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            // echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }

    mysqli_close($conn);
}

function removeAllData( $tableName) {
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

$data = sqlread("SELECT * FROM reg");
$data_products = sqlread("SELECT * FROM products");

// ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Elctro Dashboard </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .image-container {
            position: relative;
            width: 100%;
            max-width: 300px;
        }
        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
     
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Electro</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION["user"]?></h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                   
                    <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="usersedit.php" class="dropdown-item">Edit Users</a>
                            <a href="usersadd.php" class="dropdown-item">Add Users</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="prductedit.php" class="dropdown-item">Edit Products</a>
                            <a href="prductadd.php" class="dropdown-item">Add Products</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$_SESSION["user"]?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <?php if (isset($_SESSION["user"])) : ?>
						    <li><a href="logout.php"><i class="dropdown-item"></i> log out</a></li>
						    <?php else:  ?>
							<li><a href="../logi/index-l.php"><i class="dropdown-item"></i>Login</a></li>
							<?php endif  ?>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->