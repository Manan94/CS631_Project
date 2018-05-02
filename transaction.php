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
$cartID = "";
/**************************/

/**************** functions ***************/

function updateTransactionStatus($conn, $customerID) {
	$sql = "UPDATE cart SET TStatus = 'C' where CID = '".$customerID."' and TStatus is NULL;";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}

/*********************************************/
updateTransactionStatus($conn, $customerID);
$conn->close();
header('Location: ' . 'menu.php');
?>