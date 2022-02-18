<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <script src="jsfile/angular.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <style>
        body {
            background-color: lightgray;
        }

        .container {
            max-width: 100%;
        }
        .red
        {
            background-color: lightcoral;
        }
        .green{
            background-color: lightgreen;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;

    </style>
    <script>
        var newmodule = angular.module("anyname", []);
        newmodule.controller("anything", function($scope, $http) {
            $scope.dataarraymein;
            $scope.fetchdata = function() {
                //                alert("connected ");

                var url = "user-manager.php";
                $http.get(url).then(ok, notok);

                function ok(response) {
                    //                    alert(JSON.str ingify(response.data)); //to alert data in string form
                    $scope.dataarraymein = response.data;
                }

                function notok(error) {
                    alert(error.data);
                }
            }   //here we are fetching data from backend and storing it in the array
            $scope.block=function(uid)
            {
                $http.get("block-user-by-admin.php?uid="+uid).then(ok,notok);
                function ok(response)
                {
                    alert(response.data);
                    $scope.fetchdata();
                }
                function notok(error)
                {
                    alert(error.data);
                }
            }  // here we are blocking user by making his status as 0 from 1
            $scope.resume=function(uid)
            {
                $http.get("resume-user-by-admin.php?uid="+uid).then(ok,notok);
                function ok(response)
                {
                    alert(response.data);
                    $scope.fetchdata();
                }
                function notok(error)
                {
                    alert(error.data);
                }
            }
            $scope.delete=function(uid)
            {
                $http.get("delete-user-by-admin.php?uid="+uid).then(ok,notok);
                function ok(response)
                {
                    alert(response.data);
                    $scope.fetchdata();
                }
                function notok(response)
                {
                    alert(response.data);
                }
            }
        });

    </script>
    <title>Document</title>
</head>

<body ng-app="anyname" ng-controller="anything">
    <div class="container">
        <div class="row mt-1 bg-danger text-white">
            <div class="col-md-12">
                <center>
                    <h1>User Manager</h1><input type="button" value="Fetch Data" ng-click="fetchdata();" class="btn btn-primary mb-3">
                </center>
            </div>

        </div> <!-- heading -->
        <!-- ************************************************************************************** -->
        <div class="row mt-2">
            <div class="col-md-12" style="overflow-x:auto;overflow-y:auto;">
                <center>
                    <table border="1" cellpadding="5">
                        <tr>
                            <th>S.No</th>
                            <th>Uid</th>
                            <th>Password</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Operations</th>
                        </tr> <!-- heading -->
                        <tr ng-repeat="obj in dataarraymein" class="{{ obj.status==0?'red':'green'}}">
                            <td>{{$index+1}}</td>
                            <td>{{obj.uid}}</td>
                            <td>{{obj.pwd}}</td>
                            <td>{{obj.mobile}}</td>
                            <td>{{obj.status}}</td>
                            <td>
                                <input type="button" value="Delete" ng-click="delete(obj.uid)";>
                                <input type="button" value="Block" ng-click="block(obj.uid);">
                                <input type="button" value="Resume" ng-click="resume(obj.uid);">
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>

</body>

</html>
