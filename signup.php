<?php
include "connection.php";
?>

<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<style>
body  {
    background-image: url("bg.jpg");
    background-size: 100% auto;
}
</style>

<body>
<center>
    <div class="container">
  <div style="background-color:	white; opacity:0.3" class="jumbotron">
      <h1 style="color:black;font-style: italic;font-size:50px"><b>SignUp Yourself Here!!</b></h1>
        </div></div>
    
    <div class="image" style="margin-right:950px;">
    <img src="signup.png" style="width:800px;height:400px;margin-right:250px;position:absolute">      
    </div>

  <form style="margin-left:25px;" action="signup.php" method="post">
    <div  class="col-sm-5">
      <label for="name" style="color:black; font-size: 20px; margin-top:-80px">Name:</label>
      <input type="text" style="margin-top:-50px;border: 2px solid black;border-radius:10px;" class="form-control" id="name" placeholder="Enter Name" name="name" size="35" pattern="^\D*$" title="Numbers or Special Characters Not Allowed" required>
    </div>
    <div class="col-sm-5">
      <label for="email" style="color:black; font-size: 20px ;margin-top:-80px">E-Mail</label>
      <input type="text" style="margin-top:-50px;border: 2px solid black;border-radius:10px;" class="form-control" id="email" placeholder="Enter E-Mail" name="email" required>
    </div>
      <div class="col-sm-5">
          <br>
      <label for="password" style="color:black; font-size: 20px">Password</label>
      <input type="password" style="border: 2px solid black;border-radius:10px;" class="form-control" id="password" placeholder="Enter Password" name="password" required>
    </div>
      <div class="col-sm-5">
          <br>
      <label for="mobile" style="color:black; font-size: 20px">Mobile</label>
      <input type="number" style="border: 2px solid black;border-radius:10px;" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
    </div>
      <div style="margin-top:80px">
    <button type="submit" class="btn btn-primary btn-md" name="save">Sign Up</button>
          </div>
      </form> 
<!--
      <div style="margin-top:80px">
    <button type="submit" class="btn btn-primary btn-md" name="save">Sign Up</button>
          </div>
-->
      </center>
    <?php
    if(isset($_POST['save']))
    {
        
        $name= $_POST['name'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $mobile= $_POST['mobile'];
        $sql1= "SELECT * from signup WHERE `email`='$email'";
        $result1= mysqli_query($conn,$sql1);
        $a= mysqli_num_rows($result1);
//        print_r($a);die;
        if($a>0){
            echo "Sorry, This Email ID Already Exist";
        }
        else{
            $sql2="INSERT INTO `signup`(`name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";
            $result2=mysqli_query($conn,$sql2);
            echo "<span>SignUp Successful</span>";
            echo "<script>window.location.assign('login.php')</script>";
        }
    }
    ?>
    
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(".number").keypress(function (e) {

       //if the letter is not digit then don't type anything
       if (e.which != 8 && e.which != 0 &&  (e.which < 48 || e.which > 57)) {
           return false;
       }
   });
</script>