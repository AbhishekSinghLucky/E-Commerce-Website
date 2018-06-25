<?php
$_SESSION["login"]=false;
    if($_SESSION["login"]==false){
    header("Location: login.php");
//   var_dump ($_SESSION["login"]);
    }

