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
}
</style>



</head>
<body>
	<h1>Newark-IT - Online Computer Store</h1>
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