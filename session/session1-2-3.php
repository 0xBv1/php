<?php

//type of variable
// int 
$intvar = 30;
var_dump(($intvar));
//string variable
$stringvar ="bv1";
$stringvar2 ="bv2";

var_dump($stringvar);

$name ;
$name = '<br>mohamed';
$name = '<br>ahmed';
echo $name ;

$nameh = 'ahmed' ;

echo $nameh[-1];
//float variable

$floatvar = 3.14;
var_dump($floatvar);

//boolean variable

$booleanvar = true;
var_dump($booleanvar);

//array variable

$arrayvar = array(1,2,3,4,5);
var_dump($arrayvar);

//object variable

$objectvar = new stdClass();
var_dump($objectvar);


//concatenate between strings
echo "<br>myname is $stringvar  and my age is $intvar";
echo '<br>myname is' . $stringvar .' and my age is ' . $intvar;
// php is sensitive  in variable names

$myName = '<br>ahmed sayed';
$myNamE = '<br>ahmed sayed2<br>';

echo $myName;

echo $myNamE;


// comments type , //   , /*   */   DocBlock
/**
 *
 *
 * dfsf]
 * sdf
 * sdf
 * sdf
 *
 */

//defrence between single and double quotes.
//  in single quotes output will be string even input is variable.
// in double quotes The value between the parentheses will be considered if it contains a variable.
echo $stringvar;
echo '<br>$stringvar';
echo "<br>$stringvar";
echo '<br>my name is $stringvar $stringvar2';
echo "<br>my name is $stringvar $stringvar2";
echo "<br>my name is {$stringvar} {$stringvar2}";
echo '<br>my name is {$stringvar} {$stringvar2}<br>';

echo "<br>this is my name is {$stringvar} {$stringvar2}";
echo "<br>this is my name is $stringvar $stringvar2";
echo "<br>this is my name is {$stringvar} $stringvar2";
echo "<br>this is my name is $stringvar {$stringvar2}";
echo "<br>this is my name is {$stringvar} {$stringvar2}";

// constant variables
$thse ='<br>sdfajsndrfjna';
define("NAME",$thse);
echo NAME; 


// global variable 
$firstName = "<br>ahmed2";
$lastName = "<br>sayed";
function test()
{
// this error  becuase variable is not defined inside function 
// to solve problem you can define variable inside function 
// or use global to reusing variable from outside function
global $firstName ;
echo $firstName;
}
test();
//builtin function in php
echo "<br>this file direction :".__DIR__;
echo "<br>this is my os: ".PHP_OS_FAMILY." this is the line number in code  ".__LINE__;
echo "<br>tks is my php version: ".PHP_VERSION." this is the line number in code ".__LINE__;
echo "<br>this is the max number of my system : ".PHP_INT_MAX;
echo "<br>this is the min number of my system : ".PHP_INT_MIN;


// if you want 
// variable variables
$x = '<br>name';
$$x = "<br>6565";
echo $x ;
echo $$x;
echo "<br>$x" ;
echo "<br>$$x" ;
echo "<br>{$$x}";

//  soft Debug
//var_dump($$x);
// print_r();
echo "<br>";

$isConnected = true ;
$isOffline = false ;

var_dump($isConnected);echo " this is the line number in code  ".__LINE__."<br>";
var_dump($isOffline);echo " this is the line number in code  ".__LINE__."<br>";
print_r($isConnected);echo " this is the line number in code  ".__LINE__."<br>";
print_r($isOffline);echo " this is the line number in code  ".__LINE__."<br>";
//////////////////////////////////////////////////
// falsy values   false , 0 -0  0.0  -0.0  null  []  '0'   ''
var_dump((bool)"" );
echo "<br>";
var_dump((bool) '0');
echo "<br>";
var_dump((bool) []);
echo "<br>";
var_dump((bool) array());
echo "<br>";
var_dump((bool) 0);
echo "<br>";
//true values 
var_dump((bool) 1);
echo "<br>";
var_dump((bool) array(1));
echo "<br>";
var_dump((bool) 1);
echo "<br>";
var_dump((bool) -1);
echo "<br>";
var_dump((bool) 45.1);
echo "<br>";
var_dump((bool) "bedo");
echo "<br>";
echo true ."<br>";
echo false."<br>" ;// empty string
$test = null;
if($test == true) {
echo "this is truthy value"."<br>";
} else {
echo "this is falsy value"."<br>";
}

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


// casting   int->integer
echo 5 + (int)"5fgsdfgf5sd"."<br>"; ///  5+5 = 10
//    5+       ^×××××××××× >> 5 =10           
echo 5 + (int)"x5fgsdfgfgsd"."<br>"; ///  5+0 = 10
//    5+       ××××××××××× >> 0 =5

echo 5 + (int) 15.5."<br>"; ///  5+15 = 10
//    5+       15 >> 15 =20
echo (int)(5.3 + 15.5)."<br>"; ///  5+15.5 = 20.5
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





?>
<!DOCTYPE html>
<html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <title>php</title></head><body></body></html>