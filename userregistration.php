<!--START INSERTING DATA INTO DATABASE-->
<?php
if(isset($_POST['rRegister']))
{
    
if(($_POST['rName']=="")||($_POST['rRegNo']=="")||($_POST['rEmail']=="")||($_POST['rPassword']=="")||($_POST['rYear']=="")||($_POST['rRoll']=="")||($_POST['rSem']=="")||($_POST['rHall']=="")||empty($_POST['rFood'])||empty($_FILES['rProfilePic']))
{
$rsgmsg='<div class="alert alert-warning mt-3">Please fill all the fields!!</div>';
}
    
else
{
$rName=$_POST['rName'];
$rRegNo=$_POST['rRegNo'];
$rEmail=$_POST['rEmail'];
$rPassword=$_POST['rPassword'];
$rYear=$_POST['rYear'];
$rRoll=$_POST['rRoll'];
$rSem=$_POST['rSem'];
$rHall=$_POST['rHall'];
$rFood=$_POST['rFood'];

$rProfilePic=$_FILES['rProfilePic'];
$iName=$_FILES['rProfilePic']['name'];
$iTmpName=$_FILES['rProfilePic']['tmp_name'];
$extarray=array("jpeg","jpg","png");
$ext=explode(".",$iName);    
    
$sql="SELECT rEmail FROM requesterlogin_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$rsgmsg='<div class="alert alert-danger mt-3">This Email is Already Registered!!</div>';
}
else
{
    
if(in_array($ext[1],$extarray))
{
move_uploaded_file($iTmpName,'ProfilePics/'.$iName);
$sql="INSERT INTO requesterlogin_tb(rName,rRegNo,rEmail,rPassword,rYear,rRoll,rSem,rHall,rFood,rProfilePic) VALUES('$rName','$rRegNo','$rEmail','$rPassword','$rYear','$rRoll','$rSem','$rHall','$rFood','$iName')";
if(mysqli_query($conn,$sql))
{
$rsgmsg='<div class="alert alert-success mt-3">You Are Registered!!</div>';
}
}
    
}
}
    
}
?>
<!--END INSERTING DATA INTO DATABASE-->




<!--START STUDENT REGISTRATION FORM-->
<div class="container p-4" id="myRegister">
<div class="row">
<div class="col-lg-3 col-sm-1"></div>

<div class="col-lg-6 col-sm-10">
<form action="" method="POST" enctype="multipart/form-data" class="mt-5 p-5 shadow-lg p-3 mb-5 bg-white rounded" style="font-family: 'Ubuntu', sans-serif;">
<h2 class="text-center" style="font-family: 'Acme', sans-serif;">CREATE YOUR ACCOUNT</h2><br><br>

<div class="form-group">
<label for="Name" style="font-weight:600; font-size:15px;">Name</label>
<input type="text" class="form-control" placeholder="Enter your name.." name="rName">
</div>
<br>

<div class="form-group">
<label for="RegNo" style="font-weight:600; font-size:15px;">Registration Number</label>
<input type="text" class="form-control" placeholder="Enter your registration number.." name="rRegNo">
</div>
<br>

<div class="form-group">
<label for="Email" style="font-weight:600; font-size:15px;">Email</label>
<input type="email" class="form-control" placeholder="Enter your Institute Email ID.." name="rEmail">
</div>
<br>

<div class="form-group">
<label for="Password" style="font-weight:600; font-size:15px;">Password</label>
<input type="password" class="form-control" placeholder="Enter your Password.." name="rPassword">
</div>
<br>



<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="Year" style="font-weight:600; font-size:15px;">Year</label>
<select name="rYear" class="form-control">
<option>...</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
<option value="4">4th</option>
<option value="MTech">MTech</option>
<option value="Phd">Phd.</option>
</select>
</div>
<br>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="Roll No" style="font-weight:600; font-size:15px;">Roll Number</label>
<input type="text" class="form-control" placeholder="Enter your RollNo.." name="rRoll">
</div>
<br>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="Sem" style="font-weight:600; font-size:15px;">Semester</label>
<select name="rSem" class="form-control">
<option>...</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
<option value="4">4th</option>
<option value="5">5th</option>
<option value="6">6th</option>
<option value="7">7th</option>
<option value="8">8th</option>
</select>
</div>
<br>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="Hall" style="font-weight:600; font-size:15px;">Hall</label>
<select name="rHall" class="form-control" id="Hall">
<option>...</option>
<option value="1">Hall1-Netaji Subhash Chandra Bose Hall of Residence</option>
<option value="2">Hall2-Jagdish Chandra Bose Hall of Residence</option>
<option value="3">Hall3-Rabindranath Tagore Hall of Residence</option>
<option value="4">Hall4-CV Raman Hall of Residence</option>
<option value="5">Hall5-Swami Vivekananda Hall of Residence</option>
<option value="6">Hall6-Rishi Aurobindo Hall of Residence</option>
<option value="7">Hall7-Sister Nivedita Hall of Residence</option>
<option value="8">Hall8-Preetilata Waddedar Hall of Residence</option>
<option value="9">Hall9-Satyendranath Bose Hall of Residence</option>
<option value="10">Hall10-Mother Teresa Hall of Residence</option>
<option value="11">Hall11-Meghnad Saha Hall of Residence</option>
<option value="12">Hall12-APJ Abdul Kalam International Hall of Residence</option>
<option value="13">Hall13-Sarojini Naidu Hall of Residence</option>
</select>
</div>
<br>
</div>
</div>
<br>

<div class="form-group">
Veg  <input type="radio" class="radio" value="Veg" name="rFood">  
Non-Veg  <input type="radio" class="radio" value="NonVeg" name="rFood">  
</div>
<br><br>

<div class="form-group">
<label for="ProfilePic" style="font-weight:600; font-size:15px;">Image</label>
<input type="file" name="rProfilePic" class="form-control" required>
</div>
<br><br>

<input type="submit" value="Register" name="rRegister" class="btn btn-block" style="background-color:#0F2C51; color: white;">
<?php if(isset($rsgmsg)) {echo $rsgmsg;}?>
</form>
</div>

<div class="col-lg-3 col-sm-1"></div>
</div>
</div>
<!--END STUDENT REGISTRATION FORM-->