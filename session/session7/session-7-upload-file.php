<?php 
function checkdata($data){
    $file = $data;
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_type = $file['type'];
    $file_tmp = $file['tmp_name'];
    $allowedext = ['jpg','jpeg','png','gif','pdf'];

    ////////////////////////////////
    $arrfilename= explode('.', $file_name);
    $fileext =strtolower(end($arrfilename));
    $unique = md5(time().rand()).'.'.$fileext;
    // for test
    //echo $unique;
    if (in_array($fileext, $allowedext)){
        if ($file_size <= 1000000){
            if ($file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/gif' || $file_type == 'application/pdf'){
                echo 'File uploaded successfully';
                return move_uploaded_file($file_tmp,$_SERVER['DOCUMENT_ROOT'] .'\php\session\session7\uploads\\'.$unique);
            }else{
                return 'File type not allowed';
            }
        }else{
            return 'File size is too large';
        }
    }else{
            return 'File extension not allowed';
        }

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // for test
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    $file = $_FILES['test-file'];
    $file_error = $file['error'];
    if ($file_error == 0){
        
        checkdata($file);
    }elseif ($file_error == 4){
        echo 'Please select a file';
    }
    else{
        echo 'There is an error';}
    
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="test-file">
            <br><br>

        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>