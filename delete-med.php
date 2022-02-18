<?php

include_once("database-connection.php");
$rid=$_GET["regid"];
$query="delete from medicines where rid='$rid'";
$qfire=mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==1)
{
    echo "deleted";
}
else{
    echo "Please try again!!!!!!";
}







?>