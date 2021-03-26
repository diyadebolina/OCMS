<!--START DATABASE CONNECTION-->
<?php
include("../connection.php");
?>
<!--END DATABASE CONNECTION-->


<!--START LOGIN PROCESS-->
<?php
session_start();
if(!isset($_SESSION['islogin']))
{
if(isset($_REQUEST['rLogin']))
{
if(($_REQUEST['rEmail']=="")||($_REQUEST['rPassword']==""))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields!!</div>';
}
else
{
$rEmail=$_REQUEST['rEmail'];
$rPassword=$_REQUEST['rPassword'];
$sql="SELECT rEmail,rPassword FROM requesterlogin_tb WHERE rEmail='".$rEmail."' AND rPassword='".$rPassword."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['rEmail']=$rEmail;
$_SESSION['islogin']=true;
echo'<script>location.href="allmenus.php"</script>';
}
else
{
$rsgmsg='<div class="alert alert-danger mt-3">Email and Password are not valid!!</div>';
}
}
}
}
else
{
echo'<script>location.href="allmenus.php"</script>';
}
?>
<!--END LOGIN PROCESS-->



<!--START MAKING REQUESTER LOGIN FORM-->
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
<style>
.loginbox
{
background-image: url(../Images/background2.jpg);
background-attachment: fixed;
background-repeat: no-repeat;
background-position: center;
height: 720px;
overflow: hidden;
border-radius: 0px;
}
</style>
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
<title>Login</title>
</head>
<body>


<!--START DESIGNING FORM-->
<div class="container-fluid loginbox" style="border-radius: 0px;">
<div class="container mt-5">
<div class="row">
<div class="col-lg-3 col-sm-1"></div>
<div class="col-lg-6 col-sm-10">

<form action="" method="post" class="mt-5 p-5 shadow-lg p-3 mb-5 bg-white rounded" style="font-family: 'Ubuntu', sans-serif;">
<h3 class="text-center my-2" style="font-family: 'Acme', sans-serif; color: #08133F;">PLEASE LOGIN TO PLACE YOUR ORDER</h3>
<div class="form-group mt-5">
<i class="fa fa-user" style="color: black;"></i>
<label for="Email" style="font-weight:600; font-size:15px;">Email ID</label>
<input type="email" class="form-control" placeholder="Enter your Institute Email ID.." name="rEmail">
</div><br>
<div class="form-group mb-5">
<i class="fa fa-key" style="color: black;"></i>
<label for="Password" style="font-weight:600; font-size:15px;">Password</label>
<input type="password" class="form-control" placeholder="Enter your Password.." name="rPassword">
</div>
<div class="text-center"><input type="submit" value="Login" name="rLogin" class="btn" style="background-color:#0F2C51; color: white;"></div>
<?php if(isset($rsgmsg)) {echo $rsgmsg;} ?>
</form>

</div>
<div class="col-lg-3 col-sm-1"></div>
</div>
</div>
</div>
<!--START DESIGNING FORM-->



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
<!--END MAKING REQUESTER LOGIN FORM-->