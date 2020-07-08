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
        $id=0;
        $img='';
        $name='';
        $price='';
        $description='';
        
        $update=false;
        if(isset($_GET['edit']))
        {
            $id=$_GET['edit'];
            $update=true;
            $result=mysqli_query($conn,"SELECT * FROM deserts where id='$id'");
            while($row=mysqli_fetch_array($result))
            {
                $img=$row['img'];
                $name=$row['name'];
                $price=$row['price'];
                $description=$row['description'];
                
                
            }
        }
        if(isset($_POST['update']))
        {
            $id=$_POST['id'];
            $name=$_POST['prname'];
            $description=$_POST['descr'];
            $price=$_POST['price'];
            $file_name=$_FILES['file']['name'];
               $file_type=$_FILES['file']['type'];
               $file_size=$_FILES['file']['size'];
               $file_temp_loc=$_FILES['file']['tmp_name'];
               $destinationfile='breakfast/'.$file_name;
               move_uploaded_file($file_temp_loc,$destinationfile);
               
                
        
            $sql="UPDATE deserts SET name='$name',price='$price',description='$description',img='$destinationfile' WHERE id='$id'";
            if(mysqli_query($conn,$sql))
            {
                echo "<script>
                alert('Date Updated Successfully');
                </script>";
            }
            else
            {
                echo "error:" . $sql . "<br>" .mysqli_error($conn);
            }
            mysqli_close($conn);
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
#search{
     margin-top:10px;
           
}
.cardd{

    margin-top:10px;
}
.img{
    width:400px;
    height:200px;
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
            <div class="card">
                <center><h3><b>Add Breakfast</b></h3></center>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value=<?php echo $id;?>
                        
                <label>Product name</label><br>
                <input type="text" name="prname" id="name" placeholder="Enter Product name" value="<?php echo $name;?>" class="form-control"><br>
                <label>Price:</label><br>
                <input type="text" name="price" placeholder="Enter Price" value="<?php echo $price;?>"  class="form-control"><br>
                <label>Description:</label><br>
                <input type="text" name="descr" placeholder="Enter Description"  value="<?php echo $description;?>" class="form-control"><br>
                <input type="file" name="file"  value="<?php echo $img;?>"<br>
                <?php
                            if($update==true):
                        ?>
                             <button type="submit" name="update"  class="btn btn-info" required>Update</button>
                    <?php else: ?>
                   
                <input type="submit"name="submit" value="Submit" class="btn btn-primary" id="sub">
                
                <?php endif; ?>
                    
            </form>
            </div>
            <div class="cardd">
            <table class="table table-striped table-dark  " id="table">
                <tr>
                <th>Id</th>    
                <th>Image</th>
                <th>Name</th>
                <th> Price</th>
                <th> Description</th>
                <th>Update</th>
                <th>Delete</th>
                </tr>
                <?php
               // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
                if(!$conn)
                {
                    die("unable to connect..");
                }
                $result=mysqli_query($conn,"SELECT * FROM deserts ");
                while($row=mysqli_fetch_array($result))
                {
                    
            ?>
                <tr>
                            <td><?=$row['id']?></td>
                            <td><img src="<?php echo $row['img']; ?>" class="img-fluid img"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><a href="adddeserts.php?edit=<?=$row['id']?>" class="btn btn-info">Update</a></td>
                            <td><a href="delete_dessert_product.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>   
                        
                            <?php
                    }
                ?>
                </table>
                </div>
            
            
        </div>
        </body>
</html>

<?php
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
if(!$conn)
{
    die("unable to connect..");
}
else
{
    if(isset($_POST['submit']))
    {
        $pname=$_POST['prname'];
        $pprice=$_POST['price'];
        $pdesc=$_POST['descr'];
       $file_name=$_FILES['file']['name'];
       $file_type=$_FILES['file']['type'];
       $file_size=$_FILES['file']['size'];
       $file_temp_loc=$_FILES['file']['tmp_name'];
       $destinationfile='breakfast/'.$file_name;
       move_uploaded_file($file_temp_loc,$destinationfile);
       $sql="INSERT INTO deserts(name,price,description,img)VALUES('$pname','$pprice','$pdesc', '$destinationfile')";
       if(mysqli_query($conn,$sql))
        {
            echo"<script type='text/javascript'>
            swal('Hungerpoint!','Product added!','success');
            </script>";
        }
        else{
            echo "error:" . $sql . "<br>" .mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>

       