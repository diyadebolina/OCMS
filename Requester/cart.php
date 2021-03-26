<!--START SESSION-->
<?php
include("../connection.php");
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo'<script>location.href="requesterlogin.php"</script>';
}
?>
<!--END SESSION-->



<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!--START LINKING CSS-->
<link href="index.css" rel="stylesheet">
<!--END LINKING CSS-->
<!--START FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--END FONT AWESOME-->
<!--START GOOGLE FONT-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
<!--END GOOGLE FONT-->
<title>My Cart</title>
</head>
<body style="background:#DFEBF5;">



<!--START MAKING NAVBAR-->
<div class="navbar navbar-expand-lg navbar-dark" style="background: #08133F; color: white;">
<a href="index.php"><img src="../Images/logo.png" class="img-fluid mx-2" height="70" width="70"></a>
<a href="index.php" class="navbar-brand mx-2 py-4" style="font-family: 'Acme', sans-serif;"><span class="my-3">NIT Durgapur</span></a>
<button class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myMenu">
<ul class="navbar-nav text-center" style="margin-left:auto;">
<li class="nav-item" style="margin-right:5px;"><a href="allmenus.php" class="nav-link text-white"><i class="fa fa-bars" style="margin-right:4px;"></i>Menus</a></li>   
<li class="nav-item" style="margin-right:5px;"><a href="profile.php" class="nav-link text-white"><i class="fa fa-user" style="margin-right:4px;"></i>Profile</a></li>   
<li class="nav-item" style="margin-right:5px;"><a href="feedback.php" class="nav-link text-white"><i class="fa fa-comment" style="margin-right:4px;"></i>Feedback</a></li>   
<?php
$count=0;
if(isset($_SESSION['cart']))
{
$count=count($_SESSION['cart']);
}
?>
<li class="nav-item" style="margin-right:5px;"><a href="cart.php" class="nav-link text-white"><i class="fa fa-shopping-cart" style="margin-right:4px;"></i>My Cart (<?php echo $count; ?>)</a></li>      
<li class="nav-item" style="margin-right:5px;"><a href="../logout.php" class="nav-link text-white"><i class="fa fa-sign-out" style="margin-right:4px;"></i>Log Out</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->

<!--START MAKING MY CART CONTAINER-->
<div class="container-fluid mt-5">
<div class="container">
<h2 class="text-center" style="font-family: 'Acme', sans-serif; color: #08133F;">MY CART</h2>
<div class="row mt-5">

<div class="col-lg-9">
<table class="table table-striped text-center">

<thead class="thead-dark">
<tr>
<th>Sr No.</th>
<th>Item Name</th>
<th>Item Price</th>
<th>Item Quantity</th>
<th>Action</th>
</tr>
</thead>  
<tbody>
<?php
$total=0;
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $key => $value)
{
$sr=$key+1;
$total=$total+$value['fPrice'];
echo'<tr>';
echo'<td>'.$sr.'</td>';
echo'<td>'.$value['fName'].'</td>';
echo'<td>'.$value['fPrice'].'</td>';
echo'<td><input class="text-center" type="number" value="'.$value['fQuantity'].'" min="1" max="20"></td>';
echo'<td><form action="managecart.php" method="POST"><input type="hidden" name="fName" value="'.$value['fName'].'"><button class="btn btn-sm btn-outline-danger" name="RemoveItem">Remove</button></form></td>';
echo'</tr>';
}
}
?>
</tbody>  
</table>
</div>

<div class="col-lg-3">
<div class="card p-5 shadow p-3 mb-5 bg-white rounded">
<h4 style="font-family: 'Acme', sans-serif; color: #08133F;">Total: <br></h4>
<h5>Rs. <?php echo $total;?></h5><br>
<form>
Cash On Delivery  <input type="radio" class="form-check-input"><br><br>
<button class="btn btn-block" style="background-color: #08133F; color: white;">Make a Purchase</button></form>
</div>
</div>

</div>
</div>
</div>
<!--END MAKING MY CART CONTAINER-->


</body>
</html>