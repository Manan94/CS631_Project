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

function increaseProductCount($conn, $cartID, $productID) {
	$sql = "update appears_in set Quantity = Quantity + 1 where CartID = '".$cartID."' and PID = '".$productID."';";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}

function getProductPrice($conn, $PID) {
	$status = $_SESSION["Status"];
	$Price = "";
	$sql = "";
	if($status == "G" || $status == "P") {
		$sql = "SELECT OfferPrice from offer_product where PID = ".$PID.";";
		$result = $conn->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $conn->error);
		} else {
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$Price = $row['OfferPrice'];
					break;
				}
			} else {
				$Price = "";
			}
		}
	} 
	if($Price == ""){
		$sql = "SELECT PPrice from Product where PID = ".$PID.";";
		$result = $conn->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $conn->error);
		} else {
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$Price = $row['PPrice'];
				}
			} else {
				return null;
			}
		}
	}
	return $Price;
	
}

function insertProductInCart($conn, $cartID, $productID) {
	$Price = getProductPrice($conn, $productID);
	$sql = "INSERT INTO appears_in (CartID, PID, Quantity, PriceSold) VALUES (".$cartID.", ".$productID.", '1', ".$Price.");";
	$result = $conn->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
}
/*********************************************/

$cartID = getCartID($conn, $customerID, $productID);

if($cartID == null) {
	createNewCart($conn, $customerID);
	$cartID = getCartID($conn, $customerID, $productID);
}

if(isProductAlreadyInTheCart($conn, $cartID, $productID)){
	increaseProductCount($conn, $cartID, $productID);
} else {
	insertProductInCart($conn, $cartID, $productID);
}
$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>