<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST['name'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $course  = $_POST['course'];
    $country = $_POST['country'];
    $radio   = $_POST['radio'];

    echo "Name:  $name <br>";
    echo "Email: $email <br>";
    echo "Course: ";
    foreach ($course as $c) {
        echo $c . " ,";
    }
    echo "<br>";
    echo "Country: ";
    foreach ($country as $c) {
        echo $c . " ,";
    }
    echo "<br>";
    echo "gender: $radio <br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter your name">
        <br>
        <input type="color" placeholder="color">
        <br>

        <input name="email" type="email" placeholder="email">
        <br>

        <input name="file" type="file">
        <br>

        <input name="image" type="image">
        <br>
        <input type="number">
        <br>

        <input name="password" type="password">
        <br>

        <input name="radio" type="radio" value="male">male
        <br>

        <input name="radio" type="radio" value="female">female
        <br>

        <input name="range" type="range">
        <br>

        <input name="course[]" type="checkbox" value="html">HTML
        <input name="course[]" type="checkbox" value="css">CSS
        <input name="course[]" type="checkbox" value="js">JS
        <br>
        <select name="country[]" id="" multiple>
            <option value="bangladesh">Bangladesh</option>
            <option value="india">India</option>
            <option value="pakistan">Pakistan</option>

        </select>

        <br>




        <input type="submit" value="Submit">


















</body>

</html>