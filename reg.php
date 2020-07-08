<?php
include('db.php');
?>
<?php
session_start();
//$conn=mysqli_connect("localhost","id13682396_ayesha","_=-n1A&b2D_<J*_v","id13682396_hungerpoint");
if(!$conn)
{
    die("unable to connect..");
}
else
{
    if(isset($_POST['register']))
    {
        $Frname=$_POST['Fname'];
        $Lsname=$_POST['Lname'];
        $useremail=$_POST['email'];
        $userphone=$_POST['phone'];
        
        $userpass=$_POST['pass'];
        $userpasss=$_POST['cpass'];
        
        $sql="INSERT INTO user_register(Fname,Lname,email,Phone,password,cnfrmpassw)VALUES('$Frname','$Lsname','$useremail','$userphone','$userpass','$userpasss')";
        
        if(mysqli_query($conn,$sql))
        {
            echo"<script type='text/javascript'>
            swal('Hungerpoint!','ThankYou!','success');
            </script>";
            $_SESSION['fname']=$Frname;
             echo"<script>location.href='loginpage.php'</script>";
        
        }
        else{
            echo "error:" . $sql . "<br>" .mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<title>Canteen management</title>
    <link rel="stylesheet" type="text/css" href="regis.css">
    
    <script>function myfunction(){
            var fname=document.getElementById("i5");
            var lname=document.getElementById("i6");
            var email=document.getElementById("i7");
            var phone=document.getElementById("i10");
            
            var passw=document.getElementById("i8");
            var cpass=document.getElementById("i9");
            if(fname="")
                {
                    alert("Please enter First name");
                    return false;
                }
            if(lname="")
                {
                    alert("Pleaae enter Last name");
                    return false;
                }
            if(email="")
                {
                    alert("Please enter email");
                    return false;
                }
                
            if(phone="")
                {
                    alert("Please enter phone no");
                    return false;
                }
            if(pass="")
                {
                    alert("Please enter password");
                    return false;
                }
            if(cpass="")
                {
                    alert("Please re-enter password");
                    return false;
                }
        
        }
    </script>
    <style>
        label{
            color:white;
        }
        .regform{
            height:auto;
        }
        p{
                        color:white;

        }
    </style>

    
</head>
    <body> 
        <div class="regform">
         <h1>Registration Form</h1>
            <div class="mane">
             <form method="post" id="register" action="">
            <h2> Register Here</h2>
            <label> First Name:</label><br>
            <input type="text" name="Fname"  placeholder="Enter your First Name" id="i5" required><br><br>
            
            <label> Last Name:</label><br>
            <input type="text" name="Lname"  placeholder="Enter your Last Name" id="i6" required><br><br>

            <label> Email:</label><br>
            <input type="email" name="email"  placeholder="Enter your Email" id="i7" required><br><br>
            
            <label> Phone No:</label><br>
            <input type="number" name="phone"  placeholder="Enter your Phone" id="i7" required><br><br>

            <label> Password:</label><br>
            <input type="password" name="pass"  placeholder="Enter your Password" id="i8" required><br><br>

            <label> Confirm Password:</label><br>
            <input type="password" name="cpass"  placeholder="Re-enter your Password" id="i9" required><br><br>
            <input type="submit" name="register" value="Submit" id="sub"><br><br>
                 
                 <p>Already registered?<a href="loginpage.php"> Login </a></p>
            </form>
            </div>
        </div>
    </body>
</html>


