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
<body>

<!--START VIEW BUTTON FUNCTION FROM STUDENTS.PHP-->
<?php
if(isset($_POST['rView']))
{
$rID=$_POST['rID'];
$sql="SELECT *FROM requesterlogin_tb WHERE rID='".$rID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);   
}
?>
<!--END VIEW BUTTON FUNCTION FROM STUDENTS.PHP-->
<?php
if(!isset($rID))
{
echo'<script>location.href="dashboard.php"</script>';
}
else
{
?>
<div class="container-fluid">
<div class="row">
<div class="col-lg-2 col-sm-1"></div>
<div class="col-lg-8 col-sm-10">

<div class="container mt-5 mb-5 pb-4" style="background: #E1F2FA;">
<div class="text-center p-3" style="background: #08133F;">
<img src="../Images/logo.png" class="img-fluid mx-2" height="70" width="70">
<h2 style="font-family: 'Acme', sans-serif; color: white;">National Institute of Technology,
Durgapur</h2>   
<h6 style="color: white;">MAHATMA GANDHI AVENUE, DURGAPUR-713209</h6>
</div>
<div class="row p-5">
<div class="col-lg-8 col-md-6">
<h5><strong>Student's Name:</strong>   <?php echo $row['rName']; ?></h5>
<hr class="line">
<h5><strong>Registration Number:</strong>   <?php echo $row['rRegNo']; ?></h5>
<hr class="line">
<h5><strong>Institute Email ID:</strong>   <?php echo $row['rEmail']; ?></h5>
<hr class="line">
<h5><strong>Roll Number:</strong>   <?php echo $row['rRoll']; ?></h5>
<hr class="line">
<h5><strong>Year:</strong>   <?php echo $row['rYear']; ?></h5>
<hr class="line">
<h5><strong>Semester:</strong>   <?php echo $row['rSem']; ?></h5>
<hr class="line">
<h5><strong>Hall:</strong>   <?php echo $row['rHall']; ?></h5>
<hr class="line">
<h5><strong>Food Type:</strong>   <?php echo $row['rFood']; ?></h5>
</div>
<div class="col-lg-4 col-md-6">
<img src="<?php echo"../ProfilePics/".$row['rProfilePic']; ?>" height="250" width="250" style="border-radius:50%; border: 2px solid #CED1E0;">
</div>
</div>
<hr class="line">
<div class="text-center">
<a href="#" class="btn mx-1 d-print-none" style="color: white; background: #08133F;" onclick="window.print()">Print</a>

<a href="dashboard.php" class="btn mx-1" style="color: white; background: #08133F;">Close</a>
</div>
</div>

</div>
<div class="col-lg-2 col-sm-1"></div>
</div>
</div>
<?php
}
?>



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