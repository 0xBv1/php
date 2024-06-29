<?php

//type of variable
// int 
$intvar = 30;
var_dump(($intvar));
//////////////////////////
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
echo strlen("Hello world!");
echo '<br>';
echo strpos("Hello world!", "world");
echo '<br>';
echo str_word_count("Hello world!");
echo '<br>';
/////////////////////////////

//float variable

$floatvar = 3.14;
var_dump($floatvar);
/////////////////////////////

//boolean variable

$booleanvar = true;
var_dump($booleanvar);
/////////////////////////////

//array variable

$arrayvar = array(1,2,3,4,5);
var_dump($arrayvar);
/////////////////////////////

//object variable

$objectvar = new stdClass();
var_dump($objectvar);

/////////////////////////////

//concatenate between strings
echo "<br>myname is $stringvar  and my age is $intvar";
echo '<br>myname is' . $stringvar .' and my age is ' . $intvar;
/////////////////////////////
// php is sensitive  in variable names

$myName = '<br>test1';
$myNamE = '<br>test2<br>';

echo $myName;
echo $myNamE;

////////////////////////////

// php   loosely typed language &$variable

$x =100 ;
$y = &$x;//$y = $x
$y = 200; // $x = 200
echo $x;//200
echo $y;//200

//comments type  //    /*   */    DocBlock
// this is single line comment
/* this is multi line comment
this is multi line comment
this is multi line comment */
/**
 * this is DocBlock comment
 * this is DocBlock comment
 * this is DocBlock comment
 */
////////////////////////////
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

////////////////////////////
// constant variables
$thse ='<br>sdfajsndrfjna';
define("NAME",$thse);
echo NAME; 
///////////////////////////////

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
echo "<br>";
///////////////////////////////

//builtin function in php
echo "<br>this file direction :".__DIR__;
echo "<br>this is my os: ".PHP_OS_FAMILY." this is the line number in code  ".__LINE__;
echo "<br>tks is my php version: ".PHP_VERSION." this is the line number in code ".__LINE__;
echo "<br>this is the max number of my system : ".PHP_INT_MAX;
echo "<br>this is the min number of my system : ".PHP_INT_MIN;
///////////////////////////////

// if you want 
// variable variables
$x = '<br>name';
$$x = "<br>6565";
echo $x ;
echo $$x;
echo "<br>$x" ;
echo "<br>$$x" ;
echo "<br>{$$x}";
////////////////////////////////
//  soft Debug
//var_dump($$x);
// print_r();
echo "<br>";
////////////////////////////////

$isConnected = true ;
$isOffline = false ;

var_dump($isConnected);echo " this is the line number in code  ".__LINE__."<br>";
var_dump($isOffline);echo " this is the line number in code  ".__LINE__."<br>";
print_r($isConnected);echo " this is the line number in code  ".__LINE__."<br>";
print_r($isOffline);echo " this is the line number in code  ".__LINE__."<br>";
//////////////////////////////////////////////////
echo true ."<br>";
echo false."<br>" ;// empty string
$test = null;
if($test == true) {
echo "this is truthy value"."<br>";
} else {
echo "this is falsy value"."<br>";
}
///////////////////////////////////////////////
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
/////////////////////////////////////////
echo PHP_INT_MIN; // -9223372036854775808 

echo PHP_INT_MAX;// 9223372036854775807


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