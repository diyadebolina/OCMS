<!--START DATABASE CONNECTION-->
<?php
include("connection.php");
?>
<!--END DATABASE CONNECTION-->

<!--START BOOK NOW BUTTON FUNCTION-->
<?php
if(isset($_POST['BookNow']))
{
session_start();
if(!isset($_SESSION['islogin']))
{
echo'<script>window.alert("Please Login First!!")</script>';
echo'<script>location.href="Requester/requesterlogin.php"</script>';
}
else
{
echo'<script>window.alert("Item Added to Cart!!")</script>';
}
}
?>
<!--END BOOK NOW BUTTON FUNCTION-->


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
<title>Menu</title>
<style>
</style>
</head>
<body style="background:#DFEBF5;">

<!--START MAKING NAVBAR-->
<div class="navbar navbar-expand-lg navbar-dark" style="background: #08133F; color: white;">
<a href="index.php"><img src="Images/logo.png" class="img-fluid mx-2" height="70" width="70"></a>
<a href="index.php" class="navbar-brand mx-2 py-4" style="font-family: 'Acme', sans-serif;"><span class="my-3">NIT Durgapur</span></a>
<button class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myMenu">
<ul class="navbar-nav text-center" style="margin-left:auto;">  
<li class="nav-item" style="margin-right:5px;"><a href="index.php" class="nav-link text-white">Home</a></li>   
<li class="nav-item" style="margin-right:5px;"><a href="#myAbout" class="nav-link text-white">About</a></li>      
<li class="nav-item" style="margin-right:5px;"><a href="#my" class="nav-link text-white">Menu</a></li>   <li class="nav-item" style="margin-right:5px;"><a href="Requester/requesterlogin.php" class="nav-link text-white">Login</a></li> 
<li class="nav-item" style="margin-right:5px;"><a href="#myRegister" class="nav-link text-white">Register</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->




<!--START ALL MENUS SECTION-->

<h1 class="text-center" style="margin-top: 30px; font-family: 'Acme', sans-serif; color: #08133F; ">MENU CHART</h1>

<?php
$sql="SELECT *FROM menu_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<div class="container my-5">';
echo'<div class="row">';
    
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="col-lg-4 col-md-6 mt-4">';
echo'<div class="card h-100 text-dark mb-3 shadow p-3 mb-5 bg-white rounded">';
    
//CARD BODY START
echo'<div class="card-body p-3 text-center">';
echo'<div><img src="FoodPics/'.$row['fImage'].'" height="150" width="150" style="border: 2px solid black;"></div>';
echo'<br><div><h6>'.$row['fName'].'</h6></div>';
echo'<div><h5><strong>Rs. '.$row['fPrice'].'</strong></h5></div>';
if($row['fAvail']=="Yes")
{echo'<div>Available</div>';}
else
{echo'<div>Not Available</div>';}
echo'<br><div>'.$row['fDesc'].'</div>';
echo'</div>';
//CARD BODY END 
echo'<hr class="line">';    
//CARD FOOTER START
echo'<div class="text-center">';
echo'<form action="" method="POST"><input type="submit" name="BookNow" value="Book Now" class="btn" style="background: #08133F; color: white;"></form>';
echo'</div>';
//CARD FOOTER END
    
echo'</div>';
echo'</div>';
}
    
echo'</div>';
echo'</div>';
}
?>
<!--END ALL MENUS SECTION-->



<!--START ATTACHING FOOTER-->
<?php
include("footer.php");
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