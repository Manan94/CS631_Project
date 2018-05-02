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
	<h3>Status 
	<?php if($_SESSION["Status"]=="P")
			echo "Platinum";
		  else if ($_SESSION["Status"]=="G")
			echo "Gold";
		  else if ($_SESSION["Status"]=="S")
			echo "Silver";
		  else if ($_SESSION["Status"]=="R")
			echo "Regular";
	?>
	</h3>
	<div style="text-align: center;">
		<form  action="shopping.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Shopping Menu"/><br><br>
		</form>
	</div>
	
	<h3><u>Printers</u></h3>
	<table style="width:100%">
	  <tr>
		<th>Name</th>
		<th>Price</th> 
		<th>Offer Price</th>
		<th>Description</th>
		<th>Printer Type</th>
		<th>Resolution</th>
		<th>Buy</th>
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

		$sql = "SELECT P.PID, PName, PPrice, OfferPrice, Description, PrinterType, Resolution from (Product P,Printer Pr) LEFT JOIN offer_product O ON P.PID = O.PID where PType='P' and P.PID = Pr.PID and PQuantity > 0";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row['OfferPrice'] == null) {
					echo "<tr><td>".$row["PName"]."</td><td>$".$row["PPrice"]."</td><td>N/A</td><td>".$row["Description"]."</td><td>".$row["PrinterType"]."</td><td>".$row["Resolution"]."</td><td><form action='addToCart.php' method='post'> <input type='hidden' name='PID' value='".$row["PID"]."'/><input type='submit' value='Add to Cart' onclick='showMsg(".'"'.$row["PName"].'"'.");'/></form></td></tr>";
				}else {
					echo "<tr><td>".$row["PName"]."</td><td>$".$row["PPrice"]."</td><td>$".$row["OfferPrice"]."</td><td>".$row["Description"]."</td><td>".$row["PrinterType"]."</td><td>".$row["Resolution"]."</td><td><form action='addToCart.php' method='post'> <input type='hidden' name='PID' value='".$row["PID"]."'/><input type='submit' value='Add to Cart' onclick='showMsg(".'"'.$row["PName"].'"'.");'/></form></td></tr>";
				}
			}
			echo "</table>";
		} else {
			echo "No Result Found";
		}
		echo "<br><p>*Offer Price is only applicable to Gold and Platinum customers</p>";
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