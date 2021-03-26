<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{

if(isset($_POST['AddToCart']))
{
    if(isset($_SESSION['cart']))
    {
    $my_items=array_column($_SESSION['cart'],'fName');
        
    if(in_array($_POST['fName'],$my_items))
    {
    echo'<script>window.alert("Item is Already Added to Cart!!")</script>';
    echo'<script>location.href="allmenus.php"</script>';
    }
    else
    {
    $count=count($_SESSION['cart']);
    $_SESSION['cart'][$count]=array('fName'=>$_POST['fName'],'fPrice'=>$_POST['fPrice'],'fQuantity'=>1);
    echo'<script>window.alert("Item Added to Cart Successfuly!!")</script>';
    echo'<script>location.href="allmenus.php"</script>';
    }
    }
    
    else
    {
    $_SESSION['cart'][0]=array('fName'=>$_POST['fName'],'fPrice'=>$_POST['fPrice'],'fQuantity'=>1);
    echo'<script>window.alert("Item Added to Cart Successfuly!!")</script>';
    echo'<script>location.href="allmenus.php"</script>';
    }
}
    
if(isset($_POST['RemoveItem']))
{
foreach($_SESSION['cart'] as $key => $value)
{
if($value['fName']==$_POST['fName'])
{
unset($_SESSION['cart'][$key]); 
$_SESSION['cart']=array_values($_SESSION['cart']);
echo'<script>window.alert("Item Successfully Removed!!")</script>';
echo'<script>location.href="cart.php"</script>';
}  
}
}
    
}

?>