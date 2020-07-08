<?php
include('db.php');
?>
<?php
session_start();
        if(isset($_POST['login']))
        {
            $useremail=$_POST['email'];
            $userpass=$_POST['pass'];
           // $conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
            if(!$conn)
          {
            die("connection error ");
          }
          $sql="SELECT * FROM user_register WHERE email='$useremail' AND password='$userpass'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          
          if($row['email'] == $useremail && $row['password'] == $userpass)
          {
              
              echo"<script type='text/javascript'>
            swal('Hungerpoint!','Login Successful!','success');

            </script>";
            echo "<script>window.history.go(-1);</script>";
            $_SESSION['name']=$useremail;
         // echo"<script>location.href='window.history.back()'</script>";
        }
        else
        {
        echo"<script type='text/javascript'>
        alert('login error');
        </script>";
        }
          mysqli_close($conn);
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
    <script>function myfunction(){
            var email=document.getElementById("i10");
            var pass=document.getElementById("i11");
            if(email="")
                {
                    alert("Please enter email");
                    return false;
                }
            if(pass="")
                {
                    alert("Please enter password");
                    return false;
                }
        }
        
    </script>
<title>Canteen management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1>User login</h1>
        <form method="post" action="">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email" id="i10" required>
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password" id="i11" required>
            <br><br>

            <input type="submit" name="login" class="btn btn-primary"  value="Login">
			<p>Not Yet Registered?<a href="reg.php">Register</a></p>
        </form>  
    </div>
</body>
</html>


