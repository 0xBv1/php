<?php
// Database connectionforundefined
$connection = mysqli_connect('localhost', 'root', '', 'ajax', 1121);

// Check the connection
if (!$connection) {
    // Return a JSON error message and exit
    die(json_encode(["success" => false, "message" => "Database connection failed: " . mysqli_connect_error()]));
}

// SQL query to fetch all user data (excluding passwords for security)
$sql = "SELECT id, usernames, emails ,passwords FROM usersdata";
$query = mysqli_query($connection, $sql);

// Check for query execution errors
if (!$query) {
    // Return a JSON error message and exit
    die(json_encode(["success" => false, "message" => "Query failed: " . mysqli_error($connection)]));
}

// Fetch all data and encode as JSON
$alldata = [];
while ($row = mysqli_fetch_assoc($query)) {
    $alldata[] = $row;
}

// Return the data as JSON
echo json_encode($alldata);

// Close the database connection
mysqli_close($connection);
?>
