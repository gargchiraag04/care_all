<?php
include_once("database-connection.php");
$userid=$_POST["uid"];          //here we are extracting userid data from our front end
$username=$_POST["uname"];       //here we are extracting user name data from our front end
$usergender=$_POST["gender"];       //here we are extracting gender data from our front end
$contact=$_POST["mobile"];       //here we are extracting contact  data from our front end
$stay=$_POST["address"];       //here we are extracting address data from our front end
$location=$_POST["city"];       //here we are extracting city data from our front end
$zipcode=$_POST["pincode"];       //here we are extracting pincode data from our front end
$useremail=$_POST["email"];       //here we are extracting email of user data from our front end
$identity=$_POST["proof"];       //here we are extracting some government id data from our front end
$dob=$_POST["dob"];       //here we are extracting date of birth  data from our front end
$pname=$_FILES["ppic"]["name"];       //here we are extracting the permanent name data of pic uploaded from our front end       //here we are extracting temp name data of pic that have been uploaded from our front end
if($pname=="")
{
    $pname=$_POST["hdn"];
    
}
else{
    $ptempname=$_FILES["ppic"]["tmp_name"];
    move_uploaded_file($ptempname,"../care_all/uploads/".$pname);   //moving upload  file to our folder;
    unlink("uploads/".$_POST["hdn"]);
}
$query="update profiles set uname='$username',gender='$usergender',contact='$contact',address='$stay',city='$location',pin='$zipcode',email='$useremail',acard='$identity',dob='$dob',ppic='$pname' where uid='$userid'";

 $insert=mysqli_query($dbcon,$query);
$errmsg=mysqli_error($dbcon);
if($errmsg=="")
{
    echo "Updated Successfully";
}
else{
    echo "$errmsg";
}

?>