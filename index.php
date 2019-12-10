<?php
    session_start();
 if (isset($_SESSION['user'])) {
$id = $_SESSION['userId'];
include('include/conn.php');
$cnt="SELECT count(*) AS badge FROM cart WHERE customer_id = $id AND status = 0";
$resultCnt=$db->query($cnt) or die($db->error);
$rowCnt = $resultCnt->fetch_assoc();
$cnt="SELECT count(*) AS badge2 FROM cart c , products p WHERE p.owner = $id AND status = 1";
$resultCnt=$db->query($cnt) or die($db->error);
$rowCnt2 = $resultCnt->fetch_assoc();
}
?>
<html>
<head>
<title>Online Vegetable Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <!-- Material Design Lite -->
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.min.js"></script>
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .col-md-3{
    background: red;
  }
  .card{
    margin : 25px;
  }
  body{
    background: rgba(211,211,211,0.9);
  }

.card {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.card:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
#products{
  min-height: 100vh;
}
.icon-bar {
  width: 90px;
  /*background-color: #555;*/
  position: absolute;
  right: 35;
  top: 15;
}

.icon-bar a {
  color: black;
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  color: black;
  background-color: rgba(211,211,211,0.5);
}
</style>
<body>
  <header>
    <div class="row">
	 <ul class="main-nav">
     
     <li><a href="index.php">HOME</a></li>
     <li><a href="">ABOUT US</a></li>
    <?php if (isset($_SESSION['user'])) { ?>
     <li><a href="addveg.php">ADD PRODUCTS</a></li>
     <li><a href="#products">VIEW PRODUCTS</a></li>
     <li class=" mdl-badge" data-badge="<?= $rowCnt2['badge2'] ?>" data-toggle="modal" data-target="#myReqModal"><a href="#">VIEW REQUEST</a></li>
     <li><a href="include/logout.php">
      <?= $_SESSION['user']?>
    (LOGOUT)</a></li>

<div class="icon-bar" id="icon-bar"  data-toggle="modal" data-target="#myModal">
  <a class="active" href="#">
     <i style="color: #000000; zoom : 1.2; z-index: 5;" class="material-icons mdl-badge" data-badge="<?= $rowCnt['badge'] ?>">shopping_cart</i>
  </a> 
</div>
    <?php     } ?>
	  </ul>
	</div>
	<center>
	   <div class="hero">
	   <h1 style="font-size:80px;color:white;
	   position: absolute;
	   top: 20%;left: 10%;">WELCOME TO THE ONLINE VEGETABLE MARKET  </h1>
	   
    <?php if (isset($_SESSION['user'])) { ?>
      <h3 style="color:white;
     position: absolute;
     top: 55%;left: 40%;"> Scroll down to view products</h3>

    <?php }?>
     </div>
    <?php if (!isset($_SESSION['user'])) { ?>


	   <form style="position:absolute;top: 50%;left:40%;"action='include/log.php' method="post" class="form-container">
  <h1 style="font-size:40px;color:#E5E5E5;">
  Login</h1>
  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>
  <div style="background: rgba(255,255,255,0.4); margin-top: 5px;">
  <strong style="color: red;">
    <?php if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    } ?>
  </strong>
  </div>
  
  <br>
  <input style="font-size:15px;"type="submit" id="submit" name="submit" value="Submit" class="btn btn-success btn-block">
    
  <br>
  <p  style="font-size:15px;color:red;">If not Registered <a href="register.php">Click Here</a></p>
</div>
     </center>
</form>

    <?php }?>
</header>

    <?php if (isset($_SESSION['user'])) { ?>
<?php
$sql="SELECT * FROM products WHERE owner <> $id AND quant <> 0";
$result=$db->query($sql) or die($db->error);
?>
<div class="container" id="products">
    <h1 class="text-center">Products</h1>
  <div class="row products">
    <?php while($row = $result->fetch_assoc()) { ?>
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center"><?= $row['name']?></h5>
    <p class="card-text">
      <ul class="list-group">
        <li class="list-group-item">Available Quantity : <?= $row['quant']?> Kg </li>
        <li class="list-group-item">Price per Kg : <?= $row['price']?> Rs </li>
      </ul>
    </p>
    <form action="include/addcart.php" method="POST" class="form-group">
      <input type="hidden" name="id" value="<?= $row['id']?>">
      <input type="hidden" name="price" value="<?= $row['price']?>">
      <label>Add (in Kgs) : </label>
      <select name="quant" class="form-control">
        <?php for ($i=1; $i <= $row['quant']; $i++) { ?>
        <option value="<?= $i ?>"><?= $i ?></option>
      <?php } ?>
      </select>
      <br>
    <input type="submit" name="submit" class="btn btn-primary" value="Add to Cart">
    </form>

  </div>
</div>

<?php } ?>
<?php } ?>

  </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <?php

$sq="SELECT cart.id AS cid , products.id AS pid,products.name , cart.quantity , cart.price FROM cart , products WHERE customer_id = $id AND status = 0 AND cart.product_id = products.id";
$rslt=$db->query($sq) or die($db->error);
     ?>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" style="display: inline-block;" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Cart</h4>
        </div>
        <div class="modal-body">
            <table class="table">
              <tr>
                <th class="text-center">
                  Product
                </th>
                <th class="text-center">
                  Quantity
                </th>
                <th class="text-center">
                  Price
                </th>
                <th class="text-center">
                  Action
                </th>
              </tr>
          <?php while ($rowShow = $rslt->fetch_assoc()) { ?>
          <tr>
            <td class="text-center">
            <?= $rowShow['name'] ?>
              
            </td>
            <td class="text-center">
              
            <?= $rowShow['quantity'] ?> Kg
            </td>
            <td class="text-center">
              &#x20B9;  
            <?= $rowShow['price'] ?> /-
            </td>
            <td class="text-center" style="cursor: pointer;" title="Remove from cart!">
              <form action="include/removcart.php" method="POST">
                <input type="hidden" name="cart_id" value="<?= $rowShow['cid']?>">
                <input type="hidden" name="product_id" value="<?= $rowShow['pid']?>">
                <input type="hidden" name="quantity" value="<?= $rowShow['quantity']?>">
              
              <button type="submit" style="background: none; border: none;">
                <i class="material-icons">close</i>
              </button>
              </form>
            </td>
          </tr>
        <?php } ?>
            </table>
        </div>
        <div class="modal-footer">

              
          <a  href="include/proceed.php" ><button class="btn btn-success" type="button">Proceed</button></a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>




       <!-- Modal -->
  <div class="modal fade" id="myReqModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Request</h4>
        </div>
        <?php 

$cnt="SELECT p.name AS product , c.quantity ,c.price , u.name AS user ,u.mobile   FROM cart c , products p , users u WHERE p.owner = $id AND status = 1 AND c.product_id=p.id AND c.customer_id=u.id ORDER BY c.id DESC";
$resultCnt=$db->query($cnt) or die($db->error);

        ?>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td class="text-center">
                Product
              </td>
              <td class="text-center">
                Quantity
              </td>
              <td class="text-center">
                Price
              </td>
              <td class="text-center">
                Customer
              </td>
              <td class="text-center">
                Contact
              </td>
            </tr>
            <?php while ($rowCnt2 = $resultCnt->fetch_assoc()) { ?>
              <tr>
                <td class="text-center">
                  <?= $rowCnt2['product'] ?>
                </td>
                <td class="text-center">
                  <?= $rowCnt2['quantity'] ?>
                </td>
                <td class="text-center">
                  <?= $rowCnt2['price'] ?>
                </td>
                <td class="text-center">
                  <?= $rowCnt2['user'] ?>
                </td>
                <td class="text-center">
                  <?= $rowCnt2['mobile'] ?>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  





</body>

</html>
<script type="text/javascript">
  // var a = element.scrollTop;
  // alert(a);
  document.onscroll = function(){
var b = window.pageYOffset;
// alert(b);
  document.getElementById('icon-bar').style.top = b;
  };
</script>