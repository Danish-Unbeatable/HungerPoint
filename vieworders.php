<?php
include('db.php');
?>
<?php
//code for update new records of students

//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                

    if(!$conn)
    {
        die("connection error");
        
    }
    else
    {
        $status='';
        
        $update=false;
        if(isset($_GET['Name']))
        {
            $Name=$_GET['Name'];
            $update=true;
            $result=mysqli_query($conn,"SELECT distinct status FROM cart where Name='$Name'");
            while($row=mysqli_fetch_array($result))
            {
                $status=$row['status'];
                
                
            }
        }
        if(isset($_POST['update']))
        {
            $status=$_POST['status'];
               
                
        
            $sql="UPDATE cart SET status='$status' WHERE Name='$Name'";
            if(mysqli_query($conn,$sql))
            {
                echo "<script>
                alert('Data Updated Successfully');
                </script>";
            }
            else
            {
                echo "error:" . $sql . "<br>" .mysqli_error($conn);
            }
           // mysqli_close($conn);
        }
    }
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
    </style>
    </head>
    
<body>
    <div id="container">
        <header>
            <h1><center>HungerPoint</center></h1>
        </header>
        <div class="topnav">
          <a href="adminhome.html">Home</a>
          <a href="adbrkfast.php">Add Breakfast</a>
          <a href="addlunch.php">Add Lunch</a>
          <a href="adddinner.php">Add Dinner</a>
          <a href="adddeserts.php">Add Desserts</a>
          <a href="view.php">View Orders</a>
                    <a href="view_payment.php">View Payments</a>

          
        </div>

        </div>
        <div class="container">
            <table class="table table-striped table-dark  " id="table">
                <tr>
                <th>Product</th>
                <th> Name</th>
                <th> Price</th>
                <th> Quantity</th>
                <th>Subtotal</th>
                </tr>
                <?php
              //  $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                if($_GET['Name'])
                {
                    $Name=$_GET['Name'];
                                
                $result=mysqli_query($conn,"SELECT * FROM cart where Name='$Name' ");
                while($row=mysqli_fetch_array($result))
                {
                    $price=$row['product_price'];
                    $quant=$row['product_quant'];
                    $subtotal=$price*$quant;
                    
            ?>
                <tr>
                            <td><img src="<?php echo $row['product_img']; ?>" class="img-fluid img"></td>

                            <td><?php echo $row['product_name']; ?>
                            </td>

                            <td><?php echo $price; ?>
                            </td>
                            <td><?php echo $quant; ?></td>
                                <td><?php echo $row['total'];?></td>


                </tr>   
                        
                            <?php
                }
                }
               // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                if($_GET['Name'])
                {
                    $Name=$_GET['Name'];
                
                $result=mysqli_query($conn,"SELECT SUM(total) as totall FROM cart where Name='$Name'");
                while($row=mysqli_fetch_array($result))
                {
                ?>  
                <tr>
                    <td></td>              
                    <td></td>
                    <td></td>
                    <td></td>

                    <td><b>Total:<?php echo $row['totall']?></b></td>
                    <!--<input type="text" value="<?=$row['totall']?>" name="id"class="form-control" >
-->
                    <td></td>
                    </tr>
                    
                  
                
                      
                </table>
                <?php
                    }
                }
                
                ?>
                
                
                
                      
                </table>
                <?php
              //  $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                if($_GET['Name'])
                {
                    
                $Name=$_GET['Name'];
                $result=mysqli_query($conn,"SELECT distinct Name,phone,Email,status  FROM cart where Name='$Name' ");
                while($row=mysqli_fetch_array($result))
                {
                
                ?>
                <form action="" method="post">
                <div class="form-group">
                  <label>Your Name</label>
                  <input type="text" class="form-control" value="<?= $row['Name']?>" name="name" placeholder="Enter your name" disabled>
              </div>
              <div class="form-group">
                  <label>Mobile No</label>
                  <input type="text" class="form-control" value="<?= $row['phone']?>" name="mob" placeholder="Enter your mobile no" disabled>
              </div>
              <div class="form-group">
                  <label>Email ID</label>
                  <input type="text" class="form-control" value="<?php echo $row['Email'];?>"name="email" placeholder="Enter your email" disabled>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <!--<input type="text" value="<?php// echo $status?>" name="status" class="form-control" >-->
                  <select name="status" id="status" class="form-control">
                    <option value="<?php echo $status?>">Wait for approval</option>
                    <option value="Order Approved">Order Approved</option>
                    <option value="Order Disapproved">Order Disapproved</option>
                </select>
                  
                  
              </div>
              <div class="form-group">
                  <label>Instruction:change the status to order approved or order disapproved! </label>
                  
              </div>
              
                <?php
                }
                }
                ?>
              <input type="submit" class="btn btn-primary" name="update" value="Submit">
              </form>
                
        </div>
        
        </div>
        </body>
        
        </html>
        