<?php
$all_errors = [];
echo "<pre>";
print_r($_POST);
print_r($all_errors);

echo "</pre>";

$flag = 0;
function validateUsername($username)
{
    global $all_errors;
    $length = strlen($username);
    if ($length > 8 && $length < 20) {
        if (!preg_match('/[!@#$%^*()_+\-=~`<>\"\'&]/', $username)) {

            return true;

        } else {
            $all_errors[] = "Username mustn`t contain  special character.";
        }
    } else {
        $all_errors[] = "username must be between 8 and 20 characters.";
    }
}
function validatePassword($password, $repassword)
{
    global $all_errors;
    // Check for length
    $length = strlen($password);
    $allowedSpecialChars = '!*()_+-=[]{}|;:,.<>?';

    if ($length > 8 && $length < 20) {
        // Define allowed special characters (excluding XSS characters)
        // Check if password contains at least one special character from the allowed set
        if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $password)) {
            if (preg_match('/[<>&"\'\/]/', $password)) {
                $all_errors[] = "Password must not contain characters that can be used in XSS attacks.";
            } else {
                if ($password === $repassword) {
                    return true;
                } else {
                    $all_errors[] = "password not match";
                }

            }
        } else {
            $all_errors[] = "Password must not contain characters that can be used in XSS attacks.";
        }
    } else {
        $all_errors[] = "Password must be between 8 and 20 characters.";
    }

    // 
    // 

    // // Check if password contains at least one special character from the allowed set
    // if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $password)) {
    //     $all_errors[] = "Password must contain at least one special character.";
    // }

    // // Check for XSS characters (like <, >, &, ", ')
    // if (preg_match('/[<>&"\'\/]/', $password)) {
    //     $all_errors[] = "Password must not contain characters that can be used in XSS attacks.";
    // }

    // // XSS Protection (sanitize output)
    // $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    // // If all checks pass
    // return true;
}

function validateEmail($email)
{
    global $all_errors;
    // Define allowed domains
    $allowedDomains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
    $allowedSpecialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
    $domain = substr(strrchr($email, "@"), 1);
    if (in_array($domain, $allowedDomains)) {
        //  Check if email contains at least one special character (excluding XSS characters)
        // Define allowed special characters (excluding XSS characters)
        if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $email)) {
            return true;
        } else {
            $all_errors[] = "Email must contain at least one special character.";

        }


    } else {
        $all_errors[] = "Email must be from @gmail.com, @yahoo.com, or @hotmail.com.";
    }
}
function isValidPhoneNumber($phone)
{


    // Check if the phone number is exactly 10 digits
    $pattern = '/^[0-9]{10}$/';
    if (preg_match($pattern, $phone)) {
        return true;
    } else {
        $all_errors[] = "Number Format must be : 1××××××××× .";

        return false;
    }
}
function validateDateOfBirth($dob) {
    global $all_errors;

    // Check for valid date format (DD/MM/YYYY)
    $dateRegex = '/^\d{2}\/\d{2}\/\d{4}$/';
    if (!preg_match($dateRegex, $dob)) {
        $all_errors[] = "Date of birth must be in the format DD/MM/YYYY.";
        return false;
    }

    // Sanitize input to prevent XSS
    $dob = htmlspecialchars($dob, ENT_QUOTES, 'UTF-8');

    // Split the date into parts
    $dobParts = explode('/', $dob);
    if (count($dobParts) !== 3) {
        $all_errors[] = "Invalid date format.";
        return false;
    }

    $day = intval($dobParts[0]);
    $month = intval($dobParts[1]);
    $year = intval($dobParts[2]);

    // Check if the date is valid
    if (!checkdate($month, $day, $year)) {
        $all_errors[] = "Invalid date.";
        return false;
    }

    // Create a DateTime object and calculate the age
    $dateOfBirth = DateTime::createFromFormat('d/m/Y', $dob);
    if ($dateOfBirth === false) {
        $all_errors[] = "Invalid date of birth.";
        return false;
    }

    $today = new DateTime();
    $age = $today->diff($dateOfBirth)->y;

    // Check if the user is at least 18 years old
    if ($age < 18) {
        $all_errors[] = "You must be at least 18 years old.";
        return false;
    }

    echo 'Date is valid';
    return true;
}

// function validateDateOfBirth($dob)
// {
//     global $all_errors;
//     // Check for valid date format (DD/MM/YYYY)
//     $dateRegex = '/^\d{2}\/\d{2}\/\d{4}$/';
//     $dobParts = explode('/', $dob);
//     $day = intval($dobParts[0]);
//     $month = intval($dobParts[1]);
//     $year = intval($dobParts[2]);
//     $dateOfBirth = DateTime::createFromFormat('d/m/Y', $dob);
//     $today = new DateTime();
//     $age = $today->diff($dateOfBirth)->y;
//     $allowedSpecialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
//     if (preg_match($dateRegex, $dob)) {
//         if (count($dobParts) == 3) {
//             if (checkdate($month, $day, $year)) {
//                 if ($dateOfBirth === false) {
//                     if ($age < 18) {
//                         if (preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $dob)) {
//                             if (!preg_match('/[<>&"\'\/]/', $dob)) {
//                                 echo 'date true';
//                                 return true;
//                             } else {
//                                 $all_errors[] = "Date of birth must not contain characters that can be used in XSS attacks.";
//                             }

//                         } else {
//                             $all_errors[] = "Date of birth must contain at least one special character.";
//                         }

//                     } else {
//                         $all_errors[] = "You must be at least 18 years old.";
//                     }
//                 } else {
//                     $all_errors[] = "Invalid date of birth.";
//                 }
//             } else {
//                 $all_errors[] = "Invalid date.";
//             }

//         } else {
//             $all_errors[] = "Invalid date format.";
//         }
//     } else {
//         $all_errors[] = "Date of birth must be in the format DD/MM/YYYY.";

//     }



    // // Define allowed special characters (excluding XSS characters)
    // 

    // // Check if the input contains at least one special character from the allowed set
    // if (!preg_match('/[' . preg_quote($allowedSpecialChars, '/') . ']/', $dob)) {
    //     $all_errors[] = "Date of birth must contain at least one special character.";
    // }

    // // Check for XSS characters (like <, >, &, ", ')
    // if (preg_match('/[<>&"\'\/]/', $dob)) {
    //     $all_errors[] = "Date of birth must not contain characters that can be used in XSS attacks.";
    // }

    // // XSS Protection (sanitize output)
    // $dob = htmlspecialchars($dob, ENT_QUOTES, 'UTF-8');

    // // If all checks pass
    // return true;
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $repassword = $_POST['repassword'];
    // $phone_number =$_POST['phone-number'];
    // isValidPhoneNumber($phone_number);
    $day = $_POST['birth-date'];
    validateDateOfBirth($day);
    // $email = $_POST['email'];
    // validateEmail($email);
    // validateUsername($username);
    // validatePassword($password,$repassword);
}

