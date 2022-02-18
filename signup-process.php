<?php
session_start();
include_once("database-connection.php");

$userid=$_GET["x"];
$password=$_GET["pwd"];
$mobilenum=$_GET["phone"];
$query="select * from users where uid='$userid'";  
//or mobile='$mobilenum'
$record=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($record);
if($count==0)
{
    $insertdata="insert into users(uid,pwd,mobile) values('$userid','$password','$mobilenum')";
    $check=mysqli_query($dbcon,$insertdata);
    $_SESSION["activeuser"]=$userid;
    echo "0";
//    header("location: user-dashboard.php");
}
else{
    echo "-User Already Exists";
}

?>