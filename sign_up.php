<html>
<head>
    <title>Online Computer Store</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<style type="text/css">

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
	.menuBtn {
		width:250px;
		height:30px;
		font-weight:bold;
		font-size:15px;
	}
</style>
</head>
<body>
	<h1>Newark-IT - Online Computer Store</h1>

	<div style="text-align:center">
		<form action="register.php" method="post">
      First Name: <input type="text" name="fname"><br>
      Last Name:  <input type="text" name="lname"><br>
      Address:    <input type="text" name="address"><br>
      Phone No.:  <input type="number" name="ph_no" maxlength="10" size="10"><br>
			E-mail:     <input type="text" name="email"><br><br>
			<input class="menuBtn" type="submit" value="Sign Up"><br><br><br>

      <a href="index.php"> Sign-in </a>
		</form>
	</div>
</body>
</html>
