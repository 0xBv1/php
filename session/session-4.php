<?php 
// $user = [
//     'name'   => 'ahmed sayed' ,
//     'email'  => 'ahmed@gmail.com',
//     'skills' => ['js' , 'css' , 'html']
// ];
// foreach($user as$k => $value){
//     if($k == 'skills'){
//         foreach($value as $skill){
//             echo $skill;
//             echo '<br>';
//         }
//     }
// else{
//       echo $value;
//     echo '<br>';
// }
// }

// $user = [
//     'name'   => 'ahmed sayed' ,
//     'email'  => 'ahmed@gmail.com',
//     'skills' => ['js' , 'css' , 'html']
// ];
// foreach($user as$k => $value){
//     if(is_array($value)== true){      
//         foreach($value as $skill){
//             echo $skill;
//             echo '<br>';
//         }     
//     }
// else{
//       echo $value;
//     echo '<br>';
// }
// }

// ternary operator
$is_loggged = true;
$rule ='user';
// $status = $is_loggged == true ? '<button> logout</button>' :'<button> login</button>'
// null coalescing
//

$x = true;
$y = false;
$z = true;
var_dump($x && !$y || $z && false);
// ++$x	Pre-increment	Increments $x by one, then returns $x
$x = 5;
echo ++$x;//6
echo "<br>";
// $x++	Post-increment	Returns $x, then increments $x by one
$x = 5;
echo $x++;//5
echo "<br>";
echo $x;
echo "<br>";
//	Post-increment for string values
$x = "5";
echo $x++;//5
echo "<br>";
echo $x;
echo "<br>";
//	Pre-decrement for string values
$x = "5";
echo --$x;//4
echo "<br>";
//	Post-decrement for string values
$x = "5";
echo $x--;//5
echo "<br>";
echo $x;
echo "<br>";
//	Pre-increment for string values
$x = "5";
echo ++$x;//6
echo "<br>";
///////////////////////////////
// PHP Logical Operators
// and 	And	$x and $y	True if both $x and $y are true
$x = 5;
$y = 10;
var_dump($x > $y and $y > $x);//false
echo "<br>";
// or	Or	$x or $y	True if either $x or $y is true
$x = 5;
$y = 10;
var_dump($x > $y or $y > $x);//true
echo "<br>";
// &&	And	$x && $y	True if both $x and $y are true	
$x = 5;
$y = 10;
var_dump($x > $y && $y > $x);//false
echo "<br>";
// ||	Or	$x || $y	True if either $x or $y is true	
$x = 5;
$y = 10;
var_dump( $x > $y || $y > $x);//true
echo "<br>";
// !	Not	!$x	True if $x is not true
$x = 5;
var_dump( !$x);//false
echo "<br>";
$x = true;
$y = false;
$z = true;
var_dump($x && !$y || $z && false);
// if statement
// if (condition) {
//     code to be executed if condition is true;
//   }
// if (condition) {
//     code to be executed if condition is true;
//   } else {
//     code to be executed if condition is false;
//   }
// if (condition) {
//     code to be executed if condition is true;
//   } elseif (condition) {
//     code to be executed if the first condition is false and the second condition is true;
//   } else {
//     code to be executed if both the first and the second conditions are false;
//   }
// if (condition) {
//     code to be executed if condition is true;
//   } elseif (condition) {
//     code to be executed if the first condition is false and the second condition is true;
//   } elseif (condition) {
//     code to be executed if the first and the second conditions are false and the third condition is true;
//   } else {
//     code to be executed if all conditions are false;
//   }
// while statement
// while (condition) {
//     code to be executed;
//   }
// do {
//     code to be executed;
//   } while (condition);
// for statement
// for (init counter; test counter; increment counter) {
//     code to be executed;
//   }
// foreach statement
// foreach ($array as $value) {
//     code to be executed;
//   }
// foreach ($array as $key => $value) {
//     code to be executed;
//   }













?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?= $is_loggged == true   ? 
    ($rule == 'admin' ? '<button> logout</button> <br> <button> dashbord</button>' :'<button> login</button>' )
    :'<button> login</button>' 
    ;?> -->
</body>
</html>