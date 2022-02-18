<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <script src="jsfile/angular.min.js"></script>
    <link rel="stylesheet" href="../care_all/style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Finding Common Patient</title>
    <style>
        .container{
            max-width: 100%;
        }
        body{
            background-color: #EDF5E1;
        }
    </style>
    <script>
    var mod=angular.module("kuchbhi",[]);
        mod.controller("koibhi",function($scope,$http){
            $scope.JSONcategoryarray=[];
            $scope.JSONdiseasearray=[];
            $scope.JSONarray=[];
            $scope.fecthcategory=function()
            {
                var url="fetch-category-disease.php";
                $http.get(url).then(ok,notok);
                function ok(response)
                {
                    $scope.JSONcategoryarray=response.data;
                }
                function notok(error)
                {
                    alert(error.data);
                }
            }
            $scope.finddisease=function()
            {
//                alert($scope.category.category);
                var category=$scope.categoryobj.category
                var url="fetch-common-diseases.php?category="+category;
                $http.get(url).then(ok,notok);
                function ok(response)
                {
                    $scope.JSONdiseasearray=response.data;
                }
                function notok(error)
                {
                    alert(error.data);
                }
            }
            $scope.printtable=function()
            {
                var category=$scope.categoryobj.category;
                var disease=$scope.diseaseobj.disease;
                var url="fetch-common-user.php?category="+category+"&disease="+disease;
                $http.get(url).then(ok,notok);
                function ok(response)
                {
                    $scope.JSONarray=response.data;
                }
                function notok(error)
                {
                    alert(error.data);
                }
            }
        });
    </script>
</head>
<body ng-app="kuchbhi" ng-controller="koibhi" ng-init="fecthcategory();">
    <form>
        <div class="container">
        <div class="row bg-danger text-white">
            <div class="col-md-12"><center><h3>Common Patient Find &nbsp;<i class="fa fa-users" aria-hidden="true"></i></h3></center></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 form-group">
                <label for="Select Category">Select Category</label>
                <select name="" id="" class="form-control" ng-model="categoryobj" ng-options="obj.category for obj in JSONcategoryarray" ng-change="finddisease();">
                    <option value="" selected="selected" hidden>Select</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="Select Category">Select Disease</label>
                <select name="" id="" class="form-control" ng-model="diseaseobj" ng-options="obj.disease for obj in JSONdiseasearray">
                    <option value="" selected="selected" hidden>Select</option>
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <center>
                    <input type="button" class="btn btn-primary" value="Search Patient" ng-click="printtable();">
                </center>
            </div>
        </div>
        <div class="row mt-5" >
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-dark" style="overflow-x:auto;overflow-y:auto;">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Symptoms</th>
      <th scope="col">Recomendation</th>
      <th scope="col">Suggestion</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="obj in JSONarray">
      <th scope="row">{{$index+1}}</th>
      <td>{{obj.uid}}</td>
      <td>{{obj.symptoms}}</td>
      <td>{{obj.recommendations}}</td>
      <td>{{obj.suggestions}}</td>
      </tr>
      <tr>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>