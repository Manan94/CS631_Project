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
};
?>
<html>
<head>
    <title>Online Computer Store</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<style type="text/css">

body {
    background-color: lightblue;
}
h1, h2, h3 {
	text-align: center;
	color : blue;
}
.menuBtn {
	width:250px;
	height:30px;
	font-weight:bold;
	font-size:15px;
}
input {
	color : blue;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

</head>
<body>
<h1>Newark-IT - Online Computer Store</h1>

<div align="right" class="dropdown">
  <button class="dropbtn"><?php echo $_SESSION["CName"]; ?></button>
  <div align="right" class="dropdown-content">
    <a href="edit_profile.php">Edit Profile</a>
    <a href="add_credit_card.php">Credit Card</a>
    <a href="add_shippingaddr.php">Shipping Address</a>
    <a href="logout.php">Sign Out</a>
  </div>
</div>

<h3 align ="center"> Edit Your Profile </h3>

<div style="text-align:center">
  <form action="update.php" method="post">
    <?php $sql = 'SELECT * FROM Customer where CID = "'.$_SESSION['CID'].'"';
    $result = $conn->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }
    else {
    	if ($result->num_rows == 1) {
    		$row = $result->fetch_assoc();
        $fname = $row["FName"];
        $lname = $row["LName"];
        $addr = $row["Address"];
        $ph_no = $row["Phone"];
        $email = $row["Email"];
        $conn->close();
      }}?>
    First Name: <input type="text" name="fname" value = <?php echo "$fname";?> disabled><br>
    Last Name:  <input type="text" name="lname"value = <?php echo "$lname";?> disabled><br>
    Address:    <input type="text" name="address" value = <?php echo "$addr";?>><br>
    Phone No.:  <input type="number" name="ph_no" maxlength="10" size="10" value = <?php echo "$ph_no";?>><br>
    E-mail:     <input type="text" name="email" value = <?php echo "$email";?>><br><br>
    <input class="menuBtn" type="submit" value="Update"><br><br><br>

    <div id = "info-message">
    <?php  if ( isset($_GET['success']) && $_GET['success'] == 1 )
    {
     // treat the succes case ex:
     echo "Updated Successfull!";

    }?>
    <script>
    setTimeout(function(){
      document.getElementById('info-message').style.display = 'none';
    }, 3000);
    </script>
  </div>
</body>
</html>
