<?php
include('db.php');
?>
<?php
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                

$id=$_GET['id'];
$sql="DELETE FROM lunch WHERE id='$id'";
if(mysqli_query($conn,$sql))
{
	header('location:addlunch.php');

}
else
{
	echo "sorry cant delete";
}
?>