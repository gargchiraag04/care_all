<?php

include_once("database-connection.php");
$uid=$_POST["uid"];
$category=$_POST   ["category"];
$disease=$_POST["dname"];
$contact=$_POST["contact"];
$symptoms=$_POST["symptoms"];
$recomen=$_POST["recommendation"];
$sug=$_POST["suggestion"];
$ppic1name=$_FILES["ppic1"]["name"];//
$ppic2name=$_FILES["ppic2"]["name"];//
if($ppic1name=="")//
{

}
else{
    $ppic1tname=$_FILES["ppic1"]["tmp_name"];
    move_uploaded_file($ppic1tname,"uploads/".$ppic1name);
}
if($ppic2name=="")//
{
 
}
else{
    $ppic2tname=$_FILES["ppic2"]["tmp_name"];
    move_uploaded_file($ppic2tname,"uploads/".$ppic2name);
}

$query="insert into diseases value('$uid','$category','$disease','$contact','$symptoms','$recomen','$sug','$ppic1name','$ppic2name',current_date())";


$record=mysqli_query($dbcon,$query);
$err=mysqli_error($dbcon);
if($err=="")
{
    echo "SHARED";
}
else{
    echo "$err";
}







?>