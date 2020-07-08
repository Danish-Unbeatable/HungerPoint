<?php
session_start();
include('../../../db.php');
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your applications MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
    //echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
    if ($_POST["STATUS"] == "TXN_SUCCESS") {
        echo "<center><h1>Order Status</h1><center>" ;
        echo "<center><h1>Payment Details</h1><center>" ;
        echo "<h3>Order Id :".$_POST['ORDERID'] . "<br/>";
        echo "Amount :".$_POST['TXNAMOUNT'] . "<br/>";
        echo "Status :".$_POST['STATUS'] . "<br/>";
        echo "Date :".$_POST['TXNDATE'] . "<br/>";
                
            

       // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }

                $result=mysqli_query($conn,"SELECT distinct Name,phone,Email,status  FROM cart where email='{$_SESSION['name']}'; ");
                while($row=mysqli_fetch_array($result))
                {
                
                ?>
                <h1>Customer Details</h1>
                <h3>Name:<?php echo $row['Name']?></h3>
                <input type="hidden" name="name" value="<?php echo $row['Name']?>">
                <h3>Email:<?php echo $row['Email']?></h3>
                <input type="hidden" name="email" value="<?php echo $row['email']?>">
                <h3>Phone:<?php echo $row['phone']?></h3>
                <input type="hidden" name="phone" value="<?php echo $row['phone']?>">
                <h1>Your Order Has Been Successfully Placed</h1>
                <a href="delete_payment_cart.php" class="btn btn-danger">Continue Shipping</a>
        
                
        <?php
        //Process your transaction here as success transaction.
        //Verify amount & order id received from Payment gateway with your application's order id and amount.
        //$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");

        $sql="select distinct Name from cart where Email='{$_SESSION['name']}'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            foreach ($result as $row) {
                
            
            $name=$row['Name'];
            $date=date('Y-m-d');
            $sql="INSERT INTO payment (name,Status,Date) VALUES ('$name','SUCCESS','$date')";
            if(mysqli_query($conn,$sql))
            {

            }
            else
            {
                
            }
        }
    }
    }
    }
    else {
        echo "<b>Transaction status is failure</b>" . "<br/>";
        
       // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");

        $sql="select distinct Name from cart where Email='{$_SESSION['name']}'";
        if(mysqli_query($conn,$sql)){
            $name=$row['Name'];
            $sql="INSERT INTO payment (name,Status,Date) VALUES ('$name','FAILED','date(Y-m-d)')";
            if(mysqli_query($conn,$sql))
            {
                            
                
            }
            else
            {
            
            }
        }
        
    }
    
            
    
}


else {
    echo "<b>Checksum mismatched.</b>";
    //Process transaction as suspicious.
}

?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            h1{
                color:green;
            }
            body{
                background-color:#efefef;
            }
        </style>
    </head>
</html>
