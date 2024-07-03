<?php require "../includes/database.php"; ?>
<?php
var_dump($_GET);
if (isset($_POST["signup"])) {
    header('Location:bounse-sign-up.php');
}

// database for users and passwords

//method 1 not secure because may hacker use brute force attack to know the username and password
// check if the form was submitted
// if (isset($_POST['username']) && $_POST['password']) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     // check if the user exists
//     $user_exists = false;
//     foreach ($y as $user) {
//         if ($user['username'] == $username) {
//             $user_exists = true;
//             break;
//         }
//     }
//     if ($user_exists) {
//         // check if the password is correct
//         $password_correct = false;
//         foreach ($y as $user) {
//             if ($user['username'] == $username && $user['password'] == $password) {
//                 $password_correct = true;
//                 break;
//             }
//         }
//         if ($password_correct) {
//             header('Location:main-page.php?username='.$username.'');
//             echo "Welcome, " . $username . "!";

//         } else {
//             echo "Incorrect password!";
//         }
//     } else {
//         echo "User not found!";
//     }
// } else {
//     echo "Please fill in the form!";
// }
//method 2 secure because the hacker can't know the username and password
if (isset($_POST['username']) && $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // check if the user exists
    $flage = false;
    foreach ($y as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $flage = true;
            break;
        }
    }
        if ($flage) {
            header('Location:main-page.php?username='.$username.'');
            echo "Welcome, " . $username . "!";

        } else {
            echo "Incorrect data please check your data!";
        }
    }  else {
    echo "Please fill in the form!";
}



