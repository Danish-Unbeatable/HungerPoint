<?php
include('db.php');
?>
<?php
ob_start();
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
if(!$conn)
{
    die("unable to connect..");
}
if($_GET['status']!='wait for approval')
{
$Name=$_GET['Name'];
$status=$_GET['status'];
$sql="DELETE  FROM cart WHERE Name='$Name' and status='$status'";
if(mysqli_query($conn,$sql))
{
    echo "<script>
    alert('data deleted');
    </script>";
    header('location:add_to_cart.php');
}    
else{
    header('location:view.php');
    echo "<script>
    alert('data cannot be deleted untill the status is order confirmed');
    </script>";
}
}
else{
    header('location:view.php');
    echo "<script>
    alert('data cannot be deleted untill the status is order confirmed');
    </script>";
    
}
ob_end_flush();   
?>