<?php
$servername = "localhost:3306";//"sql1.njit.edu:3306/jm794";
$username = "root";//"jm794";
$password = "";//"Ljwt4FUD";
$dbname = "dmsd";
/*
// Oracle
$servername = "prophet.njit.edu";
$username = "jm794";
$password = "dYpqSY6jN";
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

/***** Global Vars ********/
$customerID = $_SESSION["CID"];
$productID = $_POST["PID"];
$cartID = $_POST["CartID"];
/**************************/

/**************** functions ***************/

function decreaseProductCount($conn, $cartID, $productID) {
	$sql = "update appears_in set Quantity = Quantity - 1 where CartID = '".$cartID."' and PID = '".$productID."';";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}

/*********************************************/



decreaseProductCount($conn, $cartID, $productID);
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>