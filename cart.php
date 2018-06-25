<?php
session_start();
$userid=$_SESSION["userid"];
if($_SESSION["login"]==true){
include "header.php";
include "connection.php";
//$id= $_GET["id"];
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql2="DELETE from cart WHERE ID='$id'";
$result2=mysqli_query($conn,$sql2);    
}
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
        .panel-info {
    border-color: #bce8f1;
    width: 1000px;
    margin-left: 50px;
}
        .panel-body{
            padding-left: 10px;
            
        }
        h3
            {
    margin-top:-3px;
    margin-bottom: 11px;
}
        .btn-primary{
            margin-right: 90px;
            float: right;
        }
        .panel-footer{
           height: 68px;
        }  
        .cart_quantity{
            width: 20px;
        }        
        .price{
           font-size: 25px; 
        }       
    </style>
    <body onload="total_value()">
    <?php
        $cart_count=0;
        $sql1= "SELECT * from cart WHERE user_id=$userid";
        $result1=mysqli_query($conn,$sql1);
        $cart_count=mysqli_num_rows($result1);
//        echo "<script>alert($cart_count)</script>";
        if($cart_count!=0) {  $counter=0; ?>
        
<div class="total">
 <div class="col-xs-2" style="margin-left:1130px;">
 <a href="buy_now.php" class="btn btn-primary" role="button" style="font-size:22px;position:absolute;">Buy Now</a>   
    </div>
   
<div class="panel panel-warning" style="width:250px;float:right;margin-left:1070px;margin-top:60px;position:absolute;">
      <div class="panel-heading" style="font-size:30px">Total</div>
      <div class="panel-body" style="height:100px;">
    Payable Amount:<br>      
 <p style="margin: -2px -2px -38px;font-size: 26px;">₹</p><input type="text" id="total" value="" style="border:none;font-size:26px;margin-left:10px;" readonly>        
    </div>
    </div>
       </div>
        
    <?php    while($row= $result1->fetch_assoc()){ ?>
        <div class="main_body">
        <div class="panel panel-info">
            <div class="panel-heading">My Cart</div>
                <div class="panel-body">
            <div class ="container">
        <div class="row">
    <div class="col-sm-2">       
    <img class="img-responsive" src="<?php echo $row["image"];?>" style="width:150px; height:auto;margin-top:20px;margin-left:4px"> 
        </div>
            <div class="col-xs-5">
            <?php echo "<h3>".$row["heading"]."</h3>"; ?>
            <?php echo "<h5 style='color:green'>2 offers available</h5><br>";?>
<a href="cart.php?id=<?php echo $row["id"]; ?>" class="btn btn-default" role="button" style="font-size:20px;">Remove from Cart</a>
  
            </div>
           <div class="col-xs-4">
               <input type="button" value="-" onclick="decrease_value(<?php echo $counter; ?>)">
<input type="text" value="1" class="cart_quantity" size="1" pattern="[0-9]*" id="quantity<?php echo $counter ?>">
               <input type="button" value="+" onclick="increase_value(<?php echo $counter; ?>)"> 
 <br><br><br><br> 
<!--            <div class="container">   -->
<!--            <div class="row">-->
                
    <div class="col-xs-1">           
    <p style="margin: -4px -16px -38px;font-size: 26px;">₹</p><input type="text" class="price" value="<?php echo $row["price"] ?>" id="price<?php echo $counter ?>" style="border:none;width:80px;margin-bottom:10px" readonly>
        
        
<input type="hidden" class="price" value="<?php echo $row["price"] ?>" id="hid_price<?php echo $counter ?>" style="border:none;width:80px;margin-bottom:10px" readonly>        
          
              </div> 
<!--            </div>-->
<!--            </div>    -->
            </div>
                </div>
        </div></div>
            <div class="panel-footer">

<a href="main.php" class="btn btn-default" role="button" style="font-size:22px;margin-left:680px;">⮜Continue Shopping</a>
            </div>
            </div>
        </div>        
        <?php $counter++; }}
        else{ ?>
        <img src ="empty.jpg" class="img-responsive" style="margin-left:380px;margin-top:100px;">
     
        <?php }
        ?>
                       
    </body> 
</html>
<script>
function increase_value(id){

    var b;var a;var sum;
 var value = parseInt(document.getElementById('quantity'+id).value);
    value++;
    if(value >3)
        {
        alert('Maximum 3 Unit is Allowed!!');   
        }
    else{
       document.getElementById('quantity'+id).value = value;
        //****
var price=parseInt(document.getElementById('hid_price'+id).value);
 a=price*value;
document.getElementById('price'+id).value = a;

    total_value();   
    }
    
}

function decrease_value(id){
    
    var value= parseInt(document.getElementById('quantity'+id).value);                           
    value--;
    if(value<1){
        
    }
    else{
        var current_price=parseInt(document.getElementById('price'+id).value);
        var original_price=parseInt(document.getElementById('hid_price'+id).value);
         b= current_price-original_price;
        document.getElementById('price'+id).value=b;
        document.getElementById('quantity'+id).value=value;
    total_value();
        
    }
}    
    
     function total_value(){
             var sum=0;
            for(var i=0;i< <?php echo $counter; ?>;i++){
               
    var s = parseInt(document.getElementById('price'+i).value);
               sum= sum+s;
                
     document.getElementById('total').value=sum;           
            }
        }
</script>
 <script>
    
<?php
$cart=0;
$sql5="SELECT * from cart WHERE user_id=$userid";
$result5=mysqli_query($conn,$sql5);
$cart= mysqli_num_rows($result5);
?>
$('.cart_item').html(<?php echo $cart; ?>);
    
</script>   
<?php
}
else
{
 echo "<script>window.location.assign('login.php');</script>";   
}
?>












