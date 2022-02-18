<?php

include_once("database-connection.php");
$query="select * from users";
$queryfire=mysqli_query($dbcon,$query);
$arr=[];
while($row=mysqli_fetch_array($queryfire))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>


