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
#search{
     margin-top:10px;
           
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
            
       <center><h3><b>Feedback Form</b></h3></center>
                <form method="post" action="">
                <label>Name</label><br>
                <input type="text" name="name" id="name" placeholder="Enter your Name" class="form-control"><br>
                <label>Email</label><br>
                <input type="email" name="email" placeholder="Enter email" class="form-control"><br>
                <label>Hostel Room Number</label><br>
                <input type="number" name="roomno" placeholder="Enter your room number" class="form-control"><br>
                <label>Remarks</label><br>
                    <textarea rows="6" cols="42" name="rmrks" placeholder="Enter Remarks" class="form-control"></textarea><br><br>
                    <center><input type="submit" name="feedback" value="Submit" id="sub" class="btn btn-primary"></center>
            </form>
               
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
     
<?php
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
if(!$conn)
{
    die("unable to connect..");
}
else
{
    if(isset($_POST['feedback']))
    {
        $name=$_POST['name'];
        $useremail=$_POST['email'];
        $userroomno=$_POST['roomno'];
        $userremarks=$_POST['rmrks'];
        
        $sql="INSERT INTO feedback(name,email,r_no,remarks)VALUES('$name','$useremail','$userroomno','$userremarks')";
        
        if(mysqli_query($conn,$sql))
        {
            echo"<script type='text/javascript'>
            swal('Hungerpoint!','ThankYou!','success');
            </script>";
        }
        else{
            echo "error:" . $sql . "<br>" .mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
