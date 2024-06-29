<?php


//Type Juggling + Automatic Type Conversion

echo 1 + "2"; // 3
echo '<br>';
echo gettype(1 + "2"); // Integer
echo '<br>';
echo True; // 1
echo '<br>';
echo gettype(True); // Boolean
echo '<br>';
echo True + True; // 2
echo '<br>';
echo gettype(True + True); // Integer
echo '<br>';
echo 5 + '5 Lessons'; // 10 => Warning
echo '<br>';
echo gettype(5 + '5 Lessons'); // Integer => Warning
echo '<br>';
echo 10 + 15.5; // 25.5
echo '<br>';
echo gettype(10 + 15.5); // double => Float
echo '<br>';
//////////////////////////////


// casting   int->integer
echo 5 + (int)"5fgsdfgf5sd"."<br>"; ///  5+5 = 10
//    5+       ^×××××××××× >> 5 =10           
echo 5 + (int)"x5fgsdfgfgsd"."<br>"; ///  5+0 = 10
//    5+       ××××××××××× >> 0 =5

echo 5 + (int) 15.5."<br>"; ///  5+15 = 10
//    5+       15 >> 15 =20
echo (int)(5.3 + 15.5)."<br>"; ///  5+15.5 = 20.5 

/////////////////////////////

// herodoc == ""     nowdoc  == ''
//heredoc 
$name = "BV1";

echo <<<"heretest"
    my name is $name
    ''''\\ \\\ \ \ ';';';;;  "|"""'

    heretest;
echo "<br>";
echo '<ul>';
echo "<li>" . $name . "</li>";
echo '</ul>';
echo '\/\/\/\/\/\/\/\/\/\/\/\/\/<br>';
echo <<<"navlinks"
<ul>
<li>$name</li>
</ul>
navlinks;
////////////////////////////////////

$database = 123 ; //  null predefined php constant  NULL
var_dump($database);
echo "<br>";
unset($database);
$database = "bedo" ; //  null predefined php constant  NULL
var_dump($database);
unset($database);
//var_dump($database);
echo "<br>";
///////////////////////////
//array

$arr = ['1' ,'1', '1'];
$arr2 = ['2' ,'2', '2'];

$arr[1] = 'css';
$arr[2] = 50 ;
// var_dump($arr);
echo "<br>";

// var_dump($arr2);
$arr[] = 'cssss';

echo "<br>";

// var_dump($arr);
echo "<br>";


array_push($arr, $arr2);

var_dump($arr);//  length start 1      index  start 0
echo "<br>";

//echo $arr ; // error  : Array to string conversion
echo $arr[1];
echo "<br>";



$allProgLangs = array('php2' ,'python2', 'java2');
echo $allProgLangs[1];// 'python2'
$x = $allProgLangs[1];

echo $arr[20];

echo "<br>";
//isset($x)
$x =null;
var_dump(isset($x));
echo "<br>";

echo '<pre>';
print_r($arr);
echo '</pre>';
echo "<br>";

// Associative Array

$arr = [0 => 'php' , 1 => 'python' , 2 => 'java'];
var_dump($arr);
echo "<br>";
$arr = [ 'php' ,  'python' ,  'java'];
var_dump($arr);
echo "<br>";


$langs = ['php' , 'ruby' ,  'java'];

$frams = ['laravel' , ' rails' , 'spring'];

$x = ['php' => 'laravel' , 'ruby' => 'rails'];

// $x['php'];  
echo '<pre>';
print_r($x);
echo '</pre>';

echo "<br>";


$langs = ['php' , 'ruby' ,  'java'];

$frams = ['laravel' , 'rails' , 'spring'];

$x = [$langs[0] => $frams[0] , $langs[1] => $frams[1]];
echo "<br>";
echo '<pre>';
print_r($x);
echo '</pre>';

echo "<br>";
$degrees = [50,256,4,7,258,4,8];

$degreesOfSTD = ['ahmed' => 50,  6585 => 'y', 'mohamed' => 256,'sayed' => 4,'gamal' => 7 ];

echo $degreesOfSTD['mohamed'];


echo "<br>";


$classes = [
  ['a' , 'b' , 'c'] ,
  ['d' , 'e' , 'f'] ,
  ['g' , 'h' , 'i'] ,
];

var_dump($classes[2][2]);

$classes = ['class1' , 'class2' , 'class3'];

echo "<br>";

$users = [
  ['name' => 'ahmed' , 'age' => 50 , 'pw' => '5455' , 'ewhrwe@gmail.com' , 123456789],
];

echo "<br>";

$products = [
  'clothes' => [
    ['name' => 'x' ,'price' => 55 , 'date' => 'date 1'],
    ['name' => 'y' ,'price' => 100 , 'date' => 'date 1'],
  ],
  'food' => [
    [ 'x' , 55 ,  'date 1'],
    [ 'y' , 100 ,  'date 1'],
  ]
  ];

echo $products['clothes'][0]['name'];
echo "<br>";
echo $products['food'][0][1];

echo "<br>";



$arr = [true => 'sayed' , null => 'ahmed' , 1 => '1' , '3' => 'string 1' ];

echo $arr['3'];
echo "<br>";

echo $arr[3];
echo "<br>";

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//array
// Array Items
$myArr = array("Volvo", 15, ["apples", "bananas"], myTest2());
echo count($myArr);echo "<br>";
//PHP Indexed Arrays
var_dump($myArr);echo "<br>";
//Access Indexed Arrays
echo $myArr[0];echo "<br>";
//Change Value

$cars = array("Volvo", "BMW", "Toyota");
$cars[1] = "Ford";
var_dump($cars);echo "<br>";

array_push($cars, "Ford");var_dump($cars);echo "<br>";
//Access Associative Arrays
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);echo $car["model"];echo "<br>";

//Change Value
$car["year"] = 2024;var_dump($car);echo "<br>";
//Add Array Item
$fruits = array("Apple", "Banana", "Cherry");
$fruits[] = "Orange";
 //Add Multiple Array Items
array_push($fruits, "Lemon", "Peach");var_dump($fruits);echo "<br>";
// Add Multiple Items to Associative Arrays
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);echo $car["model"];echo "<br>";
echo "<br>";

 //Using the unset Function
unset($cars[1]);var_dump($cars);echo "<br>";
//Remove Item From an Associative Array
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);

unset($car["model"]);var_dump($car);echo "<br>";
echo "<br>";
//Remove the Last Item

$cars = array("Volvo", "BMW", "Toyota");
array_pop($cars);var_dump($cars);echo "<br>";

//Remove the First Item 

$cars = array("Volvo", "BMW", "Toyota");
array_shift($cars);var_dump($cars);echo "<br>";

//Remove Multiple Items

$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 2);var_dump($cars);echo "<br>";

//Remove All Items

$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 0, count($cars));var_dump($cars);echo "<br>";
//	Checks if the specified key exists in the array

$cars = array("Volvo", "BMW", "Toyota");
if (array_key_exists(0, $cars)) {
  echo "yes";
}else{
  echo "no";
}echo "<br>";
echo "<br>";
$cars = array("Volvo", "BMW", "Toyota");
if (isset($cars[0])) {
  echo "yes";
}else{
  echo "no";
}echo "<br>";
////////////////////////////////////

// PHP Arithmetic Operators  +  -  * / %  **d 
echo "<br>";
// +	Addition	$x + $y	Sum of $x and $y	
$x = 5;
$y = 10;
$sum = $x + $y;
echo $sum;//15
echo "<br>";
// -	Subtraction	$x - $y	Difference of $x and $y	
$x = 5;
$y = 10;
$sum = $x - $y;
echo $sum;//5
echo "<br>";
// *	Multiplication	$x * $y	Product of $x and $y	
$x=5 ;
$y=10;
$sum = $x * $y;
echo $sum;//50
echo "<br>";
// /	Division	$x / $y	Quotient of $x and $y	
$x=5 ;
$y=10;
$sum = $x / $y;
echo $sum;//0.5
echo "<br>";
// %	Modulus	$x % $y	Remainder of $x divided by $y	
$x=5 ;
$y=10;
$sum = $x %$y;
echo $sum;//5
echo "<br>";
// **	Exponentiation 	$x ** $y	Result of raising $x to the $y'th power
$x=5 ;
$y=10;
$sum = $x ** $y;
echo $sum;//9765625
echo "<br>";
///////////////////////////////////////
//PHP Assignment Operators  =   +=   -=  /=  *=  %=  **=
// x = y	x = y	The left operand gets set to the value of the expression on the right	
$x = 5;
$y = 10;
$x = $y;
echo $x;//10
echo "<br>";
// x += y	x = x + y	Addition	
$x = 5;
$y = 10;
$x += $y;
echo $x; //15
echo "<br>";
// x -= y	x = x - y	Subtraction	
$x = 5;
$y = 10;
$x -= $y;
echo $x;//-5
echo "<br>";
// x *= y	x = x * y	Multiplication	
$x = 5;
$y = 10;
$x *= $y;
echo $x;//50
echo "<br>";
// x /= y	x = x / y	Division	
$x = 5;
$y = 10;
$x /= $y;
echo $x;//0.5
echo "<br>";
// x %= y	x = x % y	Modulus	
$x = 5;
$y = 10;
$x %= $y;
echo $x;
echo "<br>";//5
// .=	Concatenation assignment	$txt1 .= $txt2	Appends $txt2 to $txt1
$txt1 = "Hello";
$txt2 = " World";
$txt1 .= $txt2;
echo $txt1;//"Hello World"
echo "<br>";

////////////////////////////////////

// PHP Comparison Operators  ==   ===   !=   !==  <  >  <=  >=  <=>
// ==	Equal	$x == $y	Returns true if $x is equal to $y
$x = 5;
$y = 10;
var_dump($x == $y);
echo "<br>";//false
// ===	Identical	$x === $y	Returns true if $x is equal to $y, and they are of the same type
$x = 5;
$y = "5";
var_dump($x === $y);
echo "<br>";//false
// !=	Not equal	$x != $y	Returns true if $x is not equal to $y
$x = 5;
$y = 10;
var_dump($x != $y);
echo "<br>";//true
// !==	Not identical	$x !== $y	Returns true if $x is not equal to $y, or they are not of the same type
$x = 5;
$y = "5";
var_dump($x !== $y);
echo "<br>";//true
// <	Less than	$x < $y	Returns true if $x is less than $y
$x = 5;
$y = 10;
var_dump($x < $y);
echo "<br>";//true
// >	Greater than	$x > $y	Returns true if $x is greater than $y
$x = 5;
$y = 10;
var_dump($x > $y);//False
echo "<br>";
// <=	Less than or equal to	$x <= $y	Returns true if $x is less than or equal to $y
$x = 5;
$y = 10;
var_dump($x <= $y);//true
echo "<br>";
// >=	Greater than or equal to	$x >= $y	Returns true if $x is greater than or equal to $y
$x = 5;
$y = 10;
var_dump($x >= $y);//false
echo "<br>";
// <=>	Spaceship	$x <=> $y	Returns an integer less than, equal to, or greater than zero, depending on if $x is less than, equal to, or greater than $y
$x = 5;
$y = 10;
var_dump($x <=> $y); // -1
echo "<br>";
// PHP Increment / Decrement Operators
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
// --$x	Pre-decrement	Decrements $x by one, then returns $x
$x = 5;
echo --$x;//4
echo "<br>";
// $x--	Post-decrement	Returns $x, then decrements $x by one
$x = 5;
echo $x--;//5
echo "<br>";
echo $x;
echo "<br>";

////////////////////////////////////

//PHP The static Keyword
function myTest2() {
  static $x = 0;
  echo "<br>";

  echo $x;
  $x++;
  echo "<br>";

}

myTest2();
myTest2();
myTest2();


// string  and escapings 
echo 'hello \'world\'';
echo "<br>";

echo 'hello world\\';
echo "<br>";
echo 'this line 
is printed 
in the same line ';
echo nl2br('this line 
is printed 
in multiple lines ');
echo "<br>";


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
// PHP Array Operators
//+	Union	$x + $y	Union of $x and $y	
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x + $y);//array(4) { ["a"]=> string(3) "red" ["b"]=> string(5) "green" ["c"]=> string(4) "blue" ["d"]=> string(6) "yellow" }
echo "<br>";
// ==	Equality	$x == $y	Returns true if $x and $y have the same key/value pairs	
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x == $y);//false
echo "<br>";
// ===	Identity	$x === $y	Returns true if $x and $y have the same key/value pairs in the same order and of the same types	
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x === $y);//false
echo "<br>";
// !=	Inequality	$x != $y	Returns true if $x is not equal to $y	
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x != $y);//true
echo "<br>";
// <>	Inequality	$x <> $y	Returns true if $x is not equal to $y	
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x <> $y);//true
echo "<br>";
// !==	Non-identity	$x !== $y	Returns true if $x is not identical to $y
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");
var_dump($x !== $y);//true


////////////////////////////////////

////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>