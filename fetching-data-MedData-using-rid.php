<?php


include_once("database-connection.php");
$regid=$_GET["rid"];
$query="select * from medicines where rid='$regid'";
$fire=mysqli_query($dbcon,$query);
//$count=mysqli_num_rows($fire);
$arr=[];
while($row=mysqli_fetch_array($fire))
{
   $arr[]=$row;
}
echo json_encode($arr);












?>