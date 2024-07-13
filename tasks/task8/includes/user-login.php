<?php 
var_dump($_POST);
$all_errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flag = 0;
    $username = $_POST['username'] ;
    $email = $_POST['email'] ;
    $age = $_POST['age'] ;
    if (preg_match('/^[a-zA-Z0-9_]{4,}$/', $username)) {
        $flag += 1;
    } else {
        $all_errors[] = "Invalid username!" . " Username must be at least 4 characters long and contain only letters, numbers, and underscores!";
    }
    if (preg_match('/\b[A-Za-z0-9._%+-]+@(gmail\.com|hotmail\.com|yahoo\.com)\b/', $email)) {
        $flag += 1;
    } else {
        $all_errors[] = "Invalid email!". " Email must be a valid gmail, hotmail, or yahoo address!";
    }
    if ((preg_match('/^\d+$/', $age)) ){
        $flag += 1;

    } else {
        $all_errors[] = "Invalid age!". " Age must be a number!";
    }
    if($age>0 && $age<100){
        $flag += 1;
    } else {
        $all_errors[] = "Invalid age!". " Age must be between 0 and 100!";}
    
    if ($flag == 4) {
        header("Location: main.php/"."?username=".$username);        
    } else {
        foreach ($all_errors as $error) {
            echo "<br>".$error . "<br>";
        }
    }
}
// valedate user

?>