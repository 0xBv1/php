<?php
// Check if the file exists
if (file_exists("test.txt")) {
    echo "File exists<br>";

    // Read the file
    $f = fopen("test.txt", "r");
    $length = filesize("test.txt");
    if ($length > 0) { // Ensure the file is not empty to avoid warnings
        $content = nl2br(fread($f, $length));
        echo $content;
    }
    fclose($f);
    echo "<br>File read<br>";

    // Write to the file
    $fw = fopen("test.txt", "w");
    fwrite($fw, "Hello World");
    fclose($fw);
    echo "<br>File written<br>";

    // Read the file again to show the new content
    $f = fopen("test.txt", "r");
    $length = filesize("test.txt");
    if ($length > 0) {
        $content = nl2br(fread($f, $length));
        echo $content;
    }
    fclose($f);
    echo "<br>File read<br>";

    // Uncomment the next two lines if you want to delete the file
    // unlink("test.txt");
    // echo "File deleted<br>";
} else {
    echo "File does not exist<br>";
}











?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
</body>
</html>