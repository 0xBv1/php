<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploaded_files = $_FILES['files'];
    $uploaded_files_temp = $uploaded_files['tmp_name'];
    $uploaded_files_name = $uploaded_files['name'];
    $uploaded_files_size = $uploaded_files['size'];
    $uploaded_files_type = $uploaded_files['type'];
    $uploaded_files_error = $uploaded_files['error'];
    $unique_id = uniqid() . $uploaded_files_name;
    $all_errors = [];
    $allowedext = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

    ////////////////////////////////
    $arrfilename = explode('.', $uploaded_files_name);
    $fileext = strtolower(end($arrfilename));
    $tesst_ext = in_array($fileext, $allowedext);


    // echo '<pre>';
    // print_r($uploaded_files);
    // print_r($uploaded_files_name);
    // echo '<br>';
    // print_r($uploaded_files_temp);
    // echo '<br>';
    // print_r($uploaded_files_size);
    // echo '<br>';
    // print_r($uploaded_files_type);
    // echo '<br>';
    // print_r($uploaded_files_error);
    // echo '<br>';
    // print_r($uniqid);
    // echo '</pre>';
    if ($uploaded_files_error == 4) {
        // echo'plz select file ;)';
        $all_errors[] = 'plz select file ';
    } else {
        if ($tesst_ext == true) {
            if ($uploaded_files_size > 10000000) {
                $all_errors[] = 'file size is too large bro';
            } else {
                echo '<pre>';
                print_r($uploaded_files_name);
                echo '<br>';
                print_r($uploaded_files_temp);
                echo '<br>';
                print_r($uploaded_files_size);
                echo '<br>';
                print_r($uploaded_files_type);
                echo '<br>';
                print_r($uploaded_files_error);
                echo '<br>';
                print_r($unique_id);
                echo '</pre>';
                echo 'file upload :/';
                return move_uploaded_file($uploaded_files_temp, $_SERVER['DOCUMENT_ROOT'] . '\php\session\sessio\upload\\' . $unique_id);


            }
        } else {
            $all_errors[] = 'file extenntion not allowed ';
        }



    }
    foreach ($all_errors as $error) {
        echo ''. $error .'<br>';}
    


   
}




















?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files">
        <input type="submit" value="Upload">
    </form>
</body>

</html>