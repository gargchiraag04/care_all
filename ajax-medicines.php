<?php

include_once("database-connection.php");
$userid=$_GET["uid"];
$mediname=$_GET["medicinename"];
$company=$_GET["company"];
$expiry=$_GET["expdate"];
$quantity=$_GET["qty"];
$type=$_GET["type"];
$option=$_GET["sell"];
$price=$_GET["mrp"];
$offerprice=$_GET["oprice"];
$mode=$_GET["mode"];
//$city="select city from profiles where uid='$userid'";
//$qcity=mysqli_query($dbcon,$city);
//$qar=[];
//while($row=mysqli_fetch_array($qcity))
//{
//    $qar[]=$row[0];
//}
//$usercity=json_decode($qar[0]['city']);
//echo "$qar";
$query="insert into medicines value(null,'$userid','$mediname','$company','$expiry','$quantity','$type','$option','$price','$offerprice','$mode',(select city from profiles where uid='$userid'))";// here we are currently running two query at once
$record=mysqli_query($dbcon,$query);
$errmsg=mysqli_error($dbcon);
if($errmsg=="")
{
    echo "1";
}
else{
    echo "$errmsg";
}
?>
