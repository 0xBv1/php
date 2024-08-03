<?php
session_start();

$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function sqladd($data, $table = "reg")
{
    global $conn;

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
}

function sqldelete($table, $condition)
{
    global $conn;

    $conditionString = "";
    $values = [];
    foreach ($condition as $column => $value) {
        $conditionString .= "$column = ? AND ";
        $values[] = $value;
    }
    $conditionString = rtrim($conditionString, " AND ");
    
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
}

function sqlread($statm)
{
    global $conn;

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

    return $data;
}

function sqlupdate($table, $data, $condition)
{
    global $conn;

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
        $types = str_repeat('s', count($values));
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }
}

function removeAllData($tableName)
{
    global $conn;

    $sql = "TRUNCATE TABLE $tableName";
    if (mysqli_query($conn, $sql)) {
        echo "All data removed from table: $tableName";
    } else {
        echo "Error removing data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the quantity from the form
    $quantity = $_POST['Qty'];

    // Sanitize the input to prevent XSS attacks
    $quantity = htmlspecialchars($quantity);

    $id_product = $_GET['id_product'];
    $id_user = $_SESSION["id_user"];

    $carts = sqlread("SELECT * FROM cart WHERE id_u = $id_user");
    
    foreach ($carts as $cart) {
        $id_cart = $cart["id_p_c"];
        $id_pdb = $cart["id_p"];
        $qtydb = $cart["qty"];
        $nqty = $qtydb + $quantity;

        if ($id_product == $id_pdb) {
            $data = ["qty" => $nqty];
            $condition = ["id_p_c" => $id_cart];
            sqlupdate("cart", $data, $condition);
            header('Location: product.php?id_product=' . $id_product);
            exit();
        }
    }

    $data = [
        "id_u" => $id_user,
        "id_p" => $id_product,
        "qty" => $quantity
    ];
    sqladd($data, "cart");
    header('Location: product.php?id_product=' . $id_product);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?= $_SESSION["user"] ?>
    <?= $_SESSION["id_user"] ?>
    <?= $_SESSION["userrule"] ?> -->
</body>
</html>
