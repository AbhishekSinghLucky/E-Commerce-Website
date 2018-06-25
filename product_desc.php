<?php
session_start();
$userid=$_SESSION["userid"];
if($_SESSION["login"]==true){
include "connection.php";
include "header.php";
$id= $_GET['id'];

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
/*
    .btn btn-warning{
        padding: 10px 20px;
        font-size: 10px;
        color: aqua;
        
    }
*/
    
      .zoom:hover1 {
      -ms-transform: scale(1.5); /* IE 9 */
      -webkit-transform: scale(1.5); /* Safari 3-8 */
      transform: scale(-15px,15px); 
  }
    </style>
<body onload="myFunction()">
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <?php
        $sql1="SELECT image from mens where id=$id";
        $result1=mysqli_query($conn,$sql1);
        while ($row= $result1->fetch_assoc())
        {
        ?>
                <div class="zoom"><img src="<?php echo $row["image"];?>" style="width:550px; height:350px;margin-top:20px;margin-left:-100px"> </div>  
       <?php }
        
        ?> <br> <br><br> 
                
          <div class="row">
                <div class="col-md-4">
              <button name="add_to_cart" onclick="add_to_cart()" class="btn btn-warning" style="font-size:30px;">Add to Cart</button><div class="message"></div>
                    
                    
<!--              <a href="cart.php?id=<?php //echo $id; ?>" class="btn btn-warning" role="button" onclick="add_to_cart()" style="font-size:30px" >Add to Cart</a>-->
              </div>
              <div class="col-md-2">
             <a href="buy_now.php" class="btn btn-primary" role="button" style="font-size:30px;">Buy Now</a>

              </div>
                </div>      
            </div>
    <div class="col-md-5">
            <?php
        $sql2="SELECT * from mens WHERE id=$id";
        $result2=mysqli_query($conn,$sql2);
        while($row=$result2->fetch_assoc()){
            
            echo "<h1>".$row["heading"]."</h1>";?>
        <hr>
           <?php echo "<h2>₹".$row["price"]."</h2>";?>
            <?php echo"► Special PriceGet extra 5% off (price inclusive of discount)T&C" ?>
           <?php echo "<h3>".$row["details"]."</h3>";echo "<p style='color:blue'><b>Highlights:</b></p>";
        if($id==1 || $id==3 ||$id==4 ||$id==5){
            echo "<h4>Outer Material: Velvet</h4>";
            echo "<h4>Closure: Laced</h4>";
            echo "<h4>♻ 30 Days Exchange Policy</h4>";
            echo "<h4>✅ Cash on Delivery available</h4>";
        }
            if($id==2){
                echo "<h4>Outer Material: Leather</h4>";
              echo "<h4>Closure: Laced</h4>";
            echo "<h4>♻ 30 Days Exchange Policy</h4>";
            echo "<h4>✅ Cash on Delivery available</h4>";  
            }
        
        ?>
    <?php }
        ?>
            </div>
        </div>
        <div class="row">
        <div class="alert"></div>
        </div>   
      </div>
    </body>    
</html>
<script>
function add_to_cart(){
<?php 
//    $sql2="SELECT * from mens WHERE id=$id";
//    $result2=mysqli_query($conn,$sql2);
//    while($row=$result2->fetch_assoc()){
//        $id=$row["id"];
//        $image=$row["image"];
//        $heading=$row["heading"];
//        $details=$row["details"];
//        $price=$row["price"];
//    }
//    $count=0;
//    $sql4="SELECT * from cart where id=$id";
//    $result4=mysqli_query($conn,$sql4);
//    $count=mysqli_num_rows($result4);
//    if($count==0){
    ?>
    var json = {'id':<?php echo $id; ?>,'user_id':<?php echo $_SESSION["userid"] ?>};
//    console.log(json);
    
    $.post('insert_in_cart.php',json,function(res){
       console.log(res); 
        var cart_item = '';var message='';
        cart_item =res.cart;
        message =res.message;
        $('.btn-warning').html("<span onclick=go_to_cart()>Go to Cart</span>");
//        $('.btn-warning').html("<a href='cart.php?id=<?php //echo $id ?>' style='color:#FFFFFF'>Go to Cart</a>");  
        $('.btn-warning').attr("class","btn btn-success");
        $('.cart_item').html(cart_item);
        $('.message').html(message);
    });
    
    
    }
    
//     $sql3="INSERT INTO `cart`(`id`, `image`, `heading`, `details`, `price`) VALUES ($id,'$image','$heading','$details',$price)";
//    $result3=mysqli_query($conn,$sql3);
//    echo '$(".alert").html("<span style=color:green>Item successfully added in the Cart!!<span>")';    
//    } else {
//      echo '$(".alert").html("<span style=color:red>Item already present in the Cart!!</span>")';  
//    }
    
       
// $('.btn-warning').html("<span onclick=go_to_cart()>Go to Cart</span>");
//    $('.btn-warning').attr("class","btn btn-success");
//    }
//           $('.cart_item').html(cart_item);
    function go_to_cart(){
        window.location.assign("cart.php");
    }
</script>
<script>
    function myFunction(){
<?php
$cart=0;
$sql5="SELECT * from cart WHERE user_id = $userid";
$result5=mysqli_query($conn,$sql5);
$cart= mysqli_num_rows($result5);
?>
$('.cart_item').html(<?php echo $cart; ?>);
    }
</script>

<a style="color:#FFFFFF" href="cart.php?id=<?php $id ?>"></a>
<?php
}
else
{
  echo "<script>window.location.assign('login.php');</script>";   
}
    ?>






