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
$ccno = $_POST['cardno'];
$name = $_POST['name'];
$secno = $_POST['secno'];
$date = $_POST['date'];
$cctype = $_POST['type'];
$addr = $_POST['addr'];

$sql = 'INSERT INTO Credit_Card (CCNumber, SecNumber, OwnerName, CCType, CCAddress, ExpDate) VALUES ("'.$ccno.'", "'.$secno.'", "'.$name.'", "'.$cctype.'", "'.$addr.'", "$date")';
$result = $conn->query($sql);
if ($result === TRUE) {
    session_start();
    $sql2 = 'INSERT INTO Stored_Card (CCNumber, CID) VALUES ("'.$ccno.'", "'.$_SESSION['CID'].'")';
    $result2 = $conn->query($sql2);

    header('Location: add_credit_card.php?success=1');

}else {
  $conn->close();
  header('Location: insert_card.php');
  }
?>
