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
	
	<h3><u>Transaction History</u></h3>
	<table style="width:100%">
	  <tr>
		<th>Card ID</th>
		<th>Shipping Address Name</th>
		<th>Credit Card</th>
		<th>Transaction Status</th>
		<th>Date</th>
		<th>View Details</th>

		
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

		$sql = "select * from cart C where C.TStatus is NOT NULL and C.CID = '".$_SESSION["CID"]."';";
		$result = $conn->query($sql);

		$tStatus = "ss";
		if ($result->num_rows > 0) {
			$totalPrice = 0;
			while($row = $result->fetch_assoc()) {					
				if($row["TStatus"] == 'C')
					$tStatus = "Checkout";
				else if($row["TStatus"] == 'D')
					$tStatus = "Delivered";
				else if($row["TStatus"] == 'N')
					$tStatus = "Not Delivered";
				echo "<tr><td>".$row["CartID"]."</td><td>".$row["SAName"]."</td><td>$".$row["CCNumber"]."</td><td>".$tStatus."</td><td>".$row["TDate"]."</td><td><form action='viewCartDetail.php' method='post'> <input type='hidden' name='CartID' value='".$row["CartID"]."'/><input type='submit' value='Show Details'/></form></td></tr>";
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