<!DOCTYPE html>
<?php

include "connection.php";
$userid=$_SESSION["userid"];
$sql="SELECT email from signup where id=$userid";
$result=mysqli_query($conn,$sql);
while($row= $result->fetch_assoc()){
    $username=$row["email"];
    
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

    .navbar p{
        float: left;
        font-size: 19px;
        color: #f2f2f2;
         margin-left: 15px;
        text-align: center;
    }
    .navbar img{
        float: left;
        height: 40px;
        width: 10%;
        margin-top:10px;
        margin-left: 8px;
    }

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}

    .cart_item{
        color:darkorange;
        position:absolute;
        top:2px;
        padding-left:55px; 
    }    
</style>
</head>
<body>

<div class="navbar">
    <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
  <a href="cart.php"><div class="cart_item"></div><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
  <a href="main.php"><span class="glyphicon glyphicon-home"></span> Home</a>
    <img src= "logo.png" title="home" onclick="myhome()">
     <?php echo "<span style='color:green;margin-left:60px;position: absolute;margin-top: 31px;'>Logged In as:</span><span style='color:white;margin-left:150px;position: absolute;margin-top: 31px;'>$username</span>"; ?>
</div>
    
</body>
   
</html>
<script>
function myhome(){
    window.location.assign("main.php");
}
</script>