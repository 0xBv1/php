<?php
// var_dump($_POST);

$username = $_POST["username"];
$password = $_POST["password"];
$flag = 0;
$all_errors = [];
// if (isset($username)) {
//     if (!empty($username)) {
//         if (strlen($username) >= 3) {
//             if (preg_match("/senior$/", $username)) {
//                 echo $username;
//             } else {
//                 echo "Username must end with 'senior'";
//             }
//         } else {
//             echo "Username must be at least 3 characters long";
//         }
//     } else {
//         echo "Username cannot be empty";
//     }
if (isset($username)) {
    if (empty($username)) {
        $all_errors['er_empty_u'] = "user must enter username <br>";
    } else {
        $flag++;
    }

    if (strlen($username) < 3) {
        $all_errors['er_length_u'] = "user must enter username more than 2 char <br>";
    } else {
        $flag++;
    }
    if (preg_match("/senior$/", $username)) {
        $all_errors['er_reg'] = "user  must end with senior <br>";
    } else {
        $flag++;

    }

}
if (isset($password)) {
    if (empty($password)) {
        $all_errors['er_empty_p'] = "pass user must enter password <br>";
    } else {
        $flag++;
    }

    if (strlen($password) < 8) {
        $all_errors['er_length_p'] = "pass must enter password more than 2 char <br>";
    } else {
        $flag++;
    }
    if(!preg_match("@[A-Za-z]@", $password))  {
        $all_errors['er_pass_reg'] = "pass must end with senior <br>";
    } else {
        $flag++;

    }

}
var_dump($all_errors);
if ($flag == 6) {
    echo "success";
}
// } else {
//     echo "Username is not set";
// }
// if (isset($username) && !empty($username) && strlen($username) >= 3 && preg_match("/senior$/", $username)) {
//     echo $username;
// } else {
//     echo "Invalid username";
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="">
    <?php foreach($all_errors as $ero) : ?>
        <div class="alert alert-danger">
        <?= $ero ?>
        </div>
    <?php endforeach ;?>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" >
        <label for="password">password:</label>
        <input type="text" name="password" id="password" >
        <button type="submit">Submit</button>
    </form>

</body>

</html>