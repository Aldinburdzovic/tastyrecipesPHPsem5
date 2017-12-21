<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "tastyrecipes";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
