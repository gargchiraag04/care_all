<?php

include_once("database-connection.php");
$userid=$_GET["x"];

$query="select * from profiles where uid='$userid'";
$record=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($record);
if($count==0)
{
    echo "0";
}
else
{
    $arr=[];
    while($row=mysqli_fetch_array($record))
    {
        $arr[]=$row;
    }
    echo json_encode($arr);
}



?>