<?php
$servername = 'localhost';
$db = 'products';
$username = 'root';
$password = 'password';

$con = new mysqli('localhost', 'root', 'password', 'products');
if (!$con) {
    die(mysqli_error($con));
}
?>
