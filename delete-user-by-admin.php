<?php

include_once("database-connection.php");
$uid=$_GET["uid"];
$query="delete from users where uid='$uid'";
$fire=mysqli_query($dbcon,$query);
$count=mysqli_affected_rows($dbcon);
$error=mysqli_error($dbcon);
if($count==1)
{
    echo "Deleted!!!!!!!!!";
}
else{
    echo "$error";
}

?>