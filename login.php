<?php

$servername = "sql1.njit.edu:3306/jm794";
$username = "jm794";
$password = "Ljwt4FUD";
/*
// Oracle
$servername = "prophet.njit.edu";
$username = "jm794";
$password = "dYpqSY6jN";
*/
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
	echo $conn->connect_error;
}
else {
	echo "Connected successfully";
	//login customer logic and set session with email and name
}
session_start();
$_SESSION["user"] = $_POST["email"];

header('Location: menu.php');

?>