<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../care_all/style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Care All</title>
    <style>
    body {
            background-color: #EDF5E1;
        }

        .container {
            max-width: 100%;
        }

        * {
            margin: 0px;
        }

        a {
            color: black;
        }

        .picad {
            width: 150px;
            height: 120px;
            text-align: center;
        }

        .picadd {
            width: 250px;
            height: 200px;
            text-align: center;
        }

        .carousel-inner {
            max-width: 100%;
            max-height: 100%;
        }

        a:hover {
            text-decoration: none;
            color: black;
            text-decoration-color: lightskyblue;
            cursor: pointer;
        }

        ul {
            list-style: none;
            display: inline-flex;
        }

        li {
            padding: 0px 5px 0px 5px;
            ;
        }

        button {
            text-decoration: none;
            border: 0px;
            background-color: transparent;
        }

        button:hover {
            border: 0px;
        }

        button:hover {
            border: 0px;
        }
        #password{
            border-color: none;
        }
    </style>
    <script>
    $(document).ready(function() {
            var chkemail = 1; //this act like a jasoos that at end check weather all detail enter are correct or not if any one is incoreect it will alert 
            var chkmobile = 1; //this act like a jasoos that at end check weather all detail enter are correct or not if any one is incoreect it will alert    
            var chkpass = 1; //this act like a jasoos that at end check weather all detail enter are correct or not if any one is incoreect it will alert 
            $("#email").blur(function() {
                var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var emailid = $(this).val();
                if (emailid.length == 0) {
                    $("#erruid").html("-Empty");
                    chkemail = 0;
                } else if (r.test(emailid) == true) {
                    $("#erruid").html("-ok");
                    chkemail = 1;
                } else {
                    $("#erruid").html("-Enter a valid entry");
                    chkemail = 0;
                }
            }); //validation for email id
            //===================================================================================

            $("#password").keyup(function() {
                var pass = $(this).val();
                if (pass.length < 4) {
                    $("#errpass").html("-weak");
                    chkpass = 0;
                } else if (pass.length > 3 && pass.length < 8) {
                    $("#errpass").html("-medium");
                    chkpass = 1;
                } else {
                    $("#errpass").html("-strong");
                    chkpass = 1;
                }
            }); //validation for password

            //====================================================================================

            $("#mobile").blur(function() {
                var r = /^[6-9]{1}[0-9]{9}$/;
                var mob = $(this).val();
                if (r.test(mob) == true) {
                    $("#errmob").html("-valid number");
                    chkmobile = 1;
                } else {
                    $("#errmob").html("-Invalid Entry");
                    chkmobile = 0;
                }
            }); //validation for mobile weather phone number enter is correct or not
            //=========================================================================================


            $("#lemail").blur(function() {
                var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var emailid = $(this).val();
                if (emailid.length == 0) {
                    $("#lerruid").html("-Empty");
                } else if (r.test(emailid) == true) {
                    $("#lerruid").html("");
                } else {
                    $("#lerruid").html("-Enter a valid entry");
                }
            }); //validation for email id for login modal
            //===================================================================================

            $("#email").blur(function() {
                var emailfind = $(this).val();
                if (chkemail == 1)
                    $.get("databasecheck.php?x=" + emailfind, function(response) {
                        if (response == "0") {
                            $("#erruid").html("-User Id Avaliable");
                            chkemail = 1;
                        } else {
                            $("#erruid").html("-User already Exist with same user id");
                            chkemail = 0;
                        }
                    });
            }); //in this we check weather email id is existing or not
            //=====================================================================================


            $("#signup").click(function() {
                var emailid = $("#email").val();
                var pass = $("#password").val();
                var mob = $("#mobile").val();
                if (chkemail == "1" && chkmobile == "1" && chkpass == "1") {
                    $.get("signup-process.php?x=" + emailid + "&pwd=" + pass + "&phone=" + mob, function(response) {
//                                            $("#activity").html(response);
                          if(response == 0)
                              {
                                  window.location = "user-dashboard.php";
                              }
                        else{
                            alert(response);
                        }
                    });
                } else
                    alert("Enter Correct Details!");
            }); // ajax file for signup

            //=========================================================================================

            $("#loginnow").click(function() {
                var usersid = $("#lemail").val();
                var userspass = $("#lpassword").val();
                $.get("login-process.php?x=" + usersid + "&y=" + userspass, function(response) {
                    if (response == "1") {
                        window.location = "user-dashboard.php";
                    } else {
                        $("#logincheck").html("Invalid User Id or Password");
                    }
                });
            }); //check pass and email id are valid or not for login

            //=========================================================================================

          $("#otp").click(function(){
             var uid=$("#fuid").val();
              $.get("forgot-password.php?uid="+uid,function(response){
                 alert(response); 
              });
          });


            $("#passshow").mouseover(function() {
                $("#password").attr("type", "text");
            }); //on mouse above eye property of password change to text from password and password text is visible


            $("#passshow").mouseout(function() {
                $("#password").attr("type", "password");
            }); //on mouse out eye property of password change from text to password and password text is hidden


            $("#password").focusout(function(){
                $("#password").css("border","0");
            });

        });</script>
</head>
<body>
    <div class="container">
       <div class="row">
            <div class="col-md-12 px-0">
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="index.php">
    <img src="pics/Logo.png" width="50" height="30" class="d-inline-block align-top" alt="">
    Care All.com
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    </ul>
    <div class="navbar-text">
      <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" data-toggle="modal" data-target="#forsignup">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#forlogin">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#aboutus">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#map">Reach Us</a>
      </li>
    </ul>
  </div>
    </div>
  </div>
</nav>
            </div>
        </div> <!-- In this we have login and sign up button -->
        <!-- //============================================================================================================= -->
        <div class="row">
            <div class="col-md-12 px-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="pics/photo-1542736667-069246bdbc6d.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="pics/photo-1559298947-270ce106ac00.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="pics/photo-1584362917165-526a968579e8.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> <!-- carousel -->
            </div>
 
        </div>
        <!-- //============================================================================================================= -->
        <div class="row">
            <div class="col-md-12 bg-danger text-white">
                <center>
                    <h5>Our Services</h5>
                </center>
            </div>
        </div> <!-- services -->
        <!-- //************************************************************************************************************** -->
        <div class="row mt-3 mb-3">
            <div class="col-md-4  mt-2">
                <div class="card bg-light">
                    <div style="text-align:center">
                        <img class="card-img-top picad mt-2" src="pics/Organ-donation-hands-and-heart.jpg" alt="Card image cap">
                    </div>
                    <div class="card-body" style="text-align:center;">
                        <b>UNSED MEDICINE</b>
                        <p>Now a days many people got a lot of medicine wasted at their home as they dont need them any more.So either to waste it they can sell or donate according to their need.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div style="text-align:center"> 
                        <img class="card-img-top picad mt-2" src="pics/medbuy.jpg" alt="Card image cap">
                    </div>
                    <div class="card-body" style="text-align:center;">
                        <b>Buy/Sell</b>
                        <p>
                            Some people cant afford medicine due to the high price so they face many problem,through this website they can reach to people who provide them medicine at low rates.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div style="text-align:center">
                        <img class="card-img-top picad mt-2" src="pics/find.png" alt="Card image cap">
                    </div>
                    <div class="card-body" style="text-align:center;">
                        <b>Common Disease</b>
                        <p>
                            Now a days people cant find a person those are facing the same problem as they are facing so they cant share or get to know about effect through this site they can reach the people having same problem.
                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- services info -->
        <!-- //************************************************************************************************************** -->
        <div class="row" id="aboutus">
            <div class="col-md-12 bg-danger text-white">
                <center>
                    <h5>Meet The Developers</h5>
                </center>
            </div>
        </div> <!-- heading of meet the devlopers -->
        <!-- //************************************************************************************************************** -->
        <div class="row mt-3 mb-3">
            <div class="col-md-5 offset-md-1 mt-2">
                <div class="card">
                    <div class="col-md-12 bg-light">
                        <center>
                            <h6>Developer</h6>
                        </center>
                    </div>
                    <div style="text-align:center;"><img class="card-img-top picadd mt-3" src="pics/IMG_20201003_082919.jpg" style="border-radius:150%;" alt="Card image cap"></div>
                    <div class="card-body">
                        <p class="card-text"><b>Chiraag Garg</b> A second year student currently pursuing Bachelor of Technology in Information Technology at Panjab University in chandigarh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <p><b>Contact</b>:9803364000</p>
                        <p><b>Email Id</b>:gargchiraag04@gmail.com</p>
                    </div>
                </div>

            </div>
            <div class="col-md-5 mt-2">
                <div class="card">
                    <div class="col-md-12 bg-light">
                        <center>
                            <h6>Under the Guidence of</h6>
                        </center>
                    </div>
                    <div style="text-align:center;"><img class="card-img-top picadd mt-3" src="pics/rajeshsir.jpg" alt="Card image cap"></div>
                    <div class="card-body">
                        <p class="card-text"><b>Rajesh Bansal</b> A brilliant coder with
                            19 Years of experience in Training &amp; Development. Founder of realJavaOnline.com and also the author of book "Real Java".</p>
                        <p><b>Contact</b>:98722-46056</p>
                        <p><b>Email Id</b>:bcebti@gmail.com</p>
                    </div>
                </div>
            </div>
        </div><!-- meet developers -->
        <!-- //************************************************************************************************************* -->
        <div class="row">
            <div class="col-md-12 bg-danger text-white">
                <center>
                    <h5>Reach Us</h5>
                </center>
            </div>
        </div> <!-- heading of reach us -->
        <!-- ************************************************************************************************************** -->
        <div class="row" id="map">
            <div class="col-md-12 px-0"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8805713513293!2d74.95013941398938!3d30.211955917597148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1606913274379!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
        </div>
        <div class="modal" tabindex="-1" id="forsignup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Your Share People's Cares</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>User-Id</label>
                                <span id="erruid">*</span>
                                <span id="uidcheck">&nbsp;</span>
                                <input type="text" class="form-control" placeholder="Example123@xyz.com" name="email" id="email">
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <span id="errpass">*</span>
                                    <div style="border:1px solid lightgrey;"><input type="password" class="form-control" placeholder="********" id="password" name="password" style="max-width:95%;display:inline;border:0;"><i class="fa fa-eye" aria-hidden="true" id="passshow"></i></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <lable>Mobile Number</lable>
                                <span id="errmob">*</span>
                                <input type="text" placeholder="10 digit mobile number" class="form-control" id="mobile" name="mobile">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <span id="activity">&nbsp;</span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="signup">Sign up</button>
                    </div>
                </div>
            </div>
        </div> <!-- modal for sign up -->
        <!-- //============================================================================================================ -->
        <div class="modal" tabindex="-1" id="forlogin">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Your Share People's Cares</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <lable>User Id</lable>
                                <span id="lerruid">*</span>
                                <input class="form-control" type="text" id="lemail" name="lemail" placeholder="Example123@xyz.com">
                            </div>
                            <div class="form-group">
                                <lable>Password</lable>
                                <span id="lerrpass">*</span>
                                <input type="password" id="lpassword" name="lpassword" class="form-control" placeholder="********">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <span id="logincheck">&nbsp;</span>
                        <a data-toggle="modal" data-target="#forgotmodal" data-dismiss="modal"><span>Forgot Password?</span></a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="loginnow">Login</button>
                    </div>
                </div>
            </div>
        </div> <!-- modal for login  -->
        <!-- //================================================================================================================ -->
        <div class="modal" tabindex="-1" id="forgotmodal">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <span>Enter User Id</span>
            <input type="text" class="form-control" placeholder="example123@xyz.com" name="fuid" id="fuid">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="otp">Send Password on registerd mobile number</button>
      </div>
    </div>
  </div>
</div>
        <div class="row">
            <div class="col-md-12 bg-dark text-white">
                <center>&copy;rights reserved by banglore computer edu</center>
            </div>
        </div>
    </div>
</body>

</html>
