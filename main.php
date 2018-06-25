<?php
session_start();
$userid=$_SESSION["userid"]; 
//echo "<script>alert($userid)</script>";
if($_SESSION["login"]==true){
    include "header.php";
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

</style>
    <body> 


<div class="w3-content w3-display-container">
  <img class="mySlides" src="8.jpg" style="width:100%">
  <img class="mySlides" src="9.jpg" style="width:100%">
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)" >&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)" style="float:right;">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
        
        
        
 <br> <br>         
<div class="men">
    <h2 style="margin-top:1px;position:absolute;margin-left:15px;font-size:40px;">Mens <br>Collections</h2>
    <div class="image" style="margin-left:180px;margin-bottom:25px">
    <a href="product_desc.php?id=1"><img src="men1.jpg" style="width:150px;height:100px;margin-left:50px"></a> 
    <a href="product_desc.php?id=2"><img src="men2.jpg" style="width:150px;height:100px;margin-left:65px;"></a>
    <a href="product_desc.php?id=3"><img src="men3.jpg" id="m2" style="width:150px;height:100px;margin-left:70px"></a>
    <a href="product_desc.php?id=4"><img src="men4.jpg" id="m3" style="width:150px;height:100px;margin-left:75px"></a>
    <a href="product_desc.php?id=5"><img src="men5.jpg" id="m4" style="width:150px;height:100px;margin-left:80px"></a> 
</div></div>
<hr>
<div class="women">
            <h2 style="margin-top:1px;position:absolute;margin-left:15px;font-size:40px;">Womens <br>Collections</h2>
    <div class="image" style="margin-left:180px;margin-bottom:25px;margin-top: 69px;">
    <img src="women1.jpg" style="height:100px;margin-left:50px">
    <img src="women1.jpg" style="height:100px;margin-left:70px">
    <img src="women1.jpg" style="height:100px;margin-left:102px">
    <img src="women1.jpg" style="height:100px;margin-left:60px">
    <img src="women1.jpg" style="height:100px;margin-left:70px">
    </div> </div><br>  
            <hr>
  <div class="kid">
            <h2 style="margin-top:47px;position:absolute;margin-left:15px;font-size:40px;">Kids <br>Collections</h2>
        <div class="image" style="margin-left:194px;margin-bottom:25px">  
      <img src="kids1.jpg" style="height:160px;margin-left:30px;width:190px">
         <img src="kids1.jpg" style="height:160px;margin-left:10px;width:190px">
           <img src="kids1.jpg" style="height:160px;margin-left:s0px;width:190px">
                 <img src="kids1.jpg" style="height:160px;margin-left:30px;width:190px">
                 <img src="kids1.jpg" style="height:160px;margin-left:30px;width:190px">
      </div></div>  <br> <hr> 
    

<?php
}
else
{
 echo "<script>window.location.assign('login.php');</script>";   
}
?>
<script>
    
<?php
$cart=0;
$sql5="SELECT * from cart WHERE user_id=$userid";
$result5=mysqli_query($conn,$sql5);
$cart= mysqli_num_rows($result5);
?>
$('.cart_item').html(<?php echo $cart; ?>);
    
</script>