<?php
include_once("database-connection.php");
$query="select distinct city from profiles";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>