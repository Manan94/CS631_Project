<?php

$servername = "localhost";//"sql1.njit.edu:3306/jm794";
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
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$addr = $_POST['address'];
$ph_no = $_POST['ph_no'];
$email = $_POST['email'];
//$password = $_POST['password'];
$sql = 'INSERT INTO Customer (FName, LName, Email, Address, Phone, Status) VALUES ("'.$fname.'", "'.$lname.'", "'.$email.'", "'.$addr.'", "'.$ph_no.'", "null")';
$result = $conn->query($sql);
if ($result === TRUE) {
    session_start();
    /*$row = $result->fetch_assoc();
    $_SESSION["CID"] = $row["CID"];
    $_SESSION["CName"] = $row["FName"]." ".$row["LName"];*/
    $sql2 = 'SELECT CID FROM Customer WHERE Email = "'.$email.'"';
    $result2 = $conn->query($sql2);
    $_SESSION["CID"] = $result2;
    $_SESSION["CName"] = $fname." ".$lname;
    $conn->close();
    header('Location: menu.php');
}
else {
  $conn->close();
  header('Location: index.php');
}
?>
