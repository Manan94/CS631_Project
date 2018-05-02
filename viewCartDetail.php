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
		<form  action="menu.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Main Menu"/><br><br>
		</form>
		
		<form  action="transactionHistory.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Transaction History"/><br><br>
		</form>
		
	</div>
	<h3>Transaction Detail</h3>
	
	<div>
		<h3><u>Product Details</u></h3>
		<table style="width:100%">
		  <tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price Sold</th>
			<th>Quantity</th>
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
			$totalPrice = 0;
			$sql = "select P.PID, P.PName, A.PriceSold, A.Quantity, P.PQuantity, P.Description, C.CartID from product P, cart C, appears_in A where P.PID = A.PID AND C.CartID = '".$_POST["CartID"]."'and A.CartID = '".$_POST["CartID"]."' and C.CID = '".$_SESSION["CID"]."';";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$totalPrice += ($row["PriceSold"] * $row['Quantity']);
					echo "<tr><td>".$row["PName"]."</td><td>".$row["Description"]."</td><td>$".$row["PriceSold"]."</td><td>".$row["Quantity"]."</td></tr>";
				}
				echo "</table>";
			} else {
				echo "No Result Found";
			}
			$conn->close();
		?>
	<br><br></div>
	<div>

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

		$sql = "SELECT * FROM shipping_address S, cart C WHERE C.CID = S.CID and C.SAName = S.SAName and C.CartID ='".$_POST["CartID"]."' and C.CID = '".$_SESSION["CID"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<div><h3><u>Shipping Address for this Transaction</u></h3>
			<table style='width:100%'>
			  <tr>
				<th>Shipping Address Name</th>
				<th>Recipient Name</th> 
				<th>Address</th>	
			  </tr>";
			while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["SAName"]."</td><td>".$row["RecepientName"]."</td><td>".$row["SNumber"]." ".$row["Street"].", ".$row["City"].", ".$row["State"].", ".$row["Country"].", ".$row["Zip"]."</td></tr>";
				}
			echo "</table></div>";
		} else {
			echo "No Result Found";
		}
		$conn->close();
	?>
	<br>
	<div>
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

		$sql = "SELECT * FROM credit_card cc, cart C WHERE C.CCNumber = cc.CCNumber and C.CartID ='".$_POST["CartID"]."' and C.CID = '".$_SESSION["CID"]."'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<div><h3><u>Your Credit Card Information for this Transaction</u></h3>
			<table style='width:100%'>
			  <tr>
				<th>Credit Card Number</th>
				<th>Security Code</th> 
				<th>Owner Name</th>
				<th>Card Type</th>
				<th>Card Address</th>
				<th>Expiry Date</th>				
			  </tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["CCNumber"]."</td><td>".$row["SecNumber"]."</td><td>".$row["OwnerName"]."</td><td>".$row["CCType"]."</td><td>".$row["CCAddress"]."</td><td>".$row["ExpDate"]."</td></tr>";
			}
			echo "</table></div>";
		} else {
			echo "No Result Found";
		}
		echo "<div style='text-align: center; padding-top:15px;'>";
				echo "<h1 style='color:red;'> Total Payment: $".$totalPrice."</h1>";
				echo "</div>";
		$conn->close();
	?>	
	
	
	<script type="text/javascript">
		$(document).ready(function() {

			
		});
		
		function showMsg() {
			alert("Cart Checkout Successfully!");
		}
	</script>
</body>
</html>