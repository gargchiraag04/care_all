<?php

include_once("database-connection.php");
$users=$_GET["userid"];
$query="select * from medicines where uid='$users'";
$qfire=mysqli_query($dbcon,$query);
$arr=[];
$count=mysqli_num_rows($qfire);
if($count==0)
{
    echo "Enter A valid id";
}
else{
    while($row=mysqli_fetch_array($qfire))
    {
        $arr[]=$row;
    }
    echo json_encode($arr);
}


?>