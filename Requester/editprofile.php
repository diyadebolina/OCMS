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


<!--START FETCHING DATA TO PROFILE FROM DATABASE-->
<?php
$sql="SELECT *FROM requesterlogin_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rRegNo=$row['rRegNo'];
$rPassword=$row['rPassword'];
$rYear=$row['rYear'];
$rRoll=$row['rRoll'];
$rSem=$row['rSem'];
$rFood=$row['rFood'];
$rHall=$row['rHall'];
$rProfilePic=$row['rProfilePic'];
}
?>
<!--END FETCHING DATA TO PROFILE FROM DATABASE-->


<!--START UPDATING DATA-->
<?php
if(isset($_POST['rUpdate']))
{
$rEmail=$_POST['rEmail'];
$sql1="SELECT * FROM requesterlogin_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$up_del_img=$row['rProfilePic'];

if(($_POST['rName']=="")||($_POST['rRegNo']=="")||($_POST['rEmail']=="")||($_POST['rPassword']=="")||($_POST['rYear']=="")||($_POST['rRoll']=="")||($_POST['rSem']=="")||($_POST['rHall']=="")||empty($_POST['rFood'])||empty($_FILES['rProfilePic']))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields</div>';
}

else
{
$rPassword=$_POST['rPassword'];
$rYear=$_POST['rYear'];
$rRoll=$_POST['rRoll'];
$rSem=$_POST['rSem'];
$rHall=$_POST['rHall'];
$rFood=$_POST['rFood'];
    
$rProfilePic=$_FILES['rProfilePic'];
$iName=$_FILES['rProfilePic']['name'];
$i_Temp_Name=$_FILES['rProfilePic']['tmp_name'];
move_uploaded_file($i_Temp_Name,'../ProfilePics/'.$iName);
    
$sql="UPDATE requesterlogin_tb SET rPassword='$rPassword',rYear='$rYear',rRoll='$rRoll',rSem='$rSem',rHall='$rHall',rFood='$rFood',
rProfilePic='$iName' WHERE rEmail='".$rEmail."'";
if(mysqli_query($conn,$sql))
{
echo'<script>window.alert("Updated Succesfully")</script>';
echo'<script>location.href="profile.php"</script>';
unlink('../ProfilePics/'.$up_del_img);
}
else
{
$rsgmsg='<div class="alert alert-danger mt-3">Unable to Update Data!!</div>';
}
}
}
?>
<!--END UPDATING DATA-->




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
<title>Profile</title>
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
<li class="nav-item" style="margin-right:5px;"><a href="#" class="nav-link text-white"><i class="fa fa-shopping-cart" style="margin-right:4px;"></i>My Cart (<?php echo $count; ?>)</a></li>      
<li class="nav-item" style="margin-right:5px;"><a href="../logout.php" class="nav-link text-white"><i class="fa fa-sign-out" style="margin-right:4px;"></i>Log Out</a></li> 
</ul>   
</div>
</div>
<!--END MAKING NAVBAR-->


<!--START MAKING PROFILE DETAILS-->
<div class="container p-5" style="border: 1px solid #CED1E0; margin: 60px; font-family: 'Ubuntu', cursive;">
<div class="row">

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="Name" style="font-weight: 500;">Name</label>
<input type="text" name="rName" class="form-control" value="<?php echo $rName; ?>" readonly>
</div><br>
<div class="form-group">
<label for="Email" style="font-weight: 500;">Email ID</label>
<input type="email" name="rEmail" class="form-control" value="<?php echo $rEmail; ?>" readonly>
</div><br>
<div class="form-group">
<label for="RegNo" style="font-weight: 500;">Registration No</label>
<input type="text" name="rRegNo" class="form-control" value="<?php echo $rRegNo; ?>" readonly>
</div><br>

<div class="row">
    <div class="col-md-6">
    <label for="Password" style="font-weight: 500;">Password</label>
    <input type="text" name="rPassword" class="form-control" value="<?php echo $rPassword; ?>">
    </div>
    <div class="col-md-6">
    <label for="Year" style="font-weight:500;">Year</label>
    <select name="rYear" class="form-control">
    <option>...</option>
    <option value="1" <?php if(isset($row['rYear']) && $row['rYear']=='1') {echo"selected";} ?> >1st</option>
    <option value="2" <?php if(isset($row['rYear']) && $row['rYear']=='2') {echo"selected";} ?>>2nd</option>
    <option value="3" <?php if(isset($row['rYear']) && $row['rYear']=='3') {echo"selected";} ?>>3rd</option>
    <option value="4" <?php if(isset($row['rYear']) && $row['rYear']=='4') {echo"selected";} ?>>4th</option>
    <option value="MTech" <?php if(isset($row['rYear']) && $row['rYear']=='MTech') {echo"selected";} ?>>MTech</option>
    <option value="Phd" <?php if(isset($row['rYear']) && $row['rYear']=='Phd') {echo"selected";} ?>>Phd.</option>
    </select>    
    </div>
</div>
<br>    

    <div class="row">
    <div class="col-md-4">
     <label for="Roll" style="font-weight: 500;">Roll No</label>
     <input type="text" name="rRoll" class="form-control" value="<?php echo $rRoll; ?>">
    </div>
    <div class="col-md-4">
     <label for="Sem" style="font-weight:500;">Semester</label>
     <select name="rSem" class="form-control">
     <option>...</option>
     <option value="1" <?php if(isset($row['rSem']) && $row['rSem']=='1') {echo"selected";} ?>>1st</option>
     <option value="2" <?php if(isset($row['rSem']) && $row['rSem']=='2') {echo"selected";} ?>>2nd</option>
     <option value="3" <?php if(isset($row['rSem']) && $row['rSem']=='3') {echo"selected";} ?>>3rd</option>
     <option value="4" <?php if(isset($row['rSem']) && $row['rSem']=='4') {echo"selected";} ?>>4th</option>
     <option value="5" <?php if(isset($row['rSem']) && $row['rSem']=='5') {echo"selected";} ?>>5th</option>
     <option value="6" <?php if(isset($row['rSem']) && $row['rSem']=='6') {echo"selected";} ?>>6th</option>
     <option value="7" <?php if(isset($row['rSem']) && $row['rSem']=='7') {echo"selected";} ?>>7th</option>
     <option value="8" <?php if(isset($row['rSem']) && $row['rSem']=='8') {echo"selected";} ?>>8th</option>
     </select>
    </div>
    <div class="col-md-4">
     <label for="Hall" style="font-weight:500;">Hall</label>
     <select name="rHall" class="form-control">
     <option>...</option>
     <option value="1" <?php if(isset($row['rHall']) && $row['rHall']=='1') {echo"selected";} ?> >Hall1-Netaji Subhash Chandra Bose Hall of Residence</option>
     <option value="2" <?php if(isset($row['rHall']) && $row['rHall']=='2') {echo"selected";} ?>>Hall2-Jagdish Chandra Bose Hall of Residence</option>
     <option value="3" <?php if(isset($row['rHall']) && $row['rHall']=='3') {echo"selected";} ?>>Hall3-Rabindranath Tagore Hall of Residence</option>
     <option value="4" <?php if(isset($row['rHall']) && $row['rHall']=='4') {echo"selected";} ?>>Hall4-CV Raman Hall of Residence</option>
     <option value="5" <?php if(isset($row['rHall']) && $row['rHall']=='5') {echo"selected";} ?>>Hall5-Swami Vivekananda Hall of Residence</option>
     <option value="6" <?php if(isset($row['rHall']) && $row['rHall']=='6') {echo"selected";} ?>>Hall6-Rishi Aurobindo Hall of Residence</option>
     <option value="7" <?php if(isset($row['rHall']) && $row['rHall']=='7') {echo"selected";} ?>>Hall7-Sister Nivedita Hall of Residence</option>
     <option value="8" <?php if(isset($row['rHall']) && $row['rHall']=='8') {echo"selected";} ?>>Hall8-Preetilata Waddedar Hall of Residence</option>
     <option value="9" <?php if(isset($row['rHall']) && $row['rHall']=='9') {echo"selected";} ?>>Hall9-Satyendranath Bose Hall of Residence</option>
     <option value="10" <?php if(isset($row['rHall']) && $row['rHall']=='10') {echo"selected";} ?>>Hall10-Mother Teresa Hall of Residence</option>
     <option value="11" <?php if(isset($row['rHall']) && $row['rHall']=='11') {echo"selected";} ?>>Hall11-Meghnad Saha Hall of Residence</option>
     <option value="12" <?php if(isset($row['rHall']) && $row['rHall']=='12') {echo"selected";} ?>>Hall12-APJ Abdul Kalam International Hall of Residence</option>
     <option value="13" <?php if(isset($row['rHall']) && $row['rHall']=='13') {echo"selected";} ?>>Hall13-Sarojini Naidu Hall of Residence</option>
     </select>

    </div>
    </div>
    <br>

Veg  <input type="radio" class="radio" value="Veg" name="rFood" <?php if(isset($row['rFood']) && $row['rFood']=='Veg') {echo"checked";} ?>>  
Non-Veg  <input type="radio" class="radio" value="NonVeg" name="rFood" <?php if(isset($row['rFood']) && $row['rFood']=='NonVeg') {echo"checked";} ?>>    
<br> <br>
<div class="form-group">
<img src="<?php echo"../ProfilePics/".$row['rProfilePic']; ?>" height="150" width="150" style="border: 2px solid #CED1E0;">
<input type="file" class="form-control" name="rProfilePic" required>
</div><br>
<input type="submit" value="Update" name="rUpdate" class="btn" style="color:white; background: #08133F;">

<?php if(isset($rsgmsg)) {echo $rsgmsg;} ?>
</form>

</div>
</div>
<!--END MAKING PROFILE DETAILS-->




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