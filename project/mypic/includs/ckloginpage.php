<?php
// var_dump($_POST);

// Array containing usernames and passwords
$users = array(
    "user1" => "password1",
    "user2" => "password2",
    "user3" => "password3"
);
$all_errors =[];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Function to validate username and password
    function validateUser($username, $password, $users)
    {
        if (isset($users[$username]) && $users[$username] === $password) {
            return true;
        } else {
            return false;
        }
    }

    // Function to sanitize user inputs to prevent XSS
    function sanitizeInput($data)
    {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    // Function to validate username using regex and length check
    function isValidUsername($username)
    {
        if (strlen($username) < 3 || strlen($username) > 20) {
            return false;
        }else{
            return true;
        }
        
    }

    // Function to validate password using regex and length check
    function isValidPassword($password)
    {
        if (strlen($password) < 8) {
            return false;
        }else{
            return true;
        }
        
        
    }

    // Example usage
    $username = sanitizeInput($_POST['username'] ?? '');
    $password = sanitizeInput($_POST['password'] ?? '');

    if (isValidUsername($username) && isValidPassword($password)) {
        if (validateUser($username, $password, $users)) {
            echo "Login successful!";
        } else {
            $all_errors[]= "Invalid username or password.";
        }
    } else {
        $all_errors[]= "Invalid input.";
    }



} 

