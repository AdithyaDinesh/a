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
</head>
<body class="bg">
<div class="container-fluid bg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
<form action="include/register.php" method="post" class="form-container">
  <h1>Registration Form</h1>
  <div class="form-group">
    <label for="name"></label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
  </div>
  <div class="form-group">
    <label for="mob_no"></label>
    <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
  </div>
  <div class="form-group">
    <label for="mob_no"></label>
    <input type="number" class="form-control" id="mob_no" name="mob_no" placeholder="Mobile Number" required>
  </div>
  <div class="form-group">
    <label for="user_type"></label>
  </div>
  <div class="form-group">
    <select class="form-control" id='user_type' name='user_type' placeholder="Gender">
  
      <option value="MALE">MALE</option>
      <option value="FEMALE">FEMALE</option>
     
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"></label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  
  <div style="background: rgba(255,255,255,0.4); text-align: center; margin-top: 5px;">
  <strong style="color: red;">
    <?php if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    } ?>
  </strong>
  </div>
  <br>
  <!--<div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>-->
  <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success btn-block">
  <br>
  <p>Click here to <a href="index.php">Login</a></p>
</form>

            <!--form ends-->
		</div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>