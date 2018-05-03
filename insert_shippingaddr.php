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
  <h3 align="center"> Add a new Shipping Address</h3>
	<div style="text-align:center">
		<form action="add_sa_db.php" method="post">
      Street Add. Name: <input type="text" name="saname"><br>
      Name of Recepient:<input type="text" name="name"><br>
      Street:           <input type="text" name="stname" ><br>
      StreetNumber:     <input type="number" name="stno"><br>
			City:             <input type="text" name="city"><br>
      Zip:              <input type="number" name="zip" size ="5"><br>
      State:            <input type="text" name="state"><br>
      Country:          <input type="text" name="country"><br><br>
			<input class="menuBtn" type="submit" value="Add to your account"><br><br><br>
		</form>
	</div>
</body>
</html>
