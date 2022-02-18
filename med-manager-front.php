<?php session_start(); ?>
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
        .container {
            max-width: 100%;
        }

        body {
            background-color: lightgray;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;

    </style>
    <script>
        $(document).ready(function() {
            $("#fetch").click(function() {
                $("#tabledata").css("display", "block");
            });
            //**************************************************************************************
        });

    </script>  <!-- jquery -->
    <script>
        var modulebnya = angular.module("anyname", []);
        modulebnya.controller("kuchbhi", function($scope, $http) {
            $scope.dataarray;
            $scope.uid="<?php echo $_SESSION["activeuser"]; ?>";
            $scope.fetchdata = function() {
                //                alert($scope.userid);
                $http.get("med-manager-process.php?userid=" + $scope.uid).then(ok, notok);

                function ok(response) {
                    $scope.dataarray = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }

            }


            $scope.deletedata = function(rid) {
                $http.get("delete-med.php?regid=" + rid).then(ok, notok);

                function ok(response) {
                    alert(response.data);
                    $scope.fetchdata();
                }

                function notok(response) {
                    alert(response.data);
                    $scope.fetchdata();
                }
            }
            $scope.updatecall=function(rid){
                $http.get("fetching-data-MedData-using-rid.php?rid="+rid).then(ok,notok);
                function ok(response)
                {
                    $("#rid").val(response.data[0].rid);
                    $("#medname").val(response.data[0].medname);
                    $("#company").val(response.data[0].company);
                    $("#exp").val(response.data[0].expdate);
                    $("#qty").val(response.data[0].qty);
                    $("#type").val(response.data[0].type);
                    $("#opt").val(response.data[0].options);
                    $("#mrp").val(response.data[0].price);
                    $("#oprice").val(response.data[0].oprice);
                    $("#sell").val(response.data[0].mode);
                }
                function notok(response)
                {
                    alert(response.data);
                }
            }
            $scope.updatemedcall=function(){
                var rid=$("#rid").val();
                $scope.stringify=$("#medicineupdation").serialize();
//                alert($scope.stringify );
                $http.get("update-medicine-by-user.php?rid="+rid+"&"+$scope.stringify).then(ok,notok);
                function ok(response)
                {
                    alert(response.data);
//                    $("#MyModal").modal("none");

                    $scope.fetchdata(); 
                }
                function notok(response)
                {
                    alert(response.data);
                }
            }
        });

    </script>  <!-- angular java script -->
    <title>Medicine Manager</title>
</head>

<body ng-app="anyname" ng-controller="kuchbhi">
    <form>
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-danger text-white">
                    <center>
                        <h1>Medicine Manager</h1>
                    </center>
                </div>
            </div>  <!-- heading -->
            <!-- ****************************************************************************************************** -->
            <div class="row mt-3">
                <div class="form-group col-md-8">
                    <lable>Uid</lable>
                    <input type="text" class="form-control" readonly ng-model="uid">
                </div>
                <div class="col-md-2 form-group">
                    <lable>&nbsp;</lable>
                    <input type="button" value="Fetch Uid Medicines" class="form-control btn btn-primary" id="fetch" ng-click="fetchdata()">
                </div>
            </div>  <!-- uid input and fetch data button -->
            <!-- ********************************************************************************************************** -->
            <div class="row" id="tabledata" style="display:none;">
                <div class="col-md-12">
                    <center>
                        <div class="table-responsive">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Rid</th>
                                        <th scope="col">Medicine Name</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Donate/Sell</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Delete</th>
                                        <th scope="col">Update</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr ng-repeat="obj in dataarray">
                                        <td>{{obj.rid}}</td>
                                        <td>{{obj.medname}}</td>
                                        <td>{{obj.company}}</td>
                                        <td>{{obj.expdate}}</td>
                                        <td>{{obj.qty}}</td>
                                        <td>{{obj.type}}</td>
                                        <td>{{obj.options}}</td>
                                        <td>{{obj.price}}</td>
                                        <td><input type="button" value="UnShare" ng-click="deletedata(obj.rid);"></td>
                                        <td><input type="button" value="Update" data-toggle="modal" data-target="#updatealert" ng-click="updatecall(obj.rid);"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>   <!-- its table data -->
                    </center>
                </div>
            </div>  <!-- table -->
            <!-- ********************************************************************************************************** -->
        </div> 
    </form>
    <form id="medicineupdation" method="GET">
        <div class="modal " tabindex="-1" id="updatealert" id="MyModal" >
  <div class="modal-dialog modal-dialog-scrollable " id="medicineupdation">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Medicine Updation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:lightgray" >
            <div class="form-group">
            <label>Rid</label>
            <input type="text" class="form-control" id="rid" name="rid" disabled>
        </div>
        <div class="form-group">
            <label>Medicine Name</label>
            <input type="text" class="form-control" id="medname" name="medname">
        </div>
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" id="company" name="company">
        </div>
        <div class="form-group">
            <label>Expiry Date</label>
            <input type="date" class="form-control" id="exp" name="exp">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" min="0">
        </div>
         <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>
        <div class="form-group">
            <label>Donate/Sell</label>
            <input type="text" class="form-control" id="opt" name="opt">
        </div>
        <div class="form-group">
            <label>MRP</label>
            <input type="text" class="form-control" id="mrp" name="mrp">
        </div>
        <div class="form-group">
            <label>Offer Price</label>
            <input type="text" class="form-control" id="oprice" name="oprice">
        </div>
        <div class="form-group">
            <label>PaymentOption</label>
            <input type="text" class="form-control" id="sell" name="sell">
        </div>
      </div>
      <div class="modal-footer bg-danger">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <input type="button" class="btn btn-primary" ng-click="updatemedcall();" value="Save changes">
      </div>
    </div>
  </div>
</div> 
  <!-- modal for update -->
    </form>
</body>

</html>
