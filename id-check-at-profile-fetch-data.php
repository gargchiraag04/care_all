<?php

include_once("database-connection.php");
$idcheck=$_GET["x"];
$query="select * from profiles where uid='$idcheck'";
$record=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($record);
if($count=="1")
{
    echo "1";
}
else{
    echo "0";
}

?>