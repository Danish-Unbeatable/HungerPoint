<?php
include('db.php');
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
                <th>Id</th>    
                <th>Name</th>
                <th>Order</th>
                <th>Delete</th>
                <th>Payment</th>
                </tr>
                <?php
               // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                $result=mysqli_query($conn,"SELECT DISTINCT Name,status FROM cart ");
                $id=0;
                while($row=mysqli_fetch_array($result))
                {
                    $id++;
                    
            ?>
                <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $row['Name'];?></td>
                            <td>
                            <a href="vieworders.php?Name=<?= $row['Name'];?>" class="btn btn-primary">View</a>
                        </td>
                        <td>
                            <a href="delete_cart_admin.php?Name=<?= $row['Name'];?>&status=<?= $row['status'];?>" class="btn btn-danger">Delete</a>
                        </td>
                        <td><a href="pay_details.php?Name=<?= $row['Name'];?>" class="btn btn-warning">View</a>
                        </td>
                </tr>   
                        
                            <?php
                }
                ?>
                      
                </table>
                
        </div>
        
        </div>
        </body>
        
        </html>
        