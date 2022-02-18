<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <script src="jsfile/angular.min.js"></script>
    <link rel="stylesheet" href="../care_all/style/bootstrap.min.css">
    <script>
        function showpreview(file, imgid) {
            if (file.files && file.files[0]) {

                //				alert(file.files[0].size);

                var reader = new FileReader();
                reader.onload = function(e) {
                    $(imgid).prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

    </script>   <!-- image prieview -->
    <script>
        $(document).ready(function() {
            var uname=0;  //here we assisgn 0 to username if its false then uname iis zero it must be 1 it will be if we enter correct details if we need to save!
            var cno=0;
            var add=0;
            var city=0;
            var govid=0;
                    $("#uid").blur(function() {
                        var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var userid = $(this).val();
                        if (userid.length == 0) {
                            $("#errid").html("-Empty");
                        } else if (r.test(userid) == true) {
                            $("#errid").html("");
                        } else {
                            $("#errid").html("-Please enter a valid entry")
                        }
                    }); //user id validation
                    //======================================================================================================
                    $("#uname").blur(function() {
                        var r = /^[a-z," "]+$/;
                        var uname = $(this).val();
                        if (r.test(uname) == true) {
                            $("#errname").html("");
                            uname=1;
                        } else {
                            $("#errname").html("-Invalid Format");
                            uname=0;
                        }
                    }); //name validation weather the ente text is text only or not
                    //=======================================================================================================
            $("#city").blur(function() {
                        var r = /^[a-z," "]+$/;
                        var city = $(this).val();
                        if (r.test(uname) == true) {
                            $("#errcity").html("");
                            city=1;
                        } else {
                            $("#errcity").html("-Invalid Format");
                            city=0;
                        }
                    }); //name validation weather the ente text is text only or not
                    //=======================================================================================================
          $("#proof").blur(function() {
                        var r = /^[6-9]{1}[0-9]{11}$/;
                        var acard = $(this).val();
                        if (r.test(acard) == true) {
                            $("#erracard").html("");
                            govid=1;
                        } else {
                            $("#erracard").html("-Invalid format");
                            govid=0;
                        }
                    }); //government id number validation check
                    //=======================================================================================================
                    $("#mobile").blur(function() {
                        var r = /^[6-9]{1}[0-9]{9}$/;
                        var mob = $(this).val();
                        if (r.test(mob) == true) {
                            $("#errmob").html("");
                            cno=1;
                        } else {
                            $("#errmob").html("-Invalid format");
                            cno=0;
                        }
                    }); //mobile number validation check
                    //=======================================================================================================
                    $("#address").blur(function() {
                        var addres = $(this).val();
                        if (addres.length == 0) {
                            $("#erradd").html("-Empty");
                        } else {
                            $("#erradd").html("");
                        }
                    }); //checking weather its empty or not
                    //=======================================================================================================
                    $("#email").blur(function() {
                        var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                        var emailid = $(this).val();
                        if (emailid.length == 0) {
                            $("#erremail").html("-Empty");
                        } else if (r.test(emailid) == true) {
                            $("#erremail").html("");
                        } else {
                            $("#erremail").html("-Please enter a valid entry")
                        }
                    });   //checking weather email id format is correct or not
                    //=======================================================================================================
                    $("#jsonfetch").click(function() {
//                        alert("connected!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
                        var userid = $("#uid").val();
                        $.getJSON("user-info-fetch.php?x=" + userid, function(response) {
//                            if (response=="0") {
//                                alert("No user found!!!!");
//                            } else    
                            //here we did so as we are using ajax to display fetch button
                            {
//                                alert(JSON.stringify(response));
                                $("#uname").val(response[0].uname);
                                $("#gender").val(response[0].gender);
                                $("#mobile").val(response[0].contact);
                                $("#address").val(response[0].address);
                                $("#city").val(response[0].city);
                                $("#pincode").val(response[0].pin);
                                $("#email").val(response[0].email);
                                $("#proof").val(response[0].acard);
                                $("#dob").val(response[0].dob);
                                $("#prev").prop("src", "uploads/" + response[0].ppic);
                                $("#hdn").val(response[0].ppic);
                                
//                                alert(response[0].ppic);
                            }
                        });
                        //fetch data
                    });   // if user uid match with some user in profile the the fetch button will arise
                 //=================================================================================================================
//            $("#uid").keyup(function(){
//                var id=$(this).val();
//                $.get("id-check-at-profile-fetch-data.php?x="+id,function(response){
//                    if(response=="1")
//                        {
//                            $("#json").css("display","block");
//                            $("#savebtn").css("display","none");
//                        }
//                    else{
//                         $("#json").css("display","none");
//                    }
//                });
//            });    // in this when user enter a user id here it is checking weather the uid is present in our profiles table or not if it is present than the fetch button will come other wise it will be hidden 
        });
</script>    <!-- different validations and json fetching -->
   <script>
    var mod=angular.module("kuchbhi",[]);
       mod.controller("koibhi",function($scope,$http){
          $scope.fetch=function()
          {
//              var id=$.document.getElementById("#id").val();
              var   id= angular.element(document.getElementById("uid"));
              $scope.uid=id.val();
               $http.get("id-check-at-profile-fetch-data.php?x="+$scope.uid).then(ok,notok);
              function ok(response)
              {
                  if(response.data=="1")
                        {
                            $("#json").css("display","block");
                            $("#savebtn").css("display","none");
                        }
                    else{
                         $("#json").css("display","none");
                         $("#updbtn").css("display","none");
                        
                    }
              }
            function notok(response)
              {
                  alert(response.data);
              }
//              alert($scope.uid);
//              alert ("connected!!!!!!!!!");
          }
       });
    </script>
    <style>
       body{
           background-color: #EDF5E1; 
       }
       .container{
           max-width: 100%;
       }
       input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;
    </style>   <!-- styling  -->
    <title>Document</title>
</head>

<body ng-app="kuchbhi" ng-controller="koibhi" ng-init="fetch();">
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="user-profile-process.php">
            <div class="row">
                <div class="col-md-12 bg-danger text-white">
                    <center>
                        <h3>Your Profile</h3>
                    </center>
                </div>
            </div> <!-- heading -->
            <!-- //=============================================================================================== -->
            <input type="hidden" id="hdn" name="hdn">
            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <lable>
                        User Id
                    </lable>
                    <span id="errid">&nbsp;</span>
                    <input type="text" class="form-control" placeholder="example123@xyz.com" value="<?php echo $_SESSION["activeuser"]; ?>" readonly name="uid" id="uid">
                </div>
                <div class="col-md-2 form-group" style="display:none;" id="json">
                    <lable>&nbsp;</lable>
                    <input type="button" class="form-control btn-primary" value="Fetch" id="jsonfetch" name="jsonfetch">
                </div>
            </div> <!-- in this user name exist -->
            <!-- //================================================================================================-->
            <div class="row">
                <div class="col-md-4 form-group">
                    <lable>Name <span id="errname">*</span></lable>
                    <input type="text" class="form-control" name="uname" id="uname">
                </div>
                <div class="col-md-3 form-group">
                    <lable>Gender</lable>
                    <select name="gender" id="gender" class="form-control">
                        <option value="none">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Transgender">Transgender</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <lable>Contact Number <span id="errmob">*</span></lable>
                    <input type="text" class="form-control" id="mobile" name="mobile">
                </div>
            </div> <!-- name gender contact number -->
            <!-- //================================================================================================-->
            <div class="row">
                <div class="col-md-11 form-group">
                    <lable>Address <span id="erradd">*</span></lable>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
            </div> <!-- address of user  -->
            <!-- //================================================================================================-->
            <div class="row">
                <div class="col-md-4 form-group">
                    <lable>City</lable><span id="errcity">&nbsp;*</span>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="col-md-3 form-group">
                    <lable>Pin Code</lable>
                    <input type="text" class="form-control" name="pincode" id="pincode">
                </div>
                <div class="col-md-4 form-group">
                    <lable>Email <span id="erremail">*</span></lable>
                    <input type="text" class="form-control" placeholder="example123@xyz.com" id="email" name="email">
                </div>
            </div> <!-- city pincode email -->
            <!-- //================================================================================================ -->
            <div class="row">
                <div class="col-md-4 form-group">
                    <lable>Government Id Number</lable><span id="erracard">&nbsp;*</span>
                    <input type="text" class="form-control" placeholder="AadharCard Only" name="proof" id="proof">
                </div>
                <div class="col-md-3 form-group">
                    <lable>D.O.B</lable>
                    <input type="date" class="form-control" min="1950-01-01" max="current_date()" id="dob" name="dob">
                </div>
            </div> <!-- government id and dob -->
            <!-- //================================================================================================ -->
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <lable>Profile Pic</lable>
                    <input type="file" accept="image/jpeg" onchange="showpreview(this,prev);" name="ppic" id="ppic">
                </div>
            </div> <!-- image url file accept -->
            <!-- //================================================================================================ -->
            <div class="row">
                <div class="col-md-12 mb-3 mt-1">
                    <center>
                        <img src="" alt="No image selected" width="150" height="150" id="prev" name="prev">

                    </center>
                </div>
            </div> <!-- image priview -->
            <!-- //================================================================================================= -->
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <input type="Submit" value="Save" class="btn btn-primary" name="btn" id="savebtn">
                        <input type="submit" value="Update" class="btn btn-primary" name="btn" id="updbtn">
                    </center>
                </div>
            </div> <!-- save update buttom with use of form action we are able to move at two pages-->
        </form>
    </div>
</body>

</html>