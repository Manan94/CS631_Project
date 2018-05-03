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
$addr = $_POST['address'];
$ph_no = $_POST['ph_no'];
$email = $_POST['email'];
//$password = $_POST['password'];
$sql = 'UPDATE Customer SET Email = "'.$email.'", Address = "'.$addr.'", Phone = "'.$ph_no.'" WHERE CID = "'.$_SESSION['CID'].'"';
$result = $conn->query($sql);
if ($result === TRUE) {
    /*$row = $result->fetch_assoc();
    $_SESSION["CID"] = $row["CID"];
    $_SESSION["CName"] = $row["FName"]." ".$row["LName"];*/
    $conn->close();

    header('Location: edit_profile.php?success=1');

}
else {
  $conn->close();
  echo "Sorry Update couldn't take place";
}
?>
