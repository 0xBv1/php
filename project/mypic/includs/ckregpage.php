<?php
$all_errors = [];
$error_user = [];
$error_pass = [];
$error_email = [];
$error_phone = [];
$error_date = [];
$error_img = [];
$path = '';
$immm = '';
$flag =0;
// echo "<pre>";
// print_r($_POST);
// print_r($all_errors);
// echo "</pre>";

session_start();
if (isset($_SESSION["user"])) {
    if ( $_SESSION["userrule"]  =="admin") {
        // echo"admin";
            $_SESSION['user'] = $input_username;
            $_SESSION['userrule'] = $result["rule"];

            header('location:../dash/index.php');
            
    } elseif($_SESSION["userrule"]   =="user"){
        // echo"user";
 
        $_SESSION['user'] = $input_username;
        $_SESSION['userrule'] = $result["rule"];

        header('location:../electro-master/inde1x.php');
    

}else{
    echo "error";
}}
function validateUsername($username)
{
    global $flag, $all_errors, $error_user;
    $length = strlen($username);
    if ($length > 3 && $length < 20) {
        if (!preg_match('/[!@#$%^*()_+\-=~`<>\"\'&]/', $username)) {
            $flag++;
            return true;

        } else {
            $all_errors[] = "Username mustn`t contain  special character.";
            $error_user[] = "Username mustn`t contain  special character.";
        }
    } else {
        $all_errors[] = "username must be between 4 and 20 characters.";
        $error_user[] = "username must be between 4 and 20 characters.";
    }
}
function validatePassword($password, $repassword)
{
    global $flag, $all_errors, $error_pass;
    // Check for length
    $length = strlen($password);
    $allowedSpecialChars = '!*()_+-=[]{}|;:,.<>?';

    if ($length > 8 && $length < 20) {
        // Define allowed special characters (excluding XSS characters)
        // Check if password contains at least one special character from the allowed set
        if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $password)) {
            if (preg_match('/[<>&"\'\/]/', $password)) {
                $all_errors[] = "Password must not contain characters that can be used in XSS attacks.";
                $error_pass[] = "Password must not contain characters that can be used in XSS attacks.";
            } else {
                if ($password === $repassword) {
                    $flag++;

                    return true;
                } else {
                    $all_errors[] = "password not match";
                    $error_pass[] = "password not match";
                }

            }
        } else {
            $all_errors[] = "Password must not contain characters that can be used in XSS attacks.";
            $error_pass[] = "Password must not contain characters that can be used in XSS attacks.";
        }
    } else {
        $all_errors[] = "Password must be between 8 and 20 characters.";
        $error_pass[] = "Password must be between 8 and 20 characters.";
    }

}
function validateEmail($email)
{
    global $flag, $all_errors, $error_email;
    // Define allowed domains
    $allowedDomains = ['gmail.com', 'mailinator.com', 'hotmail.com'];
    $allowedSpecialChars = '!#$%^&*()_+-=[]{}|;:,<>?';
    $domain = substr(strrchr($email, "@"), 1);
    if (in_array($domain, $allowedDomains)) {
        //  Check if email contains at least one special character (excluding XSS characters)
        // Define allowed special characters (excluding XSS characters)
        if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $email)) {
            $flag++;

            return true;
        } else {
            $all_errors[] = "Email must contain at least one special character.";
            $error_email[] = "Email must contain at least one special character.";

        }


    } else {
        $all_errors[] = "Email must be from @gmail.com, @yahoo.com, or @hotmail.com.";
        $error_email[] = "Email must be from @gmail.com, @yahoo.com, or @hotmail.com.";
    }
}
function isValidPhoneNumber($phone)
{
    global $flag, $all_errors, $error_phone;

    // Check if the phone number is exactly 10 digits
    $pattern = '/^[0-9]{10}$/';
    if (preg_match($pattern, $phone)) {
        $flag++;

        return true;
    } else {
        $all_errors[] = "Number Format must be : 1××××××××× .";
        $error_phone[] = "Number Format must be : 1××××××××× .";

        return false;
    }
}
function validateDateOfBirth($dob)
{
    global $flag, $all_errors, $error_date;

    // Check for valid date format (DD/MM/YYYY)
    $dateRegex = '/^\d{2}\/\d{2}\/\d{4}$/';
    if (!preg_match($dateRegex, $dob)) {
        $all_errors[] = "Date of birth must be in the format DD/MM/YYYY.";
        $error_date[] = "Date of birth must be in the format DD/MM/YYYY.";
        return false;
    }

    // Sanitize input to prevent XSS
    $dob = htmlspecialchars($dob, ENT_QUOTES, 'UTF-8');

    // Split the date into parts
    $dobParts = explode('/', $dob);
    if (count($dobParts) !== 3) {
        $all_errors[] = "Invalid date format.";
        $error_date[] = "Invalid date format.";
        return false;
    }

    $day = intval($dobParts[0]);
    $month = intval($dobParts[1]);
    $year = intval($dobParts[2]);

    // Check if the date is valid
    if (!checkdate($month, $day, $year)) {
        $all_errors[] = "Invalid date.";
        $error_date[] = "Invalid date.";
        return false;
    }

    // Create a DateTime object and calculate the age
    $dateOfBirth = DateTime::createFromFormat('d/m/Y', $dob);
    if ($dateOfBirth === false) {
        $all_errors[] = "Invalid date of birth.";
        $error_date[] = "Invalid date of birth.";
        return false;
    }

    $today = new DateTime();
    $age = $today->diff($dateOfBirth)->y;

    // Check if the user is at least 18 years old
    if ($age < 18) {
        $all_errors[] = "You must be at least 18 years old.";
        $error_date[] = "You must be at least 18 years old.";
        return false;
    }

    $flag++;

    return true;
}
function checkdata($data)
{
    global $error_img;
    $file = $data;
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_type = $file['type'];
    $file_tmp = $file['tmp_name'];
    $allowedext = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

    ////////////////////////////////
    $arrfilename = explode('.', $file_name);
    $fileext = strtolower(end($arrfilename));
    $unique = md5(time() . rand()) . '.' . $fileext;
    // for test
    //echo $unique;
    if (in_array($fileext, $allowedext)) {
        global $immm ,$flag;
        if ($file_size <= 1000000) {
            if ($file_type == 'image/jpeg' || $file_type == 'image/png') {
                

                $flag++;
                return true;
            } else {
                $error_img[] = 'File type not allowed(jpeg,png only)';
            }
        } else {
            $error_img[] = 'File size is too large';
        }
    } else {
        $error_img[] = 'File extension not allowed';
    }

}
// Handle the file upload


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flag = 0;
    global $immm;   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $phone_number = $_POST['phone-number'];
    $day = $_POST['birth-date'];
    $email = $_POST['email'];
    $gender = $_POST['radio'];
    $img = $_FILES['profile_image'];
    $img_name =$img ['name'];

    if (checkdata($img) && validateUsername($username) && validatePassword($password, $repassword) && validateEmail($email) && isValidPhoneNumber($phone_number) && validateDateOfBirth($day)) {
        $file = $img;
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_type = $file['type'];
        $file_tmp = $file['tmp_name'];
        $allowedext = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

        ////////////////////////////////
        $arrfilename = explode('.', $file_name);
        $fileext = strtolower(end($arrfilename));
        $unique = md5(time() . rand()) . '.' . $fileext;
        $immm =$_SERVER['DOCUMENT_ROOT'] . '\php\project\mypic\includs\uploads\\' . $unique;
        move_uploaded_file($_FILES["profile_image"]["tmp_name"],  $immm);
    
        $arr_of_data =array($username, $password, $phone_number, $day, $email, $gender, $img_name);
        // echo "<pre>";
        // print_r($arr_of_data);
        // echo "</pre>";
        $servername = "localhost";
        $username_db = "root";
        $password = "";
        $dbname = "regg";
        
        // Create connection
        $conn = mysqli_connect($servername, $username_db, $password, $dbname);

        // Check connection


        if ($conn->connect_error) {
            // die("Connection failed: " . $conn->connect_error);
        } else {
            // echo "Connected successfully";
            $sql = "INSERT INTO reg (usernames,passwords,emails,phones,dates, genders,imgs)   VALUES ('$username','$repassword','$email','$phone_number','$day','$gender','  $immm')";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                $validate ="New user created successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
            }

            




        }
    }



}

