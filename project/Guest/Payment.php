<style>
    body{background: #f5f5f5}.rounded{border-radius: 1rem}.nav-pills .nav-link{color: #555}.nav-pills .nav-link.active{color: white}input[type="radio"]{margin-right: 5px}.bold{font-weight:bold}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<script>
   
   
    
   
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
        

       
      })
</script>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnconfirm"]))
{   $sel="select max(tutor_id) as id from tbl_tutor";
    $data=mysql_query($sel);
    $row=mysql_fetch_array($data);
    $update="insert into tbl_paymentrecords(tutor_id,payment_date)values('".$row["id"]."',curdate())";
    mysql_query($update);
    header("location:Loader.php")
?>

<?php
} 
if(isset($_POST["btnpay"]))
{
    $sel="select max(tutor_id) as id from tbl_tutor";
    $data=mysql_query($sel);
    $row=mysql_fetch_array($data);
    $update="insert into tbl_paymentrecords(tutor_id,payment_date)values('".$row["id"]."',curdate())";
    mysql_query($update);
	if($_POST["bank"]=="sbi")
    {	
    
		
    ?>
<script>
    window.location="https://www.onlinesbi.sbi/";
</script>
<?php
    }
    else{
        ?>
        <script>
            window.location="https://infinity.icicibank.com/corp/AuthenticationController?FORMSGROUP_ID__=AuthenticationFG&__START_TRAN_FLAG__=Y&FG_BUTTONS__=LOAD&ACTION.LOAD=Y&AuthenticationFG.LOGIN_FLAG=1&BANK_ID=ICI&ITM=nli_cms_IB_internetbanking_login_btn&_gl=1*18v3v5t*_ga*NDQ5MDk5NTkyLjE2NTE2NTQ0NTY.*_ga_SKB78GHTFV*MTY1MjE1OTY1My44NS4xLjE2NTIxNjYzMDAuNTc.&_ga=2.246361924.1562353589.1697192402-253888379.1697192402";
        </script>
        <?php
    }

}
if(isset($_POST["btnc"]))
{
    $sel="select max(tutor_id) as id from tbl_tutor";
    $data=mysql_query($sel);
    $row=mysql_fetch_array($data);
    $update="insert into tbl_paymentrecords(tutor_id,payment_date)values('".$row["id"]."',curdate())";
    mysql_query($update);
    ?>
<script>
location.href="https://www.paypal.com/signin";
</script>
<?php

}

?>
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">Payment GateWay</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form role="form" method="post">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name"  class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" required="required" autocomplete="off" placeholder="XXXX XXXX XXXX XXXX"    title="Enter Correct Card Number"  maxlength="19" name="txtacno" id="s placeholder="Valid card number" class="form-control">
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="expname" class="form-control" max="12" > <input type="number" placeholder="YY" name="expname" class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text"  class="form-control" name="cvv" data-mask="000" placeholder="000" required="required" autocomplete="off" placeholder="XXX" pattern="[0-9]{3,3}" title="Enter Correct CCV" minlength="3" maxlength="3"> </div>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm" name="btnconfirm"> Confirm Payment </button>
                            
                        </div>
                    </div> <!-- End -->
                    <!-- Paypal info -->
                    <div id="paypal" class="tab-pane fade pt-3">
                        <h6 class="pb-2">Select your paypal account type</h6>
                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                        <p> <button type="submit" class="btn btn-primary " name="btnc"><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- bank transfer info -->
                    <div id="net-banking" class="tab-pane fade pt-3">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Select your Bank</h6>
                            </label> <select class="form-control" id="ccmonth" name="bank">
                                <option value="" selected disabled>--Please select your Bank--</option>
                                <option value="sbi">SBI</option>
                                <option value="ic">ICICI</option>
                               
                            </select> </div>
                        <div class="form-group">
                            <p> <button type="submit" class="btn btn-primary" name="btnpay"><i class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                        </div>
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
    </form>