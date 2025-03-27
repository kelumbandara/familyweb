<?php

$server="localhost";
$name="root";
$pass="sKy@1234";
$db="family_tree";

$con=mysqli_connect($server,$name,$pass,$db);

if(!$con){
    die("Connection Filed". mysqli_connect());
}

?>