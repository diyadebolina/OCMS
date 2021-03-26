<!--START SESSION-->
<?php
include("../connection.php");
session_start();
if(isset($_SESSION['islogin']))
{
$aEmail=$_SESSION['aEmail'];
}
else
{
echo'<script>location.href="adminlogin.php"</script>';
}
?>
<!--END SESSION-->


<!--START COUNTING TOTAL NO OF STUDENTS-->
<?php
$sql="SELECT *FROM requesterlogin_tb";
$result=mysqli_query($conn,$sql);
$count1=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF STUDENTS-->

<!--START COUNTING TOTAL NO OF ORDERS RECIEVED-->
<?php
$sql="SELECT *FROM orderapproval_tb";
$result=mysqli_query($conn,$sql);
//$count2=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF ORDERS RECIEVED-->

<!--START COUNTING TOTAL NO OF MENUS-->
<?php
$sql="SELECT *FROM menu_tb";
$result=mysqli_query($conn,$sql);
$count3=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF MENUS-->


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
<title>Dashboard</title>
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
<li class="nav-item" style="margin-right:5px;"><a href="dashboard.php" class="nav-link text-white">Dashboard</a></li>   
<li class="nav-item" style="margin-right:5px;"><a href="menus.php" class="nav-link text-white">Menus</a></li>   
<li class="nav-item" style="margin-right:5px;"><a href="#" class="nav-link text-white">Transactions</a></li>      
<li class="nav-item" style="margin-right:5px;"><a href="#" class="nav-link text-white">Orders</a></li>   <li class="nav-item" style="margin-right:5px;"><a href="reviews.php" class="nav-link text-white">Reviews</a></li> 
<li class="nav-item" style="margin-right:5px;"><a href="../logout.php" class="nav-link text-white"><i class="fa fa-sign-out" style="margin-right:4px;"></i>Log Out</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->

<div class="container-fluid text-center">
<!--START MAKING DYNAMIC COUNTS-->
<div class="container m-5" style="font-family: 'Ubuntu', cursive;">
<div class="row">
<div class="col-md-4">
<div class="card p-2 text-center shadow p-3 mb-5 bg-white rounded">
    <div class="card-title"><h4>No Of Students</h4></div>
    <div class="card-body"><h3><strong><?php echo $count1; ?></strong></h3></div>
    <div class="card-body"><a href="#" class="btn" style="text-decoration: none; color: white; background:#08133F;">View</a></div>
</div>
</div>
<div class="col-md-4">
<div class="card p-2 text-center shadow p-3 mb-5 bg-white rounded">
    <div class="card-title"><h4>No Of Orders Recieved</h4></div>
    <div class="card-body"><h3><strong>0</strong></h3></div>
    <div class="card-body"><a href="#" class="btn" style="text-decoration: none; color: white; background:#08133F;">View</a></div>
</div>
</div>
<div class="col-md-4">
<div class="card p-2 text-center shadow p-3 mb-5 bg-white rounded">
    <div class="card-title"><h4>No Of Food Items</h4></div>
    <div class="card-body"><h3><strong><?php echo $count3; ?></strong></h3></div>
    <div class="card-body"><a href="#" class="btn" style="text-decoration: none; color: white; background:#08133F;">View</a></div>
</div>
</div>
</div>
</div>
<!--END MAKING DYNAMIC COUNTS-->



<!--START FETCHING STUDENT DATA-->
<div class="container-fluid mt-5">
<h2 class="text-center" style="font-family: 'Acme', sans-serif; color: #08133F;">STUDENTS  ACCOUNT</h2>
<div class="container p-5">
<?php
$sql="SELECT *FROM requesterlogin_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<table class="table table-striped table-responsive text-center">';
echo'<tr>';
echo'<thead class="thead-dark">';
echo'<th>ID</th>';
echo'<th>Name</th>';
echo'<th>Registration No</th>';
echo'<th>Email</th>';
echo'<th>Food Type</th>';
echo'<th>Action</th>';
echo'</thead>';
echo'</tr>';
echo'<tbody>';
while($row=mysqli_fetch_assoc($result))
{
echo'<tr>';
echo'<td>'.$row['rID'].'</td>';
echo'<td>'.$row['rName'].'</td>';
echo'<td>'.$row['rRegNo'].'</td>';
echo'<td>'.$row['rEmail'].'</td>';
echo'<td>'.$row['rFood'].'</td>';
echo'<td><form action="studentprofile.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="rID" value='.$row['rID'].'>
<button type="submit" class="btn btn-primary" name="rView"><i class="fa fa-eye"></i></button></form></td>';
echo'</tr>';
}
echo'</tbody>';
echo'</table>';
}
?>
</div>
</div>
<!--END FETCHING STUDENT DATA-->



</div>



<!--START ATTACHING FOOTER-->
<?php
include("../footer.php");
?>
<!--START ATTACHING FOOTER-->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>
</html>