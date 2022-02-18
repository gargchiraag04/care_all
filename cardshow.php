<?php

include_once("database-connection.php");
$city=$_GET["city"];
$med=$_GET["med"];
$query="select * from medicines where city='$city' and medname='$med'";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);


?>