<?php

include_once("database-connection.php");
$uid=$_GET["uid"];
$query="update users set status='0' where uid='$uid'";
$fire=mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==0)
{
    echo "User is already Unblocked";
}
else{
echo "Blocked!!!";
}








?>