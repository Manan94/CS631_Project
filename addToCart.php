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
$cartID = null;
/**************************/

/**************** functions ***************/

function getCartID($conn, $customerID, $productID) {
	$sql = "SELECT CartID FROM Cart where CID = '".$customerID."' and TStatus is NULL;";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
	else {
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return $row['CartID'];
			}
		} else {
			return null;
		}
	}
	return null;
}

function createNewCart($conn, $customerID) {
$sql = "INSERT INTO cart (CartID, CID, SAName, CCNumber, TStatus, TDate) VALUES (NULL, '".$customerID."', NULL, NULL, NULL, NULL)";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}

function isProductAlreadyInTheCart($conn, $cartID, $productID) {
$sql = "SELECT * from appears_in where CartID = '".$cartID."' and PID = '".$productID."';";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
	else {
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
	return false;
}

/*********************************************/

$cartID = getCartID($conn, $customerID, $productID);
if($cartID == null) {
	createNewCart($conn, $customerID);
	$cartID = getCartID($conn, $customerID, $productID);
}

if(isProductAlreadyInTheCart($conn, $cartID, $productID)){
	// increase the count
} else {
	//insert in appears in
}

echo $cartID;



$conn->close();
?>