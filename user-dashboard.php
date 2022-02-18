<?php session_start(); 
if(!isset($_SESSION["activeuser"]))
    header("location:index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../care_all/style/bootstrap.min.css">
    <link rel="stylesheet" href="style/user-dashboard.css">
    <title>We Care</title>
</head>

<body bg-color="pink">
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-danger text-white">
                <span>
                   Welcom: <b><?php echo $_SESSION['activeuser']; ?></b>
                    <center>
                        <h1>People Care's By Your Share</h1>
                    </center>
                </span>
            </div>
        </div>  <!-- heading -->
        <div class="row mt-4">
            <div class="col-md-3 mt-2">
               <a href="user-profile-front.php">
                <div class="card">
                    <center><img src="../care_all/pics/profile.jpg" class="mt-2" width="150" height="100" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">See About yourself</p>
                    </div>
                </div>
                </a>
            </div> <!-- profile -->
            <div class="col-md-3 mt-2">
               <a href="medicals-details.php">
                <div class="card">
                    <center><img src="../care_all/pics/Organ-donation-hands-and-heart.jpg" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Unused Medicine</h5>
                        <p class="card-text">Upload Unused Medicine</p>
                    </div>
                </div>
                </a>
            </div>  <!-- Upload Unused Medicine -->
            <div class="col-md-3 mt-2">
               <a href="med-manager-front.php">
                <div class="card">
                   <center> <img src="../care_all/pics/medicine%20manager.jpg" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Manage Medicine</h5>
                        <p class="card-text">Update about your medicine</p>
                    </div>
                </div>
                </a>
            </div>  <!-- Update about your medicine -->
            <div class="col-md-3 mt-2">
               <a href="med-buy-front.php">
                <div class="card">
                    <center><img src="../care_all/pics/medbuy.jpg" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Buy Medicine</h5>
                        <p class="card-text">Buy the required Medicine</p>
                    </div>
                    
                </div>
                </a>
            </div>  <!-- Buy the required Medicine -->
            
        </div>    <!-- the first four card -->
        <div class="row mt-4">
                <div class="col-md-3 offset-md-2 mt-2">
                <a href="share-disease.php">
                <div class="card">
                    <center><img src="../care_all/pics/postdisease.png" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Post Disease</h5>
                        <p class="card-text">Share about your disease</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 mt-2">
               <a href="disease-search.php">
                <div class="card">
                    <center><img src="../care_all/pics/find.png" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Common Patient</h5>
                        <p class="card-text">Search Patient</p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 mt-2">
               <a href="logout.php">
                <div class="card">
                    <center><img src="../care_all/pics/exit.png" width="150" height="100" class="mt-2" alt="..."></center>
                    <div class="card-body">
                        <h5 class="card-title">Exit</h5>
                        <p class="card-text">Be safe Be happy</p>
                        </div>
                </div>
                </a>
            </div>
        </div>     <!-- the next three card -->
    </div> 
</body>

</html>
