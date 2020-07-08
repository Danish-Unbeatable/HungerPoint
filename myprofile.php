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
#myInput{
     margin-top:10px;
           
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
                      
                    <input type="text" class="form-control"  id="myInput" onkeyup="myFunction()" placeholder="Search By Category...">
                  

        <div class="row" id="data">
        
            <div class="col-md-4 col-lg-4 col-sm-12" >
                
                    <div class="card">
                        <h3 class="card-title bg-info text-white p-2 text-uppercase text-center">Breakfast</h3>
                        <div class="card-body">
                            <img src="Breakfastt.jpeg" class="img-fluid img">
                            <br><br>
                            <a href="breakfast.php" class="btn btn-primary">Breakfast</a>
                            
                        </div>
                    </div>
                    
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12" >
                
                    <div class="card">
                        <h3 class="card-title bg-info text-white p-2 text-uppercase text-center">Lunch</h3>
                        <div class="card-body">
                            <img src="Lunch.jpeg" class="img-fluid img">
                            <br><br>
                            <a href="lunch.php" class="btn btn-primary">Lunch</a>
                            
                        </div>
                    </div>
                    
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12" >
                
                    <div class="card">
                        <h3 class="card-title bg-info text-white p-2 text-uppercase text-center">Dinner</h3>
                        <div class="card-body">
                            <img src="Dinner.jpeg" class="img-fluid img">
                            <br><br>
                            <a href="dinner.php" class="btn btn-primary">Dinner</a>
                            </div>
                    </div>
                    
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12" >
                
                    <div class="card">
                        <h3 class="card-title bg-info text-white p-2 text-uppercase text-center">Desserts</h3>
                        <div class="card-body">
                            <img src="desert.jpg" class="img-fluid img">
                            <br><br>
                            <a href="desert.php" class="btn btn-primary">Desserts</a>
                            
                            </div>
                    </div>
                    
            </div>
        </div>
        
        </div>
        </body>
        <script>
function myFunction() {
  // Declare variables
  //for search
  var input, filter, data, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  data = document.getElementById("data");
  h3= data.getElementsByTagName("h3");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < h3.length; i++) {
    td = h3[i].getElementsByTagName("h3")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        h3[i].style.display = "";
      } else {
        h3[i].style.display = "none";
      }
    }
  }
}
</script>

        </html>
         <?php
}
else
{
    header("location:loginpage.php");
}
ob_end_flush();
?>