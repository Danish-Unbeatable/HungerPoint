<?php
include('db.php');
?>
<?php
ob_start();
session_start();
if($_SESSION['name'])
{
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.mon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--get bootstrap dependencies-->
<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!--font awesome dependencies-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Canteen management</title>
   <!-- <link rel="stylesheet" type="text/css" href="style1.css">-->
    <style>
        body,html{
            height:100%;
            margin: 0px;
            padding: 0px;
            background-image: url("bg.jpeg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
/*  background-repeat: no-repeat;*/
  background-size: cover;

        }

        h1{
            margin: 0px;
            padding: 0 0 20px;
            color: white;
            text-align: center;
            font-family: arial;
            font-size: 50px;
            font-weight:bold;
        }
        .links a{
            text-decoration:none;
            font-family: arial;
        }
        header{
            background: red;
            height: 70px;
        }
        footer{
            
            min-height: 50px;
            margin-top: 80px;
            clear: both;
            font-size: 18px;
            text-align: center;
            color:white;
            
        }
        .container{
            border:1px solid #333;
            background-color:#ffff;
            border-radius:5px;
            padding:16px;
            margin-top:10px;
            
            
        }
        .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
#myInput{
     margin-top:10px;
           
}
.img{
	    width: 80px;
		height: 100px;
	}
	
.display{
    margin-right:20px;
}
#log-out{
    float:right;
    margin-right:5px;
}
    </style>
    </head>
    
<body>
    <div id="container">
        <header>
            <h1><center>HungerPoint</center></h1>
        </header>
        <div class="topnav">
          <a href="myprofile.php">Home</a>
          <a href="breakfast.php">Breakfast</a>
          <a href="lunch.php">Lunch</a>
          <a href="dinner.php">Dinner</a>
          <a href="desert.php">Desserts</a>
          <a href="add_to_cart.php">My Cart</a>
          <a href="feedbck.php">Feedback</a>
          <a class="display"><?php echo($_SESSION['name']);?></a>
            <a href="loginpage.php" id="log-out" class="btn btn-danger">Log Out</a>

          
        </div>

        </div>
        <div class="container">
            <table class="table table-striped table-dark  " id="table">
                <tr>
                <!--<th>Id</th>    -->
                <th>Product</th>
                <th> Name</th>
                <th> Price</th>
                <th> Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
                </tr>
                <?php
               // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                $result=mysqli_query($conn,"SELECT * FROM cart where email='{$_SESSION['name']}' ");
                while($row=mysqli_fetch_array($result))
                {
                    $price=$row['product_price'];
                    $quant=$row['product_quant'];
                    $subtotal=$price*$quant;
                    
            ?>
                <tr>
                            <form action="" method="post">   
                            <!--<td><?//=$row['id']?></td>-->
                            <td><img src="<?php echo $row['product_img']; ?>" class="img-fluid img"></td>
                            
                            <td><?php echo $row['product_name']; ?>
                            </td>
                            
                            <td><?php echo $price; ?>
                            </td>
                                <td><?php echo $quant; ?></td>
                                <td><?php echo $row['total'];?></td>
                                <input type="hidden" value="<?=$row['total']?>" name="total"class="form-control" >
                            
                                <td><a href="delete_cart.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                        
                </tr>   
                        
                            <?php
                }
               // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                $result=mysqli_query($conn,"SELECT SUM(total) as totall FROM cart where Email='{$_SESSION['name']}'");
                while($row=mysqli_fetch_array($result))
                {
                ?>  
                <tr>
                    <td></td>              
                    <td></td>
                    <td></td>
                    <td></td>

                    <td><b>Total:<?php echo $row['totall']?></b></td>
                    
                    <td></td>
                    </tr>
                    
                  
                
                      
                </table>

                <?php
                }
                //$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }

                $result=mysqli_query($conn,"SELECT distinct Name,phone,Email,status  FROM cart where email='{$_SESSION['name']}'; ");
                while($row=mysqli_fetch_array($result))
                {
                
                ?>
              <form>
                <div class="form-group">
                   <label>Your Name</label>
                  <input type="text" class="form-control" value="<?= $row['Name']?>" name="name" placeholder="Enter your name" disabled >
              </div>
              <div class="form-group">
                  <label>Mobile No</label>
                  <input type="text" class="form-control" value="<?= $row['phone']?>" name="mob" placeholder="Enter your mobile no" disabled >
              </div>
              <div class="form-group">
                  <label>Email ID</label>
                  <input type="text" class="form-control" value="<?php echo $row['Email'];?>" name="email" placeholder="Enter your email" disabled>
              </div>
              </form>
              <div>
                  <h4><b><?= $row['status']?></b></h4>
                  <?php
                 if($row['status']=='Order Approved')
                  {
                      $result=mysqli_query($conn,"SELECT SUM(total) as totall from cart  where Email='{$_SESSION['name']}' ");
                while($row=mysqli_fetch_array($result))
                {
                ?>            
                  <label>Click the pay button and proceed for payment</label><br>
                  <form action="checkout.php" method="post">
                 <input type="hidden" class="form-control" name="grand" value="<?=  $row['totall']?>">
    
                 <input type="submit" class="btn btn-primary" name="pay" value="Pay Now &#8377; <?=  $row['totall']?>">
                 </form>

                  <?php
                  }
                  }
                  
                  elseif($row['status']=='Order Disapproved'){
                
                  ?>
                  <label>Sorry for the inconvenience</label><br>
                  <a href="delete_cart_user.php?Name=<?php echo $row['Name']?>&status=<?php echo $row['status']?>" class="btn btn-danger">Empty Cart</a>
                  <?php
                  }
                  ?>
              </div>
              
              <?php
                }
              ?>  
               
                
        </div>
        
        </div>
        </body>
        
        </html>
                     <?php
}
else
{
    header("location:loginpage.php");
}
ob_end_flush();
?>
  