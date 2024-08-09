<?php
/*note 
sqladd this take two arg name of table and data with this format columnname => data
sqlread take query like  => sqlread("SELECT * FROM reg");
sqldelete  this take two arg   tablename, condition like => ["id" => 2]
sqlupdate this take three arg data with this format columnname => data and condition like => ["id" => 2] and tablename





*/
// $servername = "localhost";
// $username_db = "root";
// $password = "";
// $dbname = "regg";$data = sqlread("SELECT * FROM reg");

// $thse ='<br>sdfajsndrfjna';
// define("NAME",$thse);
// echo NAME;   
// $thse ='<br>sdjna';
// echo NAME;    

// $servername = "localhost";
//     $username_db = "root";
//     $password = "";
//     $dbname = "regg";
// function sqlupdate($table,$data, $condition) {

//     global $servername, $username_db, $password ,$dbname;
    
//     $conn = mysqli_connect($servername, $username_db, $password, $dbname);
    
//     if (mysqli_connect_errno()) {
//         die("Connection failed: " . mysqli_connect_error());
//     }

//     $setString = "";
//     $values = [];
//     foreach ($data as $column => $value) {
//         $setString .= "$column = ?, ";
//         $values[] = $value;
//     }
//     $setString = rtrim($setString, ", ");

//     $conditionString = "";
//     foreach ($condition as $column => $value) {
//         $conditionString .= "$column = ? AND ";
//         $values[] = $value;
//     }
//     $conditionString = rtrim($conditionString, " AND ");

//     $sql = "UPDATE $table SET $setString WHERE $conditionString";

//     if ($stmt = mysqli_prepare($conn, $sql)) {
//         $types = str_repeat('s', count($values)); // Assuming all parameters are strings
//         mysqli_stmt_bind_param($stmt, $types, ...$values);

//         if (mysqli_stmt_execute($stmt)) {
//             echo "Record updated successfully.";
//         } else {
//             echo "Error updating record: " . mysqli_error($conn);
//         }

//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Failed to prepare statement.";
//     }

//     mysqli_close($conn);
// }
// function sqlread($statm){
//     global $servername, $username_db, $password, $dbname;
//     $conn = mysqli_connect($servername, $username_db, $password, $dbname);

//     if (mysqli_connect_errno()) {
//         die("Connection failed: " . mysqli_connect_error());
//     }

//     $data = [];

//     if ($stmt = mysqli_prepare($conn, $statm)) {
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);

//         if ($result) {
//             while ($row = mysqli_fetch_assoc($result)) {
//                 $data[] = $row;
//             }
//         } else {
//             echo "No results found.";
//         }

//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Failed to prepare statement.";
//     }

//     mysqli_close($conn);

//     return $data;
// }{}

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
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }

    mysqli_close($conn);
}

function sqlread($statm){
    global $servername, $username_db, $password ,$dbname;
    $conn = mysqli_connect($servername, $username_db, $password, $dbname);
    
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($stmt = mysqli_prepare($conn, $statm)) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            echo "<pre>";
            while ($row = mysqli_fetch_assoc($result)) {
                var_dump($row);
            }
            echo "</pre>";
        } else {
            echo "No results found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare statement.";
    }

    mysqli_close($conn);
}
// 
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
function sqladd($table, $data) {
    global $servername, $username_db, $password ,$dbname;

    $conn = mysqli_connect($servername, $username_db, $password, $dbname);
    
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





// if($_SERVER['REQUEST_METHOD']== 'POST'){
// // $table = "reg";
// // // Update where id = 1
// // $data = [ 
// //     "usernames" => "admin",
// //     "passwords" => "admin",
// //     "emails" => "newuser@example.com",
// //     "phones" => 1234567890,
// //     "dates" => 25,
// //     "genders" => "male",
// //     "imgs" => "newuser.img"];
// // $condition = ["id" => 2]; 
// // sqlupdate( $table ,$data, $condition);
// // // Delete where id = 2

// // $condition = ["id" => 1]; 
// // sqldelete($table, $condition);
// // //add data 
// $table = "reg";
// $data = [
    
//     "usernames" => "bedo",
//     "passwords" => "bedo",
//     "emails" => "newusera@example.com",
//     "phones" => 1234567890,
//     "dates" => 25,
//     "genders" => "male",
//     "imgs" => "newuser.img"
// ];

// sqladd($table, $data);

// sqlread("SELECT * FROM reg");
// }





// // Database connection details
// $servername = "localhost";
// $username_db = "root";
// $password = "";
// $dbname = "regg";

// // Create a connection to the database
// $conn = mysqli_connect($servername, $username_db, $password, $dbname);

// // Check the connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Function to generate random data
// function generateRandomData($conn, $numberOfRecords) {
//     for ($i = 0; $i < $numberOfRecords; $i++) {
//         // Generate random data
//         $username = generateRandomString(5);
//         $password = generateRandomString(8);
//         $email = $username . '@example.com';
//         $phone = generateRandomPhoneNumber();
//         $date = rand(1, 31) . '-' . rand(1, 12) . '-' . rand(1990, 2020);
//         $gender = (rand(0, 1) == 0) ? 'male' : 'female';
//         $img = generateRandomString(7) . '.img';

//         // Insert the random data into the database
//         $sql = "INSERT INTO reg (usernames, passwords, emails, phones, dates, genders, imgs) VALUES ('$username', '$password', '$email', '$phone', '$date', '$gender', '$img')";
//         if (!mysqli_query($conn, $sql)) {
//             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//         }
//     }
// }

// // Helper function to generate a random string of specified length
// function generateRandomString($length) {
//     $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

// // Helper function to generate a random phone number
// function generateRandomPhoneNumber() {
//     $numbers = '0123456789';
//     $phoneNumber = '';
//     for ($i = 0; $i < 10; $i++) {
//         $phoneNumber .= $numbers[rand(0, 9)];
//     }
//     return $phoneNumber;
// }

// // Generate and insert 10 random records
// generateRandomData($conn, 10);

// // Close the database connection
// mysqli_close($conn);

// echo "Random data generated and inserted successfully!";
// //////////////////////////////////////////////////////

// // Database connection details


// // // Function to remove all data from a table
// // function removeAllData( $tableName) {
// //     $servername = "localhost";
// //     $username_db = "root";
// //     $password = "";
// //     $dbname = "regg";

// //     // Create a connection to the database
// //     $conn = mysqli_connect($servername, $username_db, $password, $dbname);

// //     $sql = "TRUNCATE TABLE $tableName";
// //     if (mysqli_query($conn, $sql)) {
// //         echo "All data removed from table: $tableName";
// //     } else {
// //         echo "Error removing data: " . mysqli_error($conn);
// //     }
// //     // Close the database connection
// //     mysqli_close($conn);
// // }

// // // Call the function to remove all data from the 'reg' table
// // removeAllData('reg');


// ?>









// // <!DOCTYPE html>
// // <html lang="en">
// // <head>
// //     <meta charset="UTF-8">
// //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
// //     <title>Document</title>
// // </head>
// // <body>

// // </body>
// // </html>