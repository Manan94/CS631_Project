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
$SAName = $_POST["SAName"];
/**************************/

/**************** functions ***************/
function getCartID($conn, $customerID) {
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

function addShippingAddressInCart($conn, $cartID, $SAName) {
	$sql = "UPDATE cart SET SAName = '".$SAName."' WHERE cart.CartID = '".$cartID."';";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}

/*********************************************/
$cartID = getCartID($conn, $customerID);
addShippingAddressInCart($conn, $cartID, $SAName);
$conn->close();
header('Location: ' . 'checkoutStep2.php');
?>