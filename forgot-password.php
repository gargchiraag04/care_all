<?php

include_once("database-connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$fquery=mysqli_query($dbcon,$query);
//$arr=[];
$count=mysqli_num_rows($fquery);
//while($row=mysqli_fetch_array($fquery))
//{
//    $arr[]=$row;
//}
while($arr=mysqli_fetch_array($fquery))
{
    $password= $arr[1];
    $mobile= $arr[2];
}

if($count==1)
{
//    echo $password;
//    echo $mobile;
    $resp=SendSMS($mobile,$password);
}
else{
    echo "Incorrect User ID";
    }

?>