<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the username and password are valid
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform your authentication logic here
    // ...

    // Redirect to the home page if authentication is successful
    if ($authenticated) {
        header('Location: home.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>