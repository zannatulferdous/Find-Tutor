<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        
        <link href="css/profile.css" rel="stylesheet" type="text/css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="js/registration.js"></script>
        <!-- // Meta Tags -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
      <!--testimonial flexslider-->
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/media.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
      <!--fonts-->
      <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
      <script src="js/jquery.js"></script>
      <!--//fonts-->
    </head>
    <body>
        
 <div class="top-bar-w3layouts">
         <div class="container">
            <nav class="navbar navbar-default ">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <div class="logo">
                     <img src="images/logo.png" class="img img-responsive" alt="">
                  </div>
               </div>

               <!-- navbar-header -->
               <div class="collapse navbar-collapse js-navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                     
                     
                     <li><a href="logout.php">Logout</a></li>
                     <li><a  href="#"><?php echo "Hello!"." ".$_SESSION["USER_NAME"];?></a></li>
                  </ul>
               </div>
               <div class="clearfix"> </div>
            </nav>
         </div>
      </div>
    <?php 
        
         if($_SESSION["USER_NAME"]==true){ 
       }
else{
  
header('location:login.php');

}
      ?>