<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <script src="jsfile/angular.min.js"></script>
    <style>
        .container{
            max-width: 100%;
        }
        a:hover{
            text-decoration: none;
            color: black;
        }
        a{
            color: black;
        }
        body{
            background-color: lightgray;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
       <div class="row">
           <div class="col-md-12 bg-danger text-white">
               <center><h3>Admin</h3></center>
           </div>
       </div>
        <div class="row mt-4">
            <div class="col-md-4 mt-2" >
                <a href="user-manager-fetch-all.php" target="_blank">
                    <div class="card">
                    <center> <img src="pics/profile.jpg" class="card-img-top mt-3" alt="..." style="width:150px;height:150px;border-radius:150px;"></center>
                    <div class="card-body">
                        <p class="card-text">See all users</p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
