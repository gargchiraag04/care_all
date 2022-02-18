<?php
session_start();
include_once("database-connection.php");

$userid=$_GET["x"];
$userpass=$_GET["y"];
$query="select * from users where uid='$userid' and pwd='$userpass'";
$record=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($record);
if($count==1)
{
    $_SESSION["activeuser"]=$userid;
    echo "1";
}
//else{
//    echo "check id or password";
//}



?>