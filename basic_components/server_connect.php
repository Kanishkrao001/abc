<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

$connect = mysqli_connect($servername, $username, $password, $database);

if(!$connect)
{
    die("sorry can't connect to server :" . mysqli_connect_error());
}

?>