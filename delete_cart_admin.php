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
   $sql="DELETE  FROM payment WHERE Name='$Name' ";

    if(mysqli_query($conn,$sql))
{

    echo "<script>
    alert('data deleted');
    window.location='view.php';
    </script>";
    
}
    
}    
else{
   
    echo "<script>
    alert('Order cannot be deleted untill the status of order is confirmed or  disapproved');
    window.location='view.php';
    </script>";
}
}
else{
    
    echo "<script>
    alert('Order cannot be deleted untill the status of order is confirmed or  disapproved');
    window.location='view.php';
    </script>";
    
}
ob_end_flush();   
?>