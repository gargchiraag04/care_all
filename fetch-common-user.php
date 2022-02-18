<?php
include_once("database-connection.php");
$category=$_GET["category"];
$disease=$_GET["disease"];
$query="select * from diseases where category='$category' and disease='$disease'";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>