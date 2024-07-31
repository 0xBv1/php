<?php
// var_dump($_POST);

// Array containing usernames and passwords

$all_errors = [];

// Create connection

// Check connection

session_start();
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

$statm = 'SELECT emails FROM reg WHERE emails = "admin@wep.com"';
if (!mysqli_query($conn, $statm) ->num_rows > 0) {
    $sql = "INSERT INTO reg (usernames,passwords,emails)   VALUES ('admin','admin','admin@wep.com')";

    mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function validateInput($input) {
        // Remove HTML tags to prevent XSS
        $input = strip_tags($input);
        // Escape special characters to prevent XSS
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }
    
    function checkSQLInjection($input) {
        // Basic check for SQL injection patterns
        $pattern = '/(\b(SELECT|UNION|INSERT|UPDATE|DELETE|DROP|--|\/\*|\*\/)\b)/i';
        if (preg_match($pattern, $input)) {
            return false;
        }
        return true;
    }
    
    function validateUser($servername, $username_db, $password_db, $dbname, $input_username, $input_password) {
        // Validate and sanitize input
        $input_username = validateInput($input_username);
        $input_password = validateInput($input_password);
    
        // Check for SQL injection
        if (!checkSQLInjection($input_username) || !checkSQLInjection($input_password)) {
            return false;
        }
    
        // Create connection
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Prepare and bind
        $stmt = $conn->prepare('SELECT passwords FROM reg WHERE usernames = ?');
        $stmt->bind_param('s', $input_username); // 's' denotes the type string
    
        // Execute the statement
        $stmt->execute();
    
        // Get the result
        $result = $stmt->get_result();
    
        // Check if we have a result
        if ($result->num_rows > 0) {
            // Fetch the row
            $row = $result->fetch_assoc();
    
            // Validate the password
            if ($input_password === $row['passwords']) {
                // Close the statement and connection
                $stmt->close();
                $conn->close();
                return true; // Valid username and password
            }
        }
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
        return false; // Invalid username or password
    }
    
    // Example usage
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "regg";
    
    
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    
    if (validateUser($servername, $username_db, $password_db, $dbname, $input_username, $input_password)) {
        if($input_username ='admin' and $input_password = 'admin') {
            $_SESSION['admin'] = $input_username;
            header('location:../dash/index.php');
            
    } else {
        echo "Invalid username or password";
    }
    
}}