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


<!--START INSERTING INTO FEEDBACK TABLE-->
<?php
if(isset($_POST['rSubmit']))
{
if(($_POST['rName']=="")||($_POST['rEmail']=="")||($_POST['rYear']=="")||($_POST['rStar']=="")||($_POST['rFeedback']==""))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields!!</div>';
}
else
{
$rName=$_POST['rName'];
$rEmail=$_POST['rEmail'];
$rYear=$_POST['rYear'];
$rStar=$_POST['rStar'];
$rFeedback=$_POST['rFeedback'];
    
$sql="INSERT INTO feedback_tb(rName,rEmail,rYear,rStar,rFeedback)
VALUES('$rName','$rEmail','$rYear','$rStar','$rFeedback')";
if(mysqli_query($conn,$sql))
{
echo'<script>window.alert("Feedback has been added successfully!")</script>';
echo'<script>location.href="allmenus.php"</script>';
}
else
{
$rsgmsg='<div class="alert alert-danger mt-3">Unable to add the feedback!!</div>';
}
}
}
?>
<!--END INSERTING INTO FEEDBACK TABLE-->


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
<title>Feedback</title>
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


<!--START MAKING FEEDBACK FORM-->
<?php
$sql="SELECT rName,rProfilePic,rEmail,rYear FROM requesterlogin_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rProfilePic=$row['rProfilePic'];
$rEmail=$row['rEmail'];
$rYear=$row['rYear'];
}
?>

<div class="container-fluid p-5">
<div class="container">
    
<h1 class="text-center" style="font-family: 'Acme', sans-serif; color: #08133F; ">GIVE YOUR FEEDBACK</h1>

<div class="row pt-2">
<form action="" method="POST" class="p-5 shadow p-3 mb-5 bg-white rounded">

<div class="form-group">
<label for="Name" style="font-weight: 500;">Name</label>
<input type="text" class="form-control" name="rName" value="<?php echo $rName; ?>" readonly>
</div>
        
<div class="form-group">
<label for="Email" style="font-weight: 500;">Email ID</label>
<input type="text" class="form-control" name="rEmail" value="<?php echo $rEmail; ?>" readonly>
</div><br>  

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="Year" style="font-weight: 500;">Year</label>
<input type="text" class="form-control" name="rYear" value="<?php echo $rYear; ?>" readonly>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="Star" style="font-weight: 500;">Rating</label>
<select class="form-control" name="rStar">
<option>...</option>
<option value="5">5 Stars</option>
<option value="4">4 Stars</option>
<option value="3">3 Stars</option>
<option value="2">2 Stars</option>
<option value="1">1 Star</option>
</select>
</div><br>
</div>
</div>

<div class="form-group">
<label for="Feedback" style="font-weight: 500;">Feedback</label>
<textarea class="form-control" rows="5" name="rFeedback" placeholder="Tell us your opinion.."></textarea>
</div><br>
    
<div class="text-center">
<input type="submit" value="Submit" name="rSubmit" class="btn" style="text-decoration:none; color:white; background: #08133F;">
</div>
<?php if(isset($rsgmsg)) {echo $rsgmsg;} ?>
         
</form>
</div>    
    
</div>
</div>
<!--END MAKING FEEDBACK FORM-->




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