<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'ajax', 1121);
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the input data (JSON format)
$rdata = file_get_contents("php://input");
$rdata = json_decode($rdata, true);

// Extract the ID and validate it
$id = intval($rdata['id']);
if ($id <= 0) {
    echo json_encode(["success" => false, "message" => "Invalid ID"]);
    exit;
}

// Prepare a SQL query to fetch user data by ID (exclude passwords)
$sql = "SELECT id, usernames, emails ,passwords FROM usersdata WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

// Execute the query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the user exists
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the data and send it back as JSON (excluding passwords)
    $userdata = mysqli_fetch_assoc($result);
    echo json_encode($userdata);
} else {
    // If the user doesn't exist, return an error response
    echo json_encode(["success" => false, "message" => "User not found"]);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
