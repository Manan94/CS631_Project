<?php
session_start();
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
$saname = $_POST['saname'];
$name = $_POST['name'];
$stname = $_POST['stname'];
$stno = $_POST['stno'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$country = $_POST['country'];

$sql = 'INSERT INTO Shipping_Address (CID, SAName, RecepientName, Street, SNumber, City, Zip, State, Country) VALUES ("'.$_SESSION['CID'].'","'.$saname.'", "'.$name.'", "'.$stname.'", "'.$stno.'", "'.$city.'", "'.$zip.'", "'.$state.'", "'.$country.'")';
$result = $conn->query($sql);
if ($result === TRUE) {
    session_start();
    $sql2 = 'INSERT INTO Stored_Card (CCNumber, CID) VALUES ("'.$ccno.'", "'.$_SESSION['CID'].'")';
    $result2 = $conn->query($sql2);

    header('Location: add_shippingaddr.php?success=1');

}else {
  $conn->close();
  header('Location: add_shippingaddr.php?fail=1');
  }
?>
