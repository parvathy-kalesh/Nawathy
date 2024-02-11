<?php
include("../assets/connection/connection.php");
session_start();
if(isset($_POST['btn_login']))
{
	$email=$_POST['txt_email'];
	$password=$_POST['txt_pass'];
	
  $selQryAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$dataAdmin = mysql_query($selQryAdmin);

  $selQrytutor="select * from tbl_tutor where tutor_email='$email' and t_password='$password'  and t_status='1'";
  //echo $selQrytutor;
	$datatutor=mysql_query($selQrytutor);

  $selQryparent="select * from tbl_parent where parent_email='$email' and parent_pass='$password'";
	 $dataparent=mysql_query($selQryparent);

	if($rowAdmin = mysql_fetch_array($dataAdmin))
	{
		$_SESSION['adminname']=$rowAdmin["admin_name"];
		$_SESSION['aid']=$rowAdmin["admin_id"];
		header('location:../Admin/AdminHomepage.php');
	}
	 
	 
	 else if($rowparent = mysql_fetch_array($dataparent))
	{
		$_SESSION['parent_name']=$rowparent["parent_name"];
		$_SESSION['pid']=$rowparent["parent_id"];
		header('location:../parent/homepage.php');
	}
  else if($rowtutor = mysql_fetch_array($datatutor))
	{
		$_SESSION['tutor_name']=$rowtutor["tutor_name"];
		$_SESSION['tid']=$rowtutor["tutor_id"];
		header('location:../tutor/homepagetutor.php');
	}
	else
	{
		echo"<script> alert ('invalid  user name or password')</script>";
	}
	
	
	
	
	 

	                                                                                                                                                                                                         
}
?>
		













		<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/Template/Login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/Template/Login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../assets/Template/Login/css/style.css">

    <title>Login </title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="../assets/Template/Login/images/cta.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>Educenter</strong></h3>
              <p class="mb-4">Empowering Minds, Unlocking Potential</p>
            </div>
            <form method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="txt_email">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="txt_pass">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn text-white btn-block btn-warning" name="btn_login">

              <span class="d-block text-left my-4 text-muted"> or sign in with</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="../assets/Template/Login/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/Template/Login/js/popper.min.js"></script>
    <script src="../assets/Template/Login/js/bootstrap.min.js"></script>
    <script src="../assets/Template/Login/js/main.js"></script>
  </body>
</html>