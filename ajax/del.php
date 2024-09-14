<?php 
$rdata = stripcslashes(file_get_contents("php://input"));
$rdata = json_decode($rdata, true);

$id = $rdata['id'];

$connection = mysqli_connect('localhost','root','','ajax',1121);
$stat = "delete from usersdata where id = $id";

mysqli_query($connection,$stat);
