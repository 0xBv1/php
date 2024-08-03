<?php

$all_errors = [];

session_start();
if (isset($_SESSION["user"])) {
    if ( $_SESSION["userrule"]  =="admin") {
        // echo"admin";
            header('location:../dash/usersedit.php');
            
    } elseif($_SESSION["userrule"]   =="user"){
        // echo"user";
         header('location:../electro-master/inde1x.php');
    

}else{
    // echo "error";
}
}
$servername = "localhost";
$username_db = "root";
$password = "";
$dbname = "regg";

$conn = mysqli_connect($servername, $username_db, $password, $dbname);


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
        $sql = "SELECT id,rule , passwords FROM reg WHERE usernames = '$input_username'";
     
    
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
                    return [
                        'rule' => $result["rule"],
                        'id' => $result["id"],
                    ];
                    

                }
               
            }else {
                return false;


}}}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Example usage    
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $rtes =validateUser($input_username, $input_password);
// var_dump($rtes);
    if ( $rtes&&$rtes["rule"]  =="admin") {
        // echo"admin";
            $_SESSION['user'] = $input_username;
            $_SESSION['id_user'] = $rtes["id"];
            $_SESSION['userrule'] = $rtes["rule"];

            header('location:../dash/usersedit.php');
            
    } elseif($rtes&&$rtes["rule"]  =="user"){
        // echo"user";
 
        $_SESSION['user'] = $input_username;
        $_SESSION['userrule'] = $rtes["rule"];
        $_SESSION["id_user"] = $rtes["id"];

        header('location:../electro-master/inde1x.php');
    

}else{
    // echo "error";
}
}