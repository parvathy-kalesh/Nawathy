<?php
include('SessionValidation.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Educenter</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/themify-icons/themify-icons.css">
  <!-- animation css -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="../assets/Template/Main/plugins/venobox/venobox.css">

  <!-- Main Stylesheet -->
  <link href="../assets/Template/Main/css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="../assets/Template/Main/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../assets/Template/Main/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/form.css">

</head>

<body>
  

<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href="homepagetutor.php"><img src="../assets/Template/Main/images/logo.png" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item ">
              <a class="nav-link" href="homepagetutor.php">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="myprofile.php">Profile</a>
            </li>
            
            
            <li class="nav-item @@courses">
              <a class="nav-link" href="view_booking.php">View Booking</a>
            </li>
            <li class="nav-item @@events">
              <a class="nav-link" href="../Logout.php">Logout</a>
            </li>
            <li class="nav-item @@events">
              <!-- <a class="nav-link" href="Login.php">Logout</a> -->
            </li>
            <!-- <li class="nav-item @@blog">
              <a class="nav-link" href="blog.html">BLOG</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="teacher.html">Teacher</a>
                <a class="dropdown-item" href="teacher-single.html">Teacher Single</a>
                <a class="dropdown-item" href="notice.html">Notice</a>
                <a class="dropdown-item" href="notice-single.html">Notice Details</a>
                <a class="dropdown-item" href="research.html">Research</a>
                <a class="dropdown-item" href="scholarship.html">Scholarship</a>
                <a class="dropdown-item" href="course-single.html">Course Details</a>
                <a class="dropdown-item" href="event-single.html">Event Details</a>
                <a class="dropdown-item" href="blog-single.html">Blog Details</a>
              </div>
            </li>
            <li class="nav-item @@contact">
              <a class="nav-link" href="contact.html">CONTACT</a>
            </li> -->
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->
