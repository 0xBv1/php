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
    ['username' => 'admin', 'password' => 'admin'],
    ['username' => 'user', 'password' => 'user'],
    ['username' => 'guest', 'password' => 'guest'],
    ['username' => 'test', 'password' => 'test'],
    ['username' => 'demo', 'password' => 'demo'],
    ['username' => 'root', 'password' => 'root'],
);
// check if the form was submitted
// if (isset($_POST['save'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
// check if the username and password combination exists in the database
// addUser($username, $password);
?>

<!-- Create a button to show data in array $y  -->
<form method="post">
    <input type="submit" name="show_data" value="Show Data">
</form>

<?php
// Function to add user credentials to the array

// Print the array to verify
// print_r($y);
// echo "<br> ";

if (isset($_POST['show_data'])) {
    foreach ($y as $element) {
        echo "Username: " . $element['username'] . ", Password: " . $element['password'] . "<br>";
    }
}