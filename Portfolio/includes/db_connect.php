<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'User';

$conn = mysqli_connect('localhost', 'root','',"User",3307) or die ('Unable to connect');
mysqli_select_db($conn, 'User') or die(mysqli_error($conn));

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "connected";
}
?>