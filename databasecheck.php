<?php
include_once("database-connection.php");
$email=$_GET["x"];
$query="select * from users where uid='$email'";
$record=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($record);
if($count==0)
{
    echo "0";
}

?>