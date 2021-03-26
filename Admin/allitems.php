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



<!--START DELETING ITEM-->
<?php
if(isset($_POST['fDelete']))
{
$fID=$_POST['fID'];
$sql1="SELECT *FROM menu_tb WHERE fID='".$fID."'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$DelImage=$row['fImage'];
$sql="DELETE FROM menu_tb WHERE fID='".$fID."'";
if(mysqli_query($conn,$sql))
{
unlink("../FoodPics/".$DelImage);
echo'<script>window.alert("Data Deleted Successfully!")</script>';
echo'<script>location.href="allitems.php"</script>';
}
else
{
echo'<script>window.alert("Unable to Delete Data!")</script>';
}
}
?>
<!--END DELETING ITEM-->



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
<li class="nav-item" style="margin-right:5px;"><a href="#" class="nav-link text-white">Orders</a></li>   <li class="nav-item" style="margin-right:5px;"><a href="students.php" class="nav-link text-white">Students</a></li> <li class="nav-item" style="margin-right:5px;"><a href="../logout.php" class="nav-link text-white"><i class="fa fa-sign-out" style="margin-right:4px;"></i>Log Out</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->


<div class="container-fluid">


<?php
$sql="SELECT *FROM menu_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<div class="container p-5">';
echo'<div class="row">';
    
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="col-lg-4 col-sm-6 mt-5">';
echo'<div class="card h-100 text-dark mb-3 shadow p-3 mb-5 bg-white rounded">';
    
echo'<div class="card-title p-3"><strong>Food Registration No: '.$row['fRegNo'].'</strong></div>';
    
//Start Card Body    
echo'<div class="card-body text-center p-3">';    
echo'<div><img src="../FoodPics/'.$row['fImage'].'" height="160" width="160"></div>';
echo'<br><div><h5>'.$row['fName'].'</h5></div>';
echo'<div>'.$row['fDesc'].'</div>';
echo'<br><div><h5><strong>Rs. '.$row['fPrice'].'</strong></h5></div>';
if($row['fAvail']=="Yes")
{echo'<div>Available</div>';}
else
{echo'<div>Not Available</div>';}
echo'</div>';
//End Card Body   
    
echo'<div class="text-center" style="border-top: 1px solid grey;">';
echo'<div class="row">';
    
echo'<div class="col-sm-6">';
echo'<form action="menus.php" method="POST" enctype="multipart/form-data">';
echo'<input type="hidden" name="fID" value='.$row['fID'].'><input type="submit" value="Edit Item" name="fEdit" class="btn my-2" style="background: #08133F; color: white;">';
echo'</form>';
echo'</div>';
    
echo'<div class="col-sm-6">';
echo'<form action="" method="POST" enctype="multipart/form-data">';    
echo'<input type="hidden" name="fID" value='.$row['fID'].'><input type="submit" value="Delete Item" name="fDelete" class="btn my-2" style="background: #08133F; color: white;">';
echo'</form>';
echo'</div>';
    
echo'</div>';
echo'</div>';
    
echo'</div>';
echo'</div>';
}
    
echo'</div>';
echo'</div>';
}
?>

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