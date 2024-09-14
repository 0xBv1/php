<?php


// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'ajax', 1121);
if (!$connection) {
    die("Database connection failed");
}

// CSRF protection
// if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//     die('CSRF validation failed');
// }

// Get the input data (JSON format)
$rdata = file_get_contents("php://input");
$rdata = json_decode($rdata, true);

// Input sanitization and validation
$id = intval($rdata['id']);
$name = trim(mysqli_real_escape_string($connection, $rdata['name']));
$email = trim(mysqli_real_escape_string($connection, $rdata['email']));
$password = trim($rdata['password']);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(json_encode(["success" => false, "message" => "Invalid email format"]));
}

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Use prepared statement to prevent SQL injection
$sql = "INSERT INTO usersdata (id, usernames, emails, passwords) 
        VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE usernames = VALUES(usernames), emails = VALUES(emails), passwords = VALUES(passwords)";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 'isss', $id, $name, $email, $password);

// Execute the query and check for errors
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Record inserted/updated successfully."]);
} else {
    error_log("Database error: " . mysqli_error($connection)); // Log the error for debugging
    echo json_encode(["success" => false, "message" => "An error occurred while processing your request."]);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
