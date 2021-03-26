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


<!--START DELETING FEEDBACK-->
<?php
if(isset($_POST['rDelete']))
{
$rId=$_POST['rId'];
$sql="DELETE FROM feedback_tb WHERE rId='".$rId."'";
if(mysqli_query($conn,$sql))
{
echo'<script>window.alert("Feedback Deleted Successfully!")</script>';
echo'<script>location.href="reviews.php"</script>';
}
else
{
echo'<script>window.alert("Unable to Delete Data!")</script>';
}
}
?>
<!--END DELETING FEEDBACK-->




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
<title>Student Profiles</title>
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
<li class="nav-item" style="margin-right:5px;"><a href="#" class="nav-link text-white">Orders</a></li>   <li class="nav-item" style="margin-right:5px;"><a href="reviews.php" class="nav-link text-white">Students</a></li> 
<li class="nav-item" style="margin-right:5px;"><a href="../logout.php" class="nav-link text-white"><i class="fa fa-sign-out" style="margin-right:4px;"></i>Log Out</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->


<!--START MAKING FEEDBACK SECTION-->
<div class="container-fluid p-5">
<div class="container">
<h1 class="text-center" style="font-family: 'Acme', sans-serif; color: #08133F;">FEEDBACK FROM STUDENTS</h1>
<div class="row p-4">
<?php
$sql="SELECT *FROM feedback_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<table class="table table-striped text-center">';
echo'<tr>';
echo'<thead style="background:#08133F; color: white;">';
echo'<th style="padding: 20px;">ID</th>';
echo'<th style="padding: 20px;">Name</th>';
echo'<th style="padding: 20px;">Email</th>';
echo'<th style="padding: 20px;">Year</th>';
echo'<th style="padding: 20px;">Rating</th>';
echo'<th style="padding: 20px;">Feedback</th>';
echo'<th style="padding: 20px;">Action</th>';
echo'</thead>';
echo'</tr>';
echo'<tbody>';
while($row=mysqli_fetch_assoc($result))
{
echo'<tr>';
echo'<td style="padding: 10px;">'.$row['rId'].'</td>';
echo'<td style="padding: 10px;">'.$row['rName'].'</td>';
echo'<td style="padding: 10px;">'.$row['rEmail'].'</td>';
echo'<td style="padding: 10px;">'.$row['rYear'].'</td>';
echo'<td>';
if($row['rStar']=="5")
{
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
}
if($row['rStar']=="4")
{
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star-o"></i>';
}
if($row['rStar']=="3")
{
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
}
if($row['rStar']=="2")
{
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
}
if($row['rStar']=="1")
{
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
echo'<i class="fa fa-star-o"></i>';
}
echo'</td>';
echo'<td>'.$row['rFeedback'].'</td>';
echo'<td style="padding: 10px;"><form action="" method="POST"><input type="hidden" name="rId" value='.$row['rId'].'>
<button type="submit" class="btn btn-danger" name="rDelete"><i class="fa fa-trash"></i></button></form></td>';
echo'</tr>';
}
echo'<tbody>';
echo'</table>';
}
?>
</div>
</div>
</div>
<!--END MAKING FEEDBACK SECTION-->



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