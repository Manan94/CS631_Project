s<?php
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

input {
	color : blue;
}
</style>



</head>
<body>
	<h1>Newark-IT - Online Computer Store</h1>
	<h2>Welcome <?php echo $_SESSION["user"];  ?></h2>
	<div style="text-align: center;">
		<form  action="menu.php" method="post">
			<input type="submit" value="Back to Main Menu"/><br><br>
		</form>
	</div>
	
	
	<table style="width:100%">
	  <tr>
		<th>Firstname</th>
		<th>Lastname</th> 
		<th>Age</th>
		<th>Buy</th>
	  </tr>
	  <tr>
		<td>Jill</td>
		<td>Smith</td> 
		<td>50</td>
		<td><input type="Button" value="buy" onclick="Buy('<?php echo $username ?>')"/></td>
	  </tr>
	  <tr>
		<td>Eve</td>
		<td>Jackson</td> 
		<td>94</td>
		<td><input type="Button" value="buy" onclick="Buy(2)"/></td>
	  </tr>
	</table>
	
	
	<script type="text/javascript">
		$(document).ready(function() {
			
		});
	function Buy(x) {
		alert(x);
	}
	
	</script>
</body>
</html>