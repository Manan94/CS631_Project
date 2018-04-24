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
		<form  action="shopping.php" method="post">
			<input class="menuBtn" type="submit" value="Back to Shopping Menu"/><br><br>
		</form>
	</div>
	
	<h3><u>Desktop Computers</u></h3>
	<table style="width:100%">
	  <tr>
		<th>Name</th>
		<th>Price</th> 
		<th>Description</th>
		<th>CPU Type</th>
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

		$sql = "SELECT P.PID, PName, PPrice, Description, CPUType from Product P,Computer C where PType='D' and P.PID = C.PID and PQuantity > 0";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["PName"]."</td><td>$".$row["PPrice"]."</td><td>".$row["Description"]."</td><td>".$row["CPUType"]."</td><td><input type='submit' value='Add to Cart'/></td></tr>";
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