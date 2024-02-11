<?php
	session_start();
	$no=rand();
	$d=date('Y-m-d');
	include("../assets/Connection/Connection.php");
	$sel="select * from tbl_parent where parent_id='".$_SESSION["pid"]."'";
	$row=mysql_query($sel);
	$data=mysql_fetch_array($row);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
<div class="row" id="pri">
  <div class="col-sm-12">
	  	<div class="panel panel-default invoice" id="invoice">
		  <div class="panel-body">
			<div class="invoice-ribbon"><div class="ribbon-inner">PAID</div></div>
		    <div class="row" >

				<div class="col-sm-6 top-left">
					<i class="fa fa-rocket"></i>
				</div>

				<div class="col-sm-6 top-right">
						<h3 class="marginright">INVOICE-<?php echo $no?></h3>
						<span class="marginright"><?php echo $d?></span>
			    </div>

			</div>
			<hr>
			<div class="row">

				<div class="col-xs-4 from">
					<p class="lead marginbottom">From :Educenter</p>
					<p>Education center </p>
					<p>Ground floor,Haritha Rd </p>
					<p>Kochi,682001</p>
					<p>Phone: 9946996880</p>
					<p>Email: educenter014@gmail.com</p>
				</div>

				<div class="col-xs-4 to">
					<p class="lead marginbottom">To : <?php echo $data["parent_name"]?></p>
					<p><?php echo $data["user_address"]?></p>
					
					<p>Phone: <?php echo $data["parent_contact"]?></p>
					<p>Email: <?php echo $data["parent_email"]?></p>

			    </div>

			    

			</div>

			<div class="row table-row">
				<table class="table table-striped">
			      <thead>
			        <tr>
			          <th class="text-center" style="width:5%">#</th>
			          <th style="width:50%">Subject</th>
			          <th class="text-right" style="width:15%">Class </th>
			          <th class="text-right" style="width:15%">Board</th>
					  <th class="text-right" style="width:15%">Rate</th>
			          <th class="text-right" style="width:15%">Total Price</th>
			        </tr>
			      </thead>
			      <tbody>
					<?php
					$i=0;
					$tot=0;
					$selb="select * from tbl_cart c inner join tbl_booking  b on b.booking_id=c.booking_id inner join tbl_tutorsubjects ts on ts.tutorsubject_id=c.tutorsubject_id inner join tbl_subject s on s.subject_id=ts.subject_id inner join tbl_board bd on bd.board_id=s.board_id inner join tbl_class cs on cs.class_id=s.class_id where b.booking_id='".$_SESSION["bids"]."'";
					$rows=mysql_query($selb);
					while($dats=mysql_fetch_array($rows))
					{
						$i++;
					?>
			        <tr>
			          <td class="text-center"><?php echo $i?></td>
			          <td><?php echo $dats["subject_name"]?></td>
			          <td class="text-right"><?php echo $dats["class_name"]?></td>
			          <td class="text-right"><?php echo $dats["board_name"]?></td>
					  <td class="text-right"><?php echo $dats["subject_rate"]?></td>
			          <td class="text-right"><?php echo $dats["subject_rate"]?></td>
			      <?php  $tot=$tot+$dats["subject_rate"]  ?>
					</tr>
			       <?php
					}
				   ?>
			       </tbody>
			    </table>

			</div>

			<div class="row">
			<div class="col-xs-6 margintop">
				<p class="lead marginbottom">THANK YOU!</p>

				<button class="btn btn-success" id="invoice-print" onclick="printDiv('pri')"><i class="fa fa-print"></i> Print Invoice</button>
				
			</div>
			<div class="col-xs-6 text-right pull-right invoice-total">
					  
			          <p>Total :<?php echo $tot ?></p>
			</div>
			</div>

		  </div>
		</div>
	</div>
</div>
</div>

<style type="text/css">
body{margin-top:20px;
background:#eee;
}

/Invoice/
.invoice .top-left {
    font-size:65px;
	color:#3ba0ff;
}

.invoice .top-right {
	text-align:right;
	padding-right:20px;
}

.invoice .table-row {
	margin-left:-15px;
	margin-right:-15px;
	margin-top:25px;
}

.invoice .payment-info {
	font-weight:500;
}

.invoice .table-row .table>thead {
	border-top:1px solid #ddd;
}

.invoice .table-row .table>thead>tr>th {
	border-bottom:none;
}

.invoice .table>tbody>tr>td {
	padding:8px 20px;
}

.invoice .invoice-total {
	margin-right:-10px;
	font-size:16px;
}

.invoice .last-row {
	border-bottom:1px solid #ddd;
}

.invoice-ribbon {
	width:85px;
	height:88px;
	overflow:hidden;
	position:absolute;
	top:-1px;
	right:14px;
}

.ribbon-inner {
	text-align:center;
	-webkit-transform:rotate(45deg);
	-moz-transform:rotate(45deg);
	-ms-transform:rotate(45deg);
	-o-transform:rotate(45deg);
	position:relative;
	padding:7px 0;
	left:-5px;
	top:11px;
	width:120px;
	background-color:#66c591;
	font-size:15px;
	color:#fff;
}

.ribbon-inner:before,.ribbon-inner:after {
	content:"";
	position:absolute;
}

.ribbon-inner:before {
	left:0;
}

.ribbon-inner:after {
	right:0;
}

@media(max-width:575px) {
	.invoice .top-left,.invoice .top-right,.invoice .payment-details {
		text-align:center;
	}

	.invoice .from,.invoice .to,.invoice .payment-details {
		float:none;
		width:100%;
		text-align:center;
		margin-bottom:25px;
	}

	.invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
		font-size:22px;
	}

	.invoice .btn {
		margin-top:10px;
	}
}

@media print {
	.invoice {
		width:900px;
		height:800px;
	}
}
</style>

<script type="text/javascript">

</script>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>