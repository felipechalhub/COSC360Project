<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "registration";

$conn = new mysqli($servername,$username,$password,$db);

if(!$conn){ 
    echo "Connection Failed!";
}
?>