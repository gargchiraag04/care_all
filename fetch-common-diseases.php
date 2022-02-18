<?php
include_once("database-connection.php");
$ctg=$_GET["category"]; #here we are assing ctg as category with respect to we need to find disease to show in option
$query="select distinct disease from diseases where category='$ctg'";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>