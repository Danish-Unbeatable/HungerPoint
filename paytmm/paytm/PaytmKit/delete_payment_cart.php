<?php
include('../../../db.php');
?>
<?php
session_start();
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                


$sql="DELETE FROM cart WHERE email='{$_SESSION['name']}'";
if(mysqli_query($conn,$sql))
{
	header('location:../../../add_to_cart.php');

}
else
{
	echo "sorry cant delete";
}
?>