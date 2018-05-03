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
      <a href="logout.php">Sign Out</a>
    </div>
  </div>

	<h2>Welcome <?php echo $_SESSION["CName"];  ?></h2>
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

		$sql = "SELECT P.PID, PName, PPrice, Description, PrinterType, Resolution from Product P,Printer Pr where PType='P' and P.PID = Pr.PID and PQuantity > 0";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["PName"]."</td><td>$".$row["PPrice"]."</td><td>".$row["Description"]."</td><td>".$row["PrinterType"]."</td><td>".$row["Resolution"]."</td><td><input type='submit' value='Add to Cart'/></td></tr>";
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
