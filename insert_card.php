<?php session_start(); ?>
<html>
<head>
  <title>Online Computer Store</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<style type="text/css">

	body {
		background-color: lightblue;
	}
	h1, h2, h3{
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
      <a href="add_shippingaddr.php">Shipping Address</a>
      <a href="logout.php">Sign Out</a>
    </div>
  </div>
  <h3 align="center"> Add a new Card</h3>
	<div style="text-align:center">
		<form action="add_cc_db.php" method="post">
      Credit Card Number: <input type="number" name="cardno" maxlength="16"><br>
      Name on card:       <input type="text" name="name"><br>
      Security Number:    <input type="number" name="secno" maxlength="3"><br>
      Expiry Date:        <input type="date" name="date" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"><br>
			Credit Card Type:   <input type="text" name="type"><br>
      Address:            <input type="text" name="addr" size ="50"><br><br>
			<input class="menuBtn" type="submit" value="Add to your account"><br><br><br>
		</form>
	</div>
</body>
</html>
