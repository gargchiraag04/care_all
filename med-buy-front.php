<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <script src="jsfile/angular.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <title>Medicine Buy</title>
    <style>
        .container {
            max-width: 100%;
        }

        body {
            background-color: #EDF5E1;
        }

    </style>
    <script>
        var mod = angular.module("kuchbhi", []);
        mod.controller("koibhi", function($scope, $http) {
            $scope.jsonarr=[];
            $scope.medarr=[];
            $scope.arrprovider;
            $scope.medprovider=[];
        $scope.fetchcity=function()
        {
            var url="cityfetch.php";
            $http.get(url).then(ok,notok);
            function ok(response)
            {
                $scope.jsonarr=response.data;
//                alert("ok");
            }
            function notok(response)
            {
                alert(response.data);
            }
        }
        $scope.medfetch=function(){
            var url="med-fetch-related-to-city.php?city="+$scope.selcity.city;
            $http.get(url).then(ok,notok);
            function ok(response)
            {
                if(response.data=="")
                    {
                        alert("Cureently No Medicine is Avaliable in this city");
                        $scope.medarr="";
                    }
                else{
                    $scope.medarr=response.data;
                }
            }
            function notok(response)
            {
                alert(response.data);
            }
        }
        $scope.card_banao=function()
        {
            var city=$scope.selcity.city;
            var med=$scope.medname.medname;
//            alert(city+" "+med);
            $http.get("cardshow.php?city="+ city + " &med=" + med).then(ok,notok);
            function ok(response)
            {
//                alert(response.data[0].uid);
                $scope.arrprovider=response.data;
            }
            function notok(response)
            {
                alert(response.data);
            }
        }
        $scope.showPersonInModal=function(uid)
        {
            var id=uid;
            var url="person-detail-fetch.php?uid="+id;
            $http.get(url).then(ok,notok);
            function ok(response)
            {
//                alert(response.data[0].uname);
                $scope.medprovider=response.data;
            }
            function notok(error)
            {
                alert(error)
            }
        }
        });

    </script>
</head>

<body ng-app="kuchbhi" ng-controller="koibhi" ng-init="fetchcity();">
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-danger text-white">
                <center>
                    <h1>Medicine Buy</h1>
                </center>
            </div>
        </div>
        <div class="row mt-3">
            <div class="offset-md-4 col-md-4 form-group">
                <label for="Select City">Select City</label>
                <select class="form-control" ng-model="selcity" ng-options="obj.city for obj in jsonarr" ng-change="medfetch();">
                    <option value="" selected="selected" hidden></option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="offset-md-4 col-md-4 form-group">
                <label for="medavaliable">Medicine Avaliable</label>
                <select class="form-control" ng-model="medname" ng-options="obj.medname for obj in medarr">
                    <option value="" selected="selected" hidden></option>
                </select>
            </div>
            <div class="col-md-4" style="display:none">
                <label>&nbsp;</label>
                <div><input type="radio" class="radio-inline" value="Donate" name="sell">Donate
                <input type="radio" class="radio-inline" value="Sell" name="sell" checked>Sell</div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <center>
                    <input type="button" value="Fetch Data" class="btn-primary" ng-click="card_banao();">
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-2" ng-repeat="obj in arrprovider">
  <div class="card" >
                    
                    <div class="card-body">
                        <h5 class="card-title">{{obj.medname}}</h5>
                        <p class="card-text">
                           Company: {{obj.company}}
                        </p>
                        <p class="card-text">
                           Expiry Date: {{obj.expdate}}
                        </p>
                        <p class="card-text">
                           Price: {{obj.price}}
                        </p>
                        <p class="card-text">
                           Offer Price: {{obj.oprice}}
                        </p>
                        <button class="btn btn-primary" ng-click=showPersonInModal(obj.uid); data-toggle="modal" data-target="#conper">Conatct the Person here</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Scrollable modal -->
<div class="modal" tabindex="-1" id="conper">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Person Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" readonly value={{medprovider[0].uname}}>
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" class="form-control" readonly value="{{medprovider[0].contact}}">
        </div>
      </div>
      <div class="modal-footer bg-danger text-white">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</body>

</html>
