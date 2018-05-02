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
</style>



</head>
<body>
	<h1>Newark-IT - Online Computer Store</h1>
	<h2>Welcome <?php echo $_SESSION["CName"];  ?></h2>
	<div style="text-align: center;">
		<form  action="menu.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Main Menu"/><br><br>
		</form>
	</div>
	
	<h3><u>My Cart</u></h3>
	<table style="width:100%">
	  <tr>
		<th>Name</th>
		<th>Description</th>
		<th>Price Sold</th>
		<th>Quantity</th>
		<th>Update Quantity</th>
		<th>Delete</th>

		
	  </tr>
	  
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dmsd";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "select P.PID, P.PName, A.PriceSold, A.Quantity, P.Description from product P, cart C, appears_in A where P.PID = A.PID AND C.CartID = A.CartID and C.TStatus is NULL and C.CID = '".$_SESSION["CID"]."';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["PName"]."</td><td>".$row["Description"]."</td><td>$".$row["PriceSold"]."</td><td>".$row["Quantity"]."</td><td><form action='addToCart.php' method='post'> <input type='hidden' name='PID' value='".$row["PID"]."'/><input type='submit' value=' + '/>&nbsp<input type='submit' value=' - '/></form></td></td><td><form action='addToCart.php' method='post'> <input type='hidden' name='PID' value='".$row["PID"]."'/><input type='submit' value=' x '/></form></td></tr>";
			}
			echo "</table>";
		} else {
			echo "No Result Found";
		}
		$conn->close();
	?>
	</table>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			
		});
	</script>
</body>
</html>