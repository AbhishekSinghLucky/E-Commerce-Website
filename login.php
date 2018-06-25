<?php
session_start();
include "connection.php";
$_SESSION["login"]=false;
//var_dump();
//if($_SESSION["login"]==false){
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
        body{
            background-size: 100% auto;
        }    
</style>
    <body background="logi3n2.jpg">
        <center>
     <div class="container">
  <div style="background-color:	#00FFFF; opacity:0.3" class="jumbotron">
      
      <img src="login.png">
        </div></div>  </center>  
    <div class="container">
  <form style="margin-left:25px;" action="login.php" method="post">
    <div class="form-group">
      <label for="email">Username</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>
<!--
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
-->
    <button type="submit" class="btn btn-primary" name ="submit">Submit</button><span style="color:red;font-size:12px;"> New User? </span><a href="signup.php">SignUp Here!</a>
  </form>
</div>
        <div class="background" style="margin-left:460px;">
        <img src="giphy.gif" style="height:150px;width:400px;">
        </div>
              <?php
              if(isset($_POST['submit']))
              {
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                  $sql4="SELECT * from signup WHERE email='$email'";
                  $result4=mysqli_query($conn,$sql4);
                  $a=mysqli_num_rows($result4);
//                  echo "<script>alert($a)</script>";die;
                  if($a==1){
                  $sql6= "SELECT id from signup WHERE email='$email'";
                  $result6=mysqli_query($conn,$sql6);
                  while($row= $result6->fetch_assoc()){
                      $id = $row["id"];
                  $sql7="SELECT password from signup WHERE id=$id";
                  $result7=mysqli_query($conn,$sql7);
                  while($row=$result7->fetch_assoc()){
                      $ori_password=$row["password"];
                  }      
                  }
                    if($password==$ori_password){
//                        echo "Login Successful";
                        $_SESSION["login"]=true;
                        $_SESSION["userid"]=$id;
                                       ?>
                        <script> window.location.assign("main.php");</script>
                   <?php }
                      else{
                          echo "Password did not match";
                      }
                  }
                  else{
                      echo "<span style='color:red;margin-left:140px;'>Please Register Yourself</span>"  ?>
                  <?php }
                  }?>
             

    </body>
</html>

<?php// } ?>





