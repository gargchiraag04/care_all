<?php
include_once("database-connection.php");
 $uid=$_GET["uid"];
$query="update users set status='1' where uid='$uid'";
$fire=mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
if($count==1)
{
    echo "Resumed";
}

else{
//    echo mysqli_error($dbcon);
    echo "User is not blocked";
}


?>