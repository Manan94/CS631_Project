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
    <a href="add_credit_card.php">Credit Card</a>
    <a href="#">Shipping Address</a>
    <a href="logout.php">Sign Out</a>
  </div>
</div>
<h2>Welcome <?php echo $_SESSION["CName"];  ?></h2>
<div style="text-align: center;">
  <form  action="shopping.php" method="post">
    <input class="menuBtn" type="submit" value="Back to Shopping Menu"/><br><br>
  </form>
</div>

<h3><u>Credit Card Details</u></h3>
<table style="width:100%">
  <tr>
  <th>Street Add. Name</th>
  <th>Name of Recepient</th>
  <th>Street</th>
  <th>StreetNumber</th>
  <th>City</th>
  <th>Zip</th>
  <th>State</th>
  <th>Country</th>
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

  $sql = 'SELECT * from Shipping_Address where CID = "'.$_SESSION['CID'].'"';
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["SAName"]."</td><td>".$row["RecepientName"]."</td><td>".$row["Street"]."</td><td>".$row["SNumber"]."</td><td>".$row["City"]."</td><td>".$row["Zip"]."</td><td>".$row["State"]."</td><td>".$row["Country"];
      //"</td><td><form action='delete_credit_card.php' method='post'><input type='hidden' name='ccno' value='".$row["CCNumber"]."'/><input type='submit' value='Delete'/></form></td></tr>"
    }

    echo "</table>";
  } else {
    echo "No Result Found";
  }
  $conn->close();
?><br><br>
<div align = "center">
  <form action="insert_shippingaddr.php" method="post">
    <input type="submit" value="Add a new Shipping Address"/>
  </form>
</div>
</table>
<div align="center" id = "info-message">
<?php  if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
 // treat the succes case ex:
 echo "Card Added Successfull!";

}?>
<script>
setTimeout(function(){
  document.getElementById('info-message').style.display = 'none';
}, 3000);
</script>
</div>

<div align="center" id = "info-message">
<?php  if ( isset($_GET['fail']) && $_GET['fail'] == 1 )
{
 // treat the succes case ex:
 echo "Card couldn't be added!";

}?>
<script>
setTimeout(function(){
  document.getElementById('info-message').style.display = 'none';
}, 3000);
</script>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  });
</script>
</body>
</html>
