<!--START DATABASE CONNECTION-->
<?php
include("connection.php");
?>
<!--END DATABASE CONNECTION-->


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
<title>www.canteensystem.com</title>
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




<!--START MAKING BANNER-->
<div class="container-fluid abox">
<h1 class="text-center">ONLINE  CANTEEN<br>MANAGEMENT  SYSTEM</h1>
<h4>National Institute Of Technology Durgapur</h4>
<p>
<a href="Requester/requesterlogin.php" class="btn mx-2" style="background: #08133F; color: white;">Login</a>
<a href="#myRegister" class="btn mx-2" style="background: #08133F; color: white;">Register</a>
</p>
</div>
<!--END MAKING BANNER-->
 
 
<!--START MAKING ABOUT US-->
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 70px" id="myAbout">
<h2 class="text-center mt-2" style="font-family: 'Acme', sans-serif; color: #08133F;">About  NITD Canteen System</h2>
<p class="p-4" style="font-family: 'Ubuntu', sans-serif;">The National Institute of Technology, Durgapur (formerly Regional Engineering College, Durgapur), was established by an Act of Parliament in 1960 as one of the eight such colleges aimed to function as a pace setter for engineering education in the country and to foster national integration.It is a fully-funded premier Technological Institution of the Government of India and is administered by an autonomous Board of Governors. The Institute is a University which awards B.Tech., M.C.A., M.Sc., M.B.A.,M.Tech. and Ph.D. degrees to students after their successful completion of the specified courses. The Institute imparts education in the disciplines of Chemical Engineering, Civil Engineering, Computer Science and Engineering, Electrical Engineering, Electronics and Communication Engineering, Mechanical Engineering, Metallurgical and Materials Engineering,Information Technology, Biotechnology, Physics, Chemistry, Mathematics, Environmental science, Materials Science and Management Studies. As decided by the Ministry of Human Resource Development, Government of India, the procedure for selection of candidates for admission to the Bachelor Degree Courses in Engineering/Technology in National Institute of Technology Durgapur and in other NITs is on the basis of State Rank/ All India Rank (AIR) of AIEEE conducted by Central Board of Secondary Education, New Delhi, and the same is executed through counselling by Central Counselling Board, AIEEE under guidance from MHRD, GOI as per schedule notified by CCB. In addition to the normal intake, a few seats are reserved for Foreign Students who are nominated by the Ministry of External Affairs, Government of India, and the Indian Council for Cultural Relations, Government of India.</p> 
</div>
<!--END MAKING ABOUT US-->
  
  
<!--START MENU SECTION-->
<div class="jumbotron p-5 text-center" id="my" style="font-family: 'Acme',sans-serif;">
<hr class="line">
<h2 class="text-center" style="margin-top: 80px; font-family: 'Acme', sans-serif; color: #08133F;">MENU CHART</h2>

<?php
$sql="SELECT *FROM menu_tb limit 9";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<div class="container p-5">';
echo'<div class="row">';
    
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="col-lg-4 col-sm-6">';
echo'<div class="card text-dark mb-3 shadow p-3 mb-5 bg-white rounded">';
    

//Start Card Body    
echo'<div class="card-body p-3 text-center">';    
echo'<div class="row">';
    
echo'<div class="col-lg-7"><img src="FoodPics/'.$row['fImage'].'" height="150" width="150" style="border: 2px solid black;"></div>';
echo'<div class="col-lg-5" style="text-align: center;">';
echo'<br><div><h5>'.$row['fName'].'</h5></div>';
echo'<div><h4><strong>Rs. '.$row['fPrice'].'</strong></h4></div>';
if($row['fAvail']=="Yes")
{echo'<div>Available</div>';}
else
{echo'<div>Not Available</div>';}
echo'</div>';
    
echo'</div>';
echo'</div>';
//End Card Body       
    
echo'</div>';
echo'</div>';
}
    
echo'</div>';
echo'</div>';
}
?>

<a href="viewmenu.php" class="btn-lg text-center" style="color: white; text-decoration: none; background:#08133F;">View All</a>

</div>
<hr class="line">
<!--END MENU SECTION-->
  
      
<!--START STUDENT REGISTRATION FORM-->
<?php
include("userregistration.php");
?>
<!--END STUDENT REGISTRATION FORM-->
  
<hr class="line">  


<!--START FEEDBACK SECTION-->
<?php
include("feedbackcarousel.php");    
?>
<!--END FEEDBACK SECTION-->
   

<!--START ATTACHING FOOTER-->
<?php
include("footer.php");
?>
<!--START ATTACHING FOOTER-->
    
<div class="container-fluid p-1 text-right" style="border-top: 3px solid #942203;"><a href="Admin/adminlogin.php" class="mx-5" style="text-decoration: none; font-family: 'Ubuntu', cursive;">Admin</a></div>
    

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