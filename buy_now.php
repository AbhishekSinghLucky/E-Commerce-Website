<?php
session_start();
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
        .panel-success{
            width: 1000px;
        }
        .panel-heading{
            font-size: 25px;
        }
    </style>
    <body>
<div class="container">
<div class="row">
<div class="col-md-5">
 <div class="panel panel-success">
 <div class="panel-heading">Delivery Details</div>
<div class="panel-body">
<div class="container">
<form class="form-horizontal" action="https://test.instamojo.com/@imabhishek_100/lde57b94831f84a279f3c50622fdfa071/">
<div class="form-group">
<label class="control-label col-sm-2" for="fname">First Name</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="lname">Last Name</label>
<div class="col-sm-5">          
<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="mobile">Contact Number</label>
<div class="col-sm-5">          
<input type="number" class="form-control" id="mobile" placeholder="Enter Contact Number" name="mobile">
</div>
</div>
    <div class="form-group">
<label class="control-label col-sm-2" for="pincode">Pincode</label>
<div class="col-sm-5">          
<input type="number" class="form-control" id="pincode" placeholder="Enter Pincode" name="pincode">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="address">Address</label>
<div class="col-sm-5">          
    <textarea class="form-control" id="address" placeholder="Enter Address" name="address"></textarea>
</div>
</div>    
    
<div class="form-group">        
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" name="submit">Submit and Pay</button>
</div>
</div>
</form>
</div>  
</div>
</div>
</div>
</div>
</div>
     
        
   
    </body>
</html>
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
?>
