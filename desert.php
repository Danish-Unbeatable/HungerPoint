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
        .card{
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
#search{
     margin-top:10px;
           
}
#log{
   float:right; 
}

.img{
    width:500px;
    height:200px;
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
            <input type="text" placeholder="Search.." name="search" id="search" class="form-control">
      
        <div class="row">
            <?php
           //$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
            if(!$conn)
          {
            die("connection error ");
          }
            $sql = "SELECT * FROM deserts ";

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				foreach ($result as $row) {
				    $id=$row['id'];
					$img=$row['img'];
					$name=$row['name'];
					$price=$row['price'];
					
			?>
            <div class="col-md-4 col-lg-4 col-sm-12" >
                <form action="" method="POST">
                    <div class="card">
                        <h3 class="card-title bg-info text-white p-2 text-uppercase text-center"><?php echo $row['name']?></h3>
                        <div class="card-body">
                            <img src="<?php echo $row['img'];?>" class="img-fluid img">
                            <h4><?php echo $row['description']?></h4>
                            <h4 class="text-danger">&#8377;<?php echo $row['price']?></h4>
                            <!--to store particular product in cart-->
                            
                            <input type="text" name="quant" placeholder="Quantity" class="form-control"><br>
                            
                            <input type="hidden" name="product_id" value="<?php echo $id?>">
                            <input type="hidden" name="img" value="<?php echo $img?>">
                            <input type="hidden" name="name" value="<?php echo $name?>">
                            <input type="hidden" name="price" value="<?php echo $price?>">
                            <input type="hidden" name="status" value="wait for approval">

                            <?php
                              //  $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                                if(!$conn)
                              {
                                die("connection error ");
                              }
                            $sql="SELECT * FROM user_register where email='{$_SESSION['name']}'";

                                $result = mysqli_query($conn, $sql);

                        			if (mysqli_num_rows($result) > 0) {
                        				foreach ($result as $row) {
                        			
                                        
                                ?>
                                <input type="hidden" name="user_name" value="<?php echo $row['Fname']?>">
                            <input type="hidden" name="user_phone" value="<?php echo $row['Phone']?>">
                            <input type="hidden" name="user_email" value="<?php echo $row['email']?>">
                                    
                    
                            <input type="submit" value="Add to Cart" name="submit" class="btn btn-success">
                            <?php 
                            }}?>
                        </div>
                    </div>
                </form>    
            </div>
            <?php	
				}
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
  <!--add to cart code-->
<?php

	
   // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
    if(!$conn)
    {
            die("connection error ");
    }
	if(isset($_POST['submit']))
	{
		$product_id=$_POST['product_id'];
		$product_img=$_POST['img'];
		$product_name=$_POST['name'];
		$product_price=$_POST['price'];
		$product_quant=$_POST['quant'];
		$user_name=$_POST['user_name'];
		$phone=$_POST['user_phone'];
		$user_email=$_POST['user_email'];
		$status=$_POST['status'];
		
		$total=$product_price*$product_quant;
	
	$sql2 = "SELECT * FROM cart where product_name = '$product_name' and Email='{$_SESSION['name']}'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) 
    {
    	echo "<script>
    	alert('Already In cart');
    	</script>";
    }
    else
    {

		$sql="INSERT INTO cart (product_id,product_img,product_name,product_price,product_quant,Name,phone,Email,status,total) VALUES ('$product_id','$product_img','$product_name','$product_price','$product_quant','$user_name','$phone','$user_email','$status','$total')";
		if(mysqli_query($conn,$sql))
		{
			
    	echo "<script>
    	alert('Added Into cart');
    	</script>";
		}
		else
		{
echo "error:" . $sql . "<br>" .mysqli_error($conn);
				

		}
	}
	}

?>