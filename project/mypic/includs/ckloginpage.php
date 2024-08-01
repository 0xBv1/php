<?php
// var_dump($_POST);

// Array containing usernames and passwords

$all_errors = [];

// Create connection

// Check connection

// echo"false1";
session_start();
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

// Create connection
$conn = mysqli_connect($servername, $username_db, $password, $dbname);

// $statm = 'SELECT emails FROM reg WHERE emails = "admin@wep.com"';
// if (!mysqli_query($conn, $statm) ->num_rows > 0) {
//     $sql = "INSERT INTO reg (usernames,passwords,emails)   VALUES ('admin','admin','admin@wep.com')";

//     mysqli_query($conn, $sql);
// }

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
    
    function validateUser( $input_username, $input_password,$servername= "localhost", $username_db= "root", $password_db = "", $dbname= "regg") {
       
        // Validate and sanitize input
        $input_username = validateInput($input_username);
        $input_password = validateInput($input_password);
    
        // Check for SQL injection
        if (!checkSQLInjection($input_username) || !checkSQLInjection($input_password)) {
            // echo"false1";
            return false;
        }
    
        // Create connection
        $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);
        // Check connection
      
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

        // Prepare and bind
        $sql = "SELECT rule , passwords FROM reg WHERE usernames = '$input_username'";
     
    
        // Execute the statement
        $stmt=mysqli_query($conn, $sql);
    
        // Get the result
        $result = mysqli_fetch_assoc($stmt);
        // var_dump($result) ;
        if (isset($result)) {
            
            // echo"true";
           
            $db_password =$result["passwords"];
            if($input_password == $db_password){
                if( isset($result["rule"])){
                    return $result["rule"];

                }
               
            }else {
                return false;


}}}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Example usage    
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $rtes =validateUser($input_username, $input_password);

    if ( $rtes  =="admin") {
        echo"admin";
            $_SESSION['admin'] = $input_username;
            header('location:../dash/index.php');
            
    } else{
        echo"user";
 

        header('location:../electro-master/inde1x.php');
    }

}