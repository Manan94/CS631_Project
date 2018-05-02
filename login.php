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
$sql = "SELECT * FROM Customer where Email = '".$_POST["email"]."';";
$result = $conn->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
else {
	if ($result->num_rows == 1) {
		session_start();
		$row = $result->fetch_assoc();
		$_SESSION["CID"] = $row["CID"];
		$_SESSION["Status"] = $row["Status"];
		$_SESSION["CName"] = $row["FName"]." ".$row["LName"];
		$conn->close();
		header('Location: menu.php');
	} else {
		$conn->close();
		header('Location: index.php');
	}
}
?>