<?php
session_start();
?>
<html>
<head>
    <title>Online Computer Store</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<style type="text/css">
table, th, td {
    border: 1px solid blue;
	color: blue;
	text-align:center;
}
body {
    background-color: lightblue;
}
h1, h2 {
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
}.dropbtn {
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
    <a href="#">Shipping Address</a>
    <a href="logout.php">Sign Out</a>
  </div>
</div>
	<h2>Welcome <?php echo $_SESSION["CName"];  ?></h2>
	<div style="text-align: center;">
		<form  action="menu.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Main Menu"/><br><br>
		</form>
		<form  action="shopDesktop.php" method="post">
			<input class="menuBtn" type="submit" value="Desktop Computers"/><br><br>
		</form>
		<form  action="shopLaptop.php" method="post">
			<input class="menuBtn" type="submit" value="Laptop Computers"/><br><br>
		</form>
		<form  action="shopPrinter.php" method="post">
			<input class="menuBtn" type="submit" value="Printers"/><br><br>
		</form>
		<form  action="shopAccessories.php" method="post">
			<input class="menuBtn" type="submit" value="Accessories"/><br><br>
		</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>
</body>
</html>
