<?php

$servername = "localhost";
$root = "root";
$password = "123";
$db = "caltest";

$connect = new mysqli($servername, $root, $password, $db, 3307) or die("Errors Check" .mysqli_error());


?>
