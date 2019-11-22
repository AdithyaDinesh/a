<?php
    session_start();
    if (! $_SESSION['user']) {
    header("location: index.php");  
    }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="register1.css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg">
    <div class="row">
   <ul class="main-nav">
     
     <li><a href="index.php">HOME</a></li>
     <li><a href="">ABOUT US</a></li>
    <?php if (isset($_SESSION['user'])) { ?>
     <li><a href="addveg.php">ADD PRODUCTS</a></li>
     <li><a href="include/logout.php">
      <?= $_SESSION['user']?>
    (LOGOUT)</a></li>
    <?php     } ?>
    </ul>
  </div>
<div class="container-fluid bg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
<form action="include/add.php" method="post" class="form-container">
  <h1>Add Vegetables</h1>
  <div class="form-group">
    <label for="name"></label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Vegetable Name" required>
  </div>
  <div class="form-group">
    <label for="mob_no"></label>
    <input type="number" class="form-control" id="qnt" name="qnt" placeholder="Qunatity/kg" required>
  </div>
  <div class="form-group">
    <label for="user_type"></label>
   <input type=exp" class="form-control" id="exp" name="exp" placeholder="Expected price" required>
	<div class="form-group">
	</br>
	 <div class="form-group">
    <label for="user_type"></label>
   <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success btn-block">
  <div style="background: rgba(255,255,255,0.4); margin-top: 5px;">
  <strong style="color: red;">
    <?php if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    } ?>
  </strong>
  </div>
  
  <br>
</form>

            <!--form ends-->
		</div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>