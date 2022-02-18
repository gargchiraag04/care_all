<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jsfile/jquery-1.8.2.min.js"></script>
    <script src="jsfile/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    $(document).ready(function(){
        var medname=0; //in this we are using as jasoos if it is blank then medicine will not be posted
        var company=0; //in this we are using as jasoos if it is blank then medicine will not be posted
        var quantity=0; //in this we are using as jasoos if it is blank then medicine will not be posted
        var price=0;  //comparing mrp and offer price;
        
        $("#sell").change(function(){
            var what=$(this).val();
            
            if(what=="sell")
                {
                    $("#ifsell").css("display","block");
                }
            else{
                $("#ifsell").css("display","none");
            }
        });
        $("#oprice").blur(function(){
           var mrp=$("#mrp").val();
                    var offerprice=$("#oprice").val();
                    if(offerprice>mrp)
                      {
                         price=0;
                       }
                       else{
                             price=1;
                          } 
        });
//=======================================================
        $("#medicinename").blur(function(){
           var medvalue=$("#medicinename").val();
            if(medvalue=="")
                {
                    medname=0;
                }
            else{
                medname=1;
            }
        });
        $("#company").blur(function(){
           var comvalue=$("#company").val();
            if(comvalue=="")
                {
                    company=0;
                }
            else{
                company=1;
            }
        });
        $("#qty").blur(function(){
           var qtyvalue=$("#qty").val();
            if(qtyvalue=="")
                {
                    quantity=0;
                }
            else{
                quantity=1;
            }
        });
        
        //========================================================
                $("#postnow").click(function(){
//            alert("connected!!!!!");
                var querystring=$("#med").serialize();
                alert(querystring);        //this show the value that are passed in form of a string
                    if(medname==1 && company==1 && quantity==1 &&price==1)
            {
                $.get("ajax-medicines.php?"+ querystring,function(response){
                    if(response==1)
                        {
                            alert("Posted!!!!!!");
                        }
                    else{
                        alert(response);
                        }
                });
            }
                    else{
            alert("Enter Correct Details");
        }
            });   //when the value are filled 
        
    });
    </script>
    <style>
        body{
           background-color: #EDF5E1;        }
        .container{
            max-width: 100%; 
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
         margin: 0;
}
    </style>
    <title>Medicine Details</title>
</head>
<body>
    <div class="container">
       <div class="row bg-danger text-white">
           <div class="col-md-12 ">
               <center>
                   <h2><span>Medicine Details <i class="fa fa-medkit" aria-hidden="true"></i></span></h2>
               </center>
           </div>
       </div> <!-- heading -->
       <!-- //=================================================================================================== -->
       <form id="med">
        <div class="row">
            <div class="col-md-6 form-group">
                <lable>Uid</lable>
                <input type="text" name="uid" id="uid" readonly value="<?php echo $_SESSION["activeuser"]; ?>" class="form-control">
            </div>
        </div>  <!-- user id -->
        <!-- //=================================================================================================== -->
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Medicine Name</lable>
                <input type="text" class="form-control" id="medicinename" name="medicinename">
            </div>
            <div class="col-md-4 form-group">
                <lable>Company</lable>
                <input type="text" class="form-control" id="company" name="company">
            </div>
        </div>   <!-- medicine name and company -->
        <!-- //==================================================================================================== -->
        <div class="row">
            <div class="col-md-4 form-group">
                <lable>Expiery Date</lable>
                <input type="date" name="expdate" id="expdate" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <lable>Qty</lable>
                <input type="number" id="qty" name="qty" class="form-control">
            </div>
            <div class="col-md-3 form-group">
                <lable>&nbsp;</lable>
                <select name="type" id="type" class="form-control">
                    <option value="none">Tablets/Strips</option>
                    <option value="tablet">Tablets</option>
                    <option value="strips">Strips</option>
                    <option value="Liquid">Bottle</option>
                </select>
            </div>
        </div>    <!-- exp. date qty and type(kya hai tablets ja strips) -->
        <!-- //======================================================================================================== -->
        <div class="row">
            <div class="col-md-12 form-group">
                <center>
                     <lable>&nbsp;</lable>
                      <select name="sell" id="sell" class="form-control col-md-3">
                          <option value="none">Donate/Sell</option>
                          <option value="donate">Donate</option>
                          <option value="sell">Sell</option>
                      </select>
                </center>
            </div>
        </div>    <!-- donate or sell your medicine -->
        <!-- //======================================================================================================== -->
        <div id="ifsell" style="display:none">
            <div class="row">
            <div class="col-md-4 form-group">
            <lable>
                Price(MRP)
            </lable>
            <input type="number" value="0.0" id="mrp" name="mrp" class="form-control">
            </div>
            <div class="col-md-4 form-group">
            <lable>
                Offered Price
            </lable>
            <input type="number" value="0.0" id="oprice" name="oprice" class="form-control">
            </div>
        </div>   <!-- Price and offered price -->
        <!-- //========================================================================================================== -->
        <div class="row">
            <div class="col-md-12">
                <center><lable>
                    Mode Of Payment
                    <input type="radio" name="mode" value="n/a" checked style="display:none;">
                    <input type="radio" name="mode" class="radio-inline" value="cash">CASH 
                <input type="radio" name="mode" class="radio-inline" value="netbanking">Netbanking
                <input type="radio" name="mode" class="radio-inline" value="paytm">Paytm
                <input type="radio" name="mode" class="radio-inline" value="Any" checked>Any
                    <br>
                </lable></center>
                
            </div>
        </div>   <!-- mode of payment -->
        <!-- //========================================================================================================= -->
        </div>   <!-- selling mart -->
        <div class="row mt-2">
            <div class="col-md-12">
                <center>
                    <input type="button" class="col-md-2 btn-primary" value="Post" id="postnow">
                </center>
            </div>
        </div>  <!-- button -->
        </form>
    </div>  
</body>
</html>