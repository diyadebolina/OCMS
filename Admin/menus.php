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





<!--START COUNTING TOTAL NO OF ITEMS-->
<?php
$sql="SELECT *FROM menu_tb";
$result=mysqli_query($conn,$sql);
$count1=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF ITEMS-->
<!--START COUNTING TOTAL NO OF VEG ITEMS-->
<?php
$sql="SELECT *FROM menu_tb WHERE fCategory='Veg'";
$result=mysqli_query($conn,$sql);
$count2=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF VEG ITEMS-->
<!--START COUNTING TOTAL NO OF NON VEG ITEMS-->
<?php
$sql="SELECT *FROM menu_tb WHERE fCategory='NonVeg'";
$result=mysqli_query($conn,$sql);
$count3=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF NON VEG ITEMS-->
<!--START COUNTING TOTAL NO OF BREAD ITEMS-->
<?php
$sql="SELECT *FROM menu_tb WHERE fCategory='Bread'";
$result=mysqli_query($conn,$sql);
$count4=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF BREAD ITEMS-->
<!--START COUNTING TOTAL NO OF BEVERAGE ITEMS-->
<?php
$sql="SELECT *FROM menu_tb WHERE fCategory='Beverage'";
$result=mysqli_query($conn,$sql);
$count5=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF BEVERAGE ITEMS-->
<!--START COUNTING TOTAL NO OF DESSERT ITEMS-->
<?php
$sql="SELECT *FROM menu_tb WHERE fCategory='Dessert'";
$result=mysqli_query($conn,$sql);
$count6=mysqli_num_rows($result);
?>
<!--END COUNTING TOTAL NO OF DESSERT ITEMS-->





<!--START INSERTING FOOD ITEMS-->
<?php
if(isset($_POST['fAdd']))
{

if(($_POST['fRegNo']=="")||($_POST['fName']=="")||($_POST['fDesc']=="")||($_POST['fPrice']=="")||($_POST['fCategory']=="")||empty($_POST['fAvail'])||empty($_FILES['fImage']))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields!!</div>';
}
else
{
$fRegNo=$_POST['fRegNo'];
$fName=$_POST['fName'];
$fDesc=$_POST['fDesc'];
$fPrice=$_POST['fPrice'];
$fCategory=$_POST['fCategory'];
$fAvail=$_POST['fAvail'];
    
$fImage=$_FILES['fImage'];
$iName=$_FILES['fImage']['name'];
$iTmpName=$_FILES['fImage']['tmp_name'];
$extarr=array("jpg","jpeg","png");
$ext=explode(".",$iName);
    
$sql="SELECT fRegNo FROM menu_tb WHERE fRegNo='".$fRegNo."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$rsgmsg='<div class="alert alert-warning mt-3">This item is already registered!!</div>';
}
else
{
if(in_array($ext[1],$extarr))
{
move_uploaded_file($iTmpName,'../FoodPics/'.$iName);
$sql="INSERT INTO menu_tb(fRegNo,fName,fDesc,fPrice,fCategory,fAvail,fImage) VALUES('$fRegNo','$fName','$fDesc','$fPrice','$fCategory','$fAvail','$iName')";
if(mysqli_query($conn,$sql))
{
echo'<script>window.alert("Item is Added Successfully!!")</script>';
echo'<script>location.href="menus.php"</script>';
}
}
else
{
$rsgmsg='<div class="alert alert-danger mt-3">Unable to add item!!</div>';
}
}
}
    
}
?>
<!--END INSERTING FOOD ITEMS-->




<!--START UPDATING FOOD ITEMS-->
<?php
if(isset($_POST['fUpdate']))
{
$fID=$_POST['fID'];
$sql1="SELECT *FROM menu_tb WHERE fID='".$fID."'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$up_del_img=$row['fImage'];
    
    
if(($_POST['fRegNo']=="")||($_POST['fName']=="")||($_POST['fDesc']=="")||($_POST['fPrice']=="")||($_POST['fCategory']=="")||empty($_POST['fAvail'])||empty($_FILES['fImage']))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields!!</div>';
}
    
else
{
$fID=$_POST['fID'];
$fRegNo=$_POST['fRegNo'];
$fName=$_POST['fName'];
$fDesc=$_POST['fDesc'];
$fPrice=$_POST['fPrice'];
$fCategory=$_POST['fCategory'];
$fAvail=$_POST['fAvail'];
    
$fImage=$_FILES['fImage'];
$iName=$_FILES['fImage']['name'];
$iTmpName=$_FILES['fImage']['tmp_name'];
move_uploaded_file($iTmpName,'../FoodPics/'.$iName);
    
$sql="UPDATE menu_tb SET fRegNo='$fRegNo',fName='$fName',fDesc='$fDesc',fPrice='$fPrice',fCategory='$fCategory',fAvail='$fAvail',
fImage='$iName' WHERE fID='".$fID."'";
if(mysqli_query($conn,$sql))
{
echo'<script>window.alert("Data Updated Successfully!!")</script>';
echo'<script>location.href="allitems.php"</script>';
unlink("../FoodPics/".$up_del_img);
}
else
{
$rsgmsg='<div class="alert alert-danger mt-3">Unable to update item!!</div>';
}

}
    
}
?>
<!--END UPDATING FOOD ITEMS-->


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


<div class="container-fluid">
<div class="container m-5">
<div class="row">


<!--START EDIT BUTTON FUNCTION FROM ALLITEMS.PHP-->
<?php
if(isset($_POST['fEdit']))
{
$fID=$_POST['fID'];
$sql="SELECT *FROM menu_tb WHERE fID='".$fID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>
<!--END EDIT BUTTON FUNCTION FROM ALLITEMS.PHP-->



<!--START ADD MENU FORM-->
<div class="col-lg-7">
<form action="" method="POST" enctype="multipart/form-data" class="p-5 shadow-lg p-3 mb-5 bg-white rounded" style="font-family: 'Ubuntu', cursive;">
<h3 class="text-center" style="font-weight: 700;">ADD FOOD ITEMS</h3><br>

<div class="form-group">
<label for="FoodRegNo" style="font-weight: 600;">Food Registration No</label>
<input type="text" name="fRegNo" class="form-control" placeholder="Enter the food item Reg No.."
value="<?php if(isset($row['fRegNo'])) {echo $row['fRegNo'];}?>">
</div><br>

<div class="form-group">
<label for="FoodName" style="font-weight: 600;">Food Name</label>
<input type="text" name="fName" class="form-control" placeholder="Enter the food item name.."
value="<?php if(isset($row['fName'])) {echo $row['fName'];}?>">
</div><br>

<div class="form-group">
<label for="FoodDescription" style="font-weight: 600;">Description</label>
<textarea name="fDesc" rows="4" class="form-control" placeholder="Description.."><?php if(isset($row['fDesc'])) {echo $row['fDesc'];}?></textarea>
</div><br>

<div class="form-group">
<label for="FoodPrice" style="font-weight: 600;">Food Price</label>
<input type="text" name="fPrice" class="form-control" placeholder="Enter the food price.."
value="<?php if(isset($row['fPrice'])) {echo $row['fPrice'];}?>">
</div><br>

<div class="form-group">
<label for="FoodCategory" style="font-weight: 600;">Category</label>
<select name="fCategory" class="form-control" placeholder="Enter the food price..">
<option>...</option>
<option value="NonVeg" <?php if(isset($row['fCategory']) && $row['fCategory']=='NonVeg'){echo"selected";}?> >Non Veg</option>
<option value="Veg" <?php if(isset($row['fCategory']) && $row['fCategory']=='Veg'){echo"selected";}?> >Veg</option>
<option value="Bread" <?php if(isset($row['fCategory']) && $row['fCategory']=='Bread'){echo"selected";}?>>Bread</option>
<option value="Beverage" <?php if(isset($row['fCategory']) && $row['fCategory']=='Beverage'){echo"selected";}?>>Beverage</option>
<option value="Dessert" <?php if(isset($row['fCategory']) && $row['fCategory']=='Dessert'){echo"selected";}?>>Dessert</option>
</select>
</div><br>

<div class="form-group">
<label for="FoodAvailability" style="font-weight: 600;">Availability</label>
Yes  <input type="radio" class="radio" name="fAvail" value="Yes" <?php if(isset($row['fAvail']) && $row['fAvail']=='Yes'){echo"checked";}?>>
No  <input type="radio" class="radio" name="fAvail" value="No" <?php if(isset($row['fAvail']) && $row['fAvail']=='No'){echo"checked";}?>>
</div><br>


<div class="form-group">
<label for="FoodImage" style="font-weight: 600;">Image</label><br><br>
<img src="<?php if(isset($row['fImage'])) {echo "../FoodPics/".$row['fImage'];} else {echo"../FoodPics/demo.jpg";}?>" height="150" width="150" style="border: 2px solid black;"><br><br>
<input type="file" class="form-control" name="fImage" required>
</div><br>

<input type="submit" value="Add Item" name="fAdd" class="btn" style="color: white; background:#942203;">
<input type="hidden" name="fID" value="<?php if(isset($row['fID'])) {echo $row['fID'];}?>">
<input type="submit" value="Update Item" name="fUpdate" class="btn mx-2" style="color: white; background:#942203;">

<?php if(isset($rsgmsg)) {echo $rsgmsg;}?>
</form>
</div>
<!--END ADD MENU FORM-->



<!--START MENU DETAILS-->
<div class="col-lg-5 p-5">
<div class="card shadow-lg mb-5 rounded" style="border-radius: 10px;">
<div class="card-title p-4 text-center" style="background: #08133F; color: white; font-family: 'Acme',sans-serif;"><h3>MENU DETAILS</h3></div>
<div class="card-body p-4">
<h6>Total Number of Items: <?php echo $count1; ?></h6>
<h6>Total Number of Veg Items: <?php echo $count2; ?></h6>
<h6>Total Number of Non Veg Items: <?php echo $count3; ?></h6>
<h6>Total Number of Bread Items: <?php echo $count4; ?></h6>
<h6>Total Number of Beverages: <?php echo $count5; ?></h6>
<h6>Total Number of Desserts: <?php echo $count6; ?></h6>
</div>
<div class="card-body text-center" style=" border-top: 1px solid grey;">
<a href="allitems.php" class="btn" style="text-decoration:none; background: #08133F; color: white;">View All Items</a>
</div>
</div>
</div>
<!--END MENU DETAILS-->

</div>
</div>
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