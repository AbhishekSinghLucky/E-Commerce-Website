<?php
include "connection.php";
$sql="SELECT * from mens";
$result= mysqli_query($conn,$sql);
while ($row= $result->fetch_assoc())
{
    echo $row["id"];echo "<br>";
    echo $row["image"]; echo "<br>";

?>
<html>
    <head>
    </head>
    <body>
        <img src="<?php echo $row["image"];?>" style="width:100px; height:100px;">
    </body>
</html>
<?php }?>