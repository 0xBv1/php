<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploaded_files = $_FILES['files'];
    $uploaded_files_temp = $uploaded_files['tmp_name'];
    $uploaded_files_name = $uploaded_files['name'];
    $uploaded_files_size = $uploaded_files['size'];
    $uploaded_files_type = $uploaded_files['type'];
    $uploaded_files_error = $uploaded_files['error'];
    
    echo '<pre>';
    // print_r($uploaded_files);
    // print_r($uploaded_files_name);
    // print_r($uploaded_files_temp);
    // print_r($uploaded_files_size);
    // print_r($uploaded_files_type);
    // print_r($uploaded_files_error);
    echo '</pre>';
    $uploaded_files_count = count($uploaded_files['name']);
    // echo $uploaded_files_count;
//     function ckext($name,$type,$error,$size,$temp,$count){
//         $uploadErrors = [
//             0 => "There is no error, the file uploaded with success.",
//             1 => "The uploaded file exceeds the upload_max_filesize",
//             2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
//             3 => "The uploaded file was only partially uploaded.",
//             4 => " No file was uploaded.",
//             5 => "Missing a temporary folder.",
//             6 => " Missing a temporary folder.",
//             7 => "Failed to write file to disk",
//             8 => "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop"];
//         $allowedext = ['jpeg','png','gif','pdf'];
//         $allowedtype = ['image/jpeg','image/png','image/gif','application/pdf'];
//         switch ($error){
//             case 0:
//                 echo $uploadErrors[0];
//                 break;
//             case 1:
//                 echo $uploadErrors[1];
//                 break;
//             case 2:
//                 echo $uploadErrors[2];
//                 break;
//             case 3:
//                 echo $uploadErrors[3];
//                 break;
//             case 4:
//                 return $uploadErrors[4];
//                 break;
//             case 5:
//                 echo $uploadErrors[5];
//                 break;
//             case 6:
//                 echo $uploadErrors[6];
//                 break;
//             case 7:
//                 echo $uploadErrors[7];
//                 break;
//             case 8:
//                 echo $uploadErrors[8];
//                 break;
// }
//         for($i =0 ; $i < $uploaded_files_count; $i++){
//             ////////////////////////
//             $n =explode('.',$name);   
//             $ext = strtolower(end($n));
//             ////////////////////////
            
            
            

//             return $ext;
//         }}
    
    // echo ckext($uploaded_files['name'][$i] , $uploaded_files['type'][$i]);
   
        
        // move_uploaded_file($uploaded_files['tmp_name'][$i],$_SERVER['DOCUMENT_ROOT'] .'\php\session\session7\uploads\\'.$uploaded_files['name'][$i]);

    
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
        <input type="file" name="files[]" multiple="multiple">
        <input type="submit" value="Upload">
    </form>
</body>
</html>