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
session_start();
$ccno = $_POST["ccno"];
$sql = 'DELETE FROM Stored_Card where CCNumber = "'.$ccno.'"';
$result = $conn->query($sql);

if ($result === TRUE) {
    //$sql2 = 'INSERT INTO Stored_Card (CCNumber, CID) VALUES ("'.$ccno.'", "'.$_SESSION['CID'].'")';
    //$result2 = $conn->query($sql2);

    header('Location: add_credit_card.php?success=2');

}else {
  $conn->close();
  header('Location: add_credit_card.php?fail=1');
  }
?>
