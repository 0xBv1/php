<?php
if (isset($_POST["login"])) {
    header('Location:login.php');
}

// function addUser($username, $password) {
//     global $database_for_users_passwords;
//     $database_for_users_passwords[$username] = $password;
//     // echo   $_POST['username'],    $_POST['password'];

//     // echo "<br> ";
// }
$y  = array(
    ['username' => 'admin', 'password' => 'admin123'],
    ['username' => 'user', 'password' => 'user123'],
    ['username' => 'guest', 'password' => 'guest123'],
    ['username' => 'test', 'password' => 'test123'],
    ['username' => 'demo', 'password' => 'demo123'],
    ['username' => 'root', 'password' => 'root123'],
);
// check if the form was submitted
// if (isset($_POST['save'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     // check if the username and password combination exists in the database
//     addUser($username, $password);
// }

// Function to add user credentials to the array



// Print the array to verify
// print_r($y);/
// echo "<br> ";

