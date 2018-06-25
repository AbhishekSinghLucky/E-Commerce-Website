<?php
include "connection.php";

$id = isset($_POST['id']) ? $_POST['id'] : '';
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

$sql2="SELECT * from mens WHERE id=$id";
    $result2=mysqli_query($conn,$sql2);
    while($row=$result2->fetch_assoc()){
        $id=$row["id"];
        $image=$row["image"];
        $heading=$row["heading"];
        $details=$row["details"];
        $price=$row["price"];
    }

    $count=0;
    $sql4="SELECT * from cart where user_id = $user_id AND id = $id";
    $result4=mysqli_query($conn,$sql4);
    $count=mysqli_num_rows($result4);
    if($count==0){
        $sql3="INSERT INTO `cart`(`id`, `image`, `heading`, `details`, `price`, `user_id`) VALUES ($id,'$image','$heading','$details',$price,$user_id)";
        $result3=mysqli_query($conn,$sql3);
//        print_r ($result3);
        $message = "<br><span style='color:green'>Added successfully</span>";
    }
else{
    
    $message= "<br><span style='color:red'>Item Already In Cart!!</span>";
}
$sql5="SELECT * FROM cart WHERE user_id=$user_id";
$result5=mysqli_query($conn,$sql5);
$cart=mysqli_num_rows($result5);

$data = [
    'cart'  =>  $cart,
    'message'=> $message
];

header('Content-Type: application/json');
$value1 =json_encode($data);
echo $value1;

