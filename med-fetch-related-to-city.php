<?php

include_once("database-connection.php");
$city=$_GET["city"];
$query="select distinct medname from medicines where city='$city'";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);






?>