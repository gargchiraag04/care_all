<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <title>Share Disease</title>
    <style>
        .container {
            max-width: 100%;
        }

        body {
            background-color: lightgray;
        }

    </style>
    <script>
        $(document).ready(function() {
            $("#picapprove").click(function() {
                $("#picfile").css("display", "block");
            }); //here we are seeing if something is click as respond to pic file upload will appear or not
            $("#picno").click(function() {
                $("#picfile").css("display", "none");
            }); //here we are seeing if something is click as respond to pic file upload will appear or not
//            $("#share").click(function() {
//                var stringify = $("#shareinfo").serialize();
//                alert(stringify);
//                $.get("share-disease-process.php?" + stringify, function(response) {
//                    if (response == 1) {
//                        alert("posted");
//                    } else {
//                        alert(response);
//                    }
//                });
//            });
//            
            
            
        });

    </script>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12 bg-danger text-white">
                <center>
                    <h1>Share Disease Info</h1>
                </center>
            </div>
        </div> <!-- heading -->
        <!-- //=============================================================================================================== -->
        <form id="shareinfo" method="post" enctype="multipart/form-data" action="share-disease-process.php">
            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <lable>Uid</lable>
                    <input type="text" id="uid" name="uid" value="<?php  echo $_SESSION["activeuser"] ?>" readonly class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <lable>
                        Category
                    </lable>
                    <select size="1" name="category" id="category" class="form-control">

                        <option value="none" selected>Select</option>
                        <option value="ANAESTHESIA">ANAESTHESIA</option>

                        <option value="ANATOMY">ANATOMY</option>

                        <option value="CARDIOLOGY">CARDIOLOGY</option>

                        <option value="ENDOCRINOLOGY">ENDOCRINOLOGY</option>

                        <option value="GASTROENTEROLOGY">GASTROENTEROLOGY</option>

                        <option value="NEPHROLOGY">NEPHROLOGY</option>

                        <option value="NEUROLOGY">NEUROLOGY</option>

                        <option value="NEUROSURGERY">NEUROSURGERY</option>

                        <option value="GYNE">OBS &amp; GYNE</option>

                        <option value="OPHTHALMOLOGY">OPHTHALMOLOGY</option>

                        <option value="DENTAL">ORAL HEALTH SCIENCES (DENTAL)</option>

                        <option value="ORTHOPAEDICS">ORTHOPAEDICS</option>

                        <option value="ENT">OTOLARYNGOLOGY (ENT)</option>

                        <option value="drugs remove">PHYSICAL AND REHABILITATION MEDICINE</option>

                        <option value="d46">UROLOGY</option>
                    </select>
                </div>
            </div> <!-- uid and category  -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-6 form-group">
                    <lable>Disease Name</lable>
                    <input type="text" id="dname" name="dname" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <lable>Contact Me</lable>
                    <div class="form-control" style="background-color:transparent;">
                        <input type="radio" value="no" name="contact" checked>NO &nbsp;&nbsp;&nbsp;
                        <input type="radio" value="yes" name="contact">Yes
                    </div>
                </div>
            </div> <!-- disease name  and contact me -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-12 form-group">
                    <lable>Symptoms/Problems</lable>
                    <textarea class="form-control" id="symptoms" name="symptoms">

                </textarea>
                </div>
            </div> <!-- in this there is a text area for symptoms -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-12 form-group">
                    <lable>Recommended Doctor with Full info</lable>
                    <textarea class="form-control" id="recomendation" name="recommendation">

                </textarea>
                </div>
            </div> <!-- in this there is a text area for recomendation -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-12 form-group">
                    <lable>Suggestion</lable>
                    <textarea class="form-control" id="suggestion" name="suggestion">

                </textarea>
                </div>
            </div> <!-- in this there is a text area for suggestion -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <lable>Want to upload picture(Any)</lable>
                        <input type="radio" name="pic" value="Yes" id="picapprove">Yes
                        <input type="radio" name="pic" value="No" id="picno" checked>No
                    </center>
                </div>
            </div> <!-- pic accept or not -->
            <!-- //=============================================================================================================== -->
            <div class="row">
                <div class="col-md-12" id="picfile" style="display:none;">
                    <center>
                        <input type="file" name="ppic1" accept="image/jpeg">
                        <input type="file" name="ppic2" accept="image/jpeg">
                    </center>
                </div>
            </div> <!-- pic upload -->
            <!-- //=============================================================================================================== -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <center>
                        <input type="submit" value="share" id="share" name="share" class="btn btn-primary">
                    </center>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
