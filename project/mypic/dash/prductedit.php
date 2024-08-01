<?php
ob_start();
include ("header.php");
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";
// Function to update data in a table
function sqlupdat($table, $data, $condition) {
    global $servername, $username_db, $password, $dbname;

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username_db, $password, $dbname);

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SET part of the SQL statement
    $setString = "";
    $values = [];
    foreach ($data as $column => $value) {
        $setString .= "`$column` = ?, ";
        $values[] = $value;
    }
    $setString = rtrim($setString, ", ");

    // Prepare the WHERE part of the SQL statement
    $conditionString = "";
    foreach ($condition as $column => $value) {
        $conditionString .= "`$column` = ? AND ";
        $values[] = $value;
    }
    $conditionString = rtrim($conditionString, " AND ");

    // Prepare the SQL statement
    $sql = "UPDATE `$table` SET $setString WHERE $conditionString";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Determine the types for binding parameters
        $types = str_repeat('s', count($values));
        mysqli_stmt_bind_param($stmt, $types, ...$values);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }

    // Close the database connection
    mysqli_close($conn);
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

// Example usage
if (isset($_POST['d'])) {

}
?>


<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <form action="" method="post">
            <div class="bg-secondary rounded">
                <h6 class="text-center">Delete All Users</h6>
                <div class="">
                    <button class="btn btn-outline-primary w-100 m-1" name="dl" type="submit">Delete All</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <h6 class="mb-4">Users Table</h6>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">price</th>
                            <th scope="col">discount</th>
                            <th scope="col">categore</th>
                            <th scope="col">rate</th>
                            <th scope="col">count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data_products)): ?>
                            <?php foreach ($data_products as $row): ?>
                                <tr>


                                    <th scope="row"><?= htmlspecialchars($row["id_p"]) ?></th>
                                    <td><?= htmlspecialchars($row["product_names"]) ?></td>
                                    <td><?= htmlspecialchars($row["prices"]) ?></td>
                                    <td><?= htmlspecialchars($row["discounts"]) ?></td>
                                    <td><?= htmlspecialchars($row["categores"]) ?></td>
                                    <td><?= htmlspecialchars($row["rate"]) ?></td>
                                    <td><?= htmlspecialchars($row["count"] ?? 'N/A') ?></td>
                                    <form action="?iid=<?= $row['id_p'] ?>" method="post">
                                        <td>
                                            <button type="submit" name="u" class="btn btn-outline-primary">Update</button>
                                            <button type="submit" name="d" class="btn btn-outline-primary">Delete</button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (isset($_POST['u'])): ?>
                                <?php $thse = $_GET['iid'];
                                global $thse;

                                ?>

                                <div class="bg-secondary rounded-top p-4">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- <input type="file" class="form-control-file" name="image" id="imgInput" required> -->
                                        <div class="row mb-3">
                                            <label for="inputname" class="col-sm-2 col-form-label">Name Of Product</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="product-name" class="form-control" id="inputname">
                                            </div>
                                        </div>
                                       

                                        <div class="row mb-3">
                                            <label for="inputprice" class="col-sm-2 col-form-label">Price Of Product</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="product-price" class="form-control" id="inputprice">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="form-check-inline" for="discountPercentage">Discount
                                                Percentage:</label>
                                            <input type="number" step="0.01" class="form-control" id="discount" name="discount"
                                                required="">
                                        </div>

                                        <div class="row mb-3">
                                            <label for="inputname" class="col-sm-2 col-form-label">Count in store</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="product-count" class="form-control" id="inputname">
                                            </div>
                                        </div>

                                    
                                        <button type="submit" value="save" class="btn btn-primary">save</button>
                                    </form>
                                </div>
                            <?php endif; ?>                         
                            <?php

                            if (isset($_POST['d'])) {
                                $id = $_GET['iid'];
                                $condition = ["id_p" => $id];
                                sqldelet("products", $condition);
                                header("Location: " . $_SERVER['PHP_SELF']);
                            }?>

                            <?php
                            if (isset($_POST['product-name'])){
                                // Prepare the data array
                                $nname =$_POST['product-name'];
                                $ncount =$_POST['product-count'];
                                $noriginalPrice = $_POST['product-price'];
                                $ndiscountPercentage = $_POST['discount'];
                                $data = [
                                    "product_names" => $nname,
                                    "prices" => $noriginalPrice,
                                    "discounts" => $ndiscountPercentage,
                                    "count" => $ncount,
                                ];
                                var_dump($data);    
                                // Get the condition for updating
                                $id = $_GET['iid'];
                                $condition = ["id_p" => $id];

                                // Update the record in the 'products' table
                                $table = "products";
                                sqlupdate($table, $data, $condition);

                                // Optionally redirect after update
                                header("Location: " . $_SERVER['PHP_SELF']);
                            } ?>
                            <?php if (isset($_POST['dl'])) {
                                removeAllData('products');
                                header("Location: " . $_SERVER['PHP_SELF']);
                            } ?>




                        <?php else: ?>
                            <tr>
                                <td colspan="8">No data available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include ("footer.php");
    ?>
    <?php
    // End output buffering and flush the buffer
    ob_end_flush();
    ?>