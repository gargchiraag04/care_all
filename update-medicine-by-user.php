<?php
include_once("database-connection.php");
$rid=$_GET["rid"];
//echo "$rid";
$med=$_GET["medname"];
$cmp=$_GET["company"];
$exp=$_GET["exp"];
$qty=$_GET["qty"];
$type=$_GET["type"];
$opt=$_GET["opt"];
$mrp=$_GET["mrp"];
$oprice=$_GET["oprice"];
$sell=$_GET["sell"];
$query="update medicines set medname='$med',company='$cmp',expdate='$exp',qty='$qty',type='$type',options='$opt',price='$mrp',oprice='$oprice',mode='$sell' where rid='$rid'";
$qfire=mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
$error=mysqli_error($dbcon);
if($count==1)
{
    echo "Updated!!!!";
}
else{
    echo "$error";
}
?>