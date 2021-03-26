<!--START DATABASE CONNECTION-->
<?php
$my_host="localhost";
$my_user="root";
$my_pass="";
$my_db="canteen_system";
$conn=mysqli_connect($my_host,$my_user,$my_pass,$my_db);
if(!$conn)
{
    die("Connection Failed");
}
//echo"Connected";
?>
<!--END DATABASE CONNECTION-->