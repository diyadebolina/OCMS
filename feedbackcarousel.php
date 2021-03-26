<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!--START LINKING CSS-->
<link href="index.css" rel="stylesheet">
<!--END LINKING CSS-->

<link rel="stylesheet" type="text/css" href="lightslider.css">

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

<!--Jquery-->
<script type="text/javascript" src="js/JQuery3.3.1.js"></script>
<script type="text/javascript" src="js/lightslider.js"></script>
</head>
<body>



<div class="container-fluid" style="font-family: 'Acme',sans-serif;">
<h2 class="text-center" style="margin-top: 60px; font-family: 'Acme', sans-serif; color: #08133F;">FEEDBACK FROM STUDENTS</h2>   


<div class="container sliderbox">
<ul id="autoWidth" class="cs-hidden">   
<!----START CREATING A CAROUSEL SLIDER----> 
<?php
$sql="SELECT *,rProfilePic FROM feedback_tb f,requesterlogin_tb r WHERE 
f.rEmail=r.rEmail";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo'<li class="item-a">';  
echo'<div class="box">';
    
echo'<p></p>';
echo'<img src="ProfilePics/'.$row['rProfilePic'].'" class="model">';
    
echo'<div class="details">';
echo'<p style="text-align: center; margin: 10px;">';
echo '<span style="letter-spacing: 1px; font-size: 24px;">'.$row['rName'].'</span><br>';
echo '<span style="font-size: 15px; font-family: serif;">'.$row['rEmail'].'</span>';
echo'<br><br>';
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
echo'<br>';
echo $row['rFeedback'];
echo'</p>';
echo'</div>';
    
echo'</div>';
echo'</li>';
}
}
?>
<!----END CREATING A CAROUSEL SLIDER----> 
</ul>

        
</div>
</div>


<script src="js/script.js" type="text/javascript"></script>

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