<?php 
session_start();
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

</head>

<body style="background-image: url('../assets/Template/Main/images/homepage2.jpg'); background-size: cover; background-attachment: fixed;">
  

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
              <a class="nav-link" href="MySubject.php">Add Subjects</a>
            </li>
            <li class="nav-item @@events">
              <a class="nav-link" href="../Logout.php">Logout</a>
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

<body>
<h1 align="center" style="margin-top:150px;">WELCOME ::<?php echo $_SESSION['tutor_name']?> 

<!-- <br><a href="myProfile.php">myprofile</a>
<br ><a href="Editprofile.php">editprofile</a>
<br ><a href="ChangePassword.php">changepassword</a>
<br><a href="view_booking.php">view booking</a>
<br><a href="upload_video.php">uploading video</a> -->

</h1>
</body>
</html>


<!-- jQuery -->
<script src="../assets/Template/Main/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="../assets/Template/Main/plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="../assets/Template/Main/plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="../assets/Template/Main/plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="../assets/Template/Main/plugins/venobox/venobox.min.js"></script>
<!-- mixitup filter -->
<script src="../assets/Template/Main/plugins/mixitup/mixitup.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../assets/Template/Main/plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="../assets/Template/Main/js/script.js"></script>