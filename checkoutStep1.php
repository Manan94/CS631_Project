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

p {
	color : red;
}
</style>



</head>
<body>
	<h1>Newark-IT - Online Computer Store</h1>
	<h2>Welcome <?php echo $_SESSION["CName"];  ?></h2>
	
	<div style="text-align: center;">
		<form  action="myCart.php" method="post">
			<input class="menuBtn" type="submit" value="Back to My Cart"/><br><br>
		</form>
	</div>
	<h3>Checkout Step-1</h3>
	<h3><u>Select Shipping Address</u></h3>
	<table style="width:100%">
	  <tr>
		<th>Shipping Address Name</th>
		<th>Recipient Name</th> 
		<th>Address</th> 
		<th>Select</th>
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

		$sql = "SELECT * FROM `shipping_address` WHERE CID = '".$_SESSION["CID"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["SAName"]."</td><td>".$row["RecepientName"]."</td><td>".$row["SNumber"]." ".$row["Street"].", ".$row["City"].", ".$row["State"].", ".$row["Country"].", ".$row["Zip"]."</td><td><form action='addShippingAddressInCart.php' method='post'> <input type='hidden' name='SAName' value='".$row["SAName"]."'/><input type='submit' value='Select'/></form></td></tr>";
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
		
		function showMsg(pname) {
			alert(pname + " added Successfully in the cart");
		}
	</script>
</body>
</html>