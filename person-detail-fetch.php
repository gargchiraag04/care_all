<?php

include_once("database-connection.php");
$uid=$_GET["uid"];
$query="select * from profiles where uid='$uid'";
$fquery=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($fquery))
{
    $arr[]=$row;
}
echo json_encode($arr);

?>