<?php
require('../includes/db.php');
require('../includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php');
}
$admin = getAdminInfo($conn,$_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>MyBlog - Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/bc311c2fc7.js" crossorigin="anonymous"></script>
  
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">MyBlog <span class="lite">Admin</span></a>
      <!--logo end-->

    

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                              <img alt="" src="../profile/<?=getAdminThumb($conn,$admin['id'])?>" data-holder-rendered="true" style="width:40px;">
                            </span>
                            <span class="username"><?=$admin['full_name']?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profile.php"><i class="icon_profile"></i> My Account</a>
              </li>
              <li>
                <a href="../includes/logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
        <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
        <li class="active">
            <a class="" href="Add_Post.php">
                          <i class="fas fa-plus-circle"></i>
                          <span>Add Post</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="manage_post.php">
                          <i class="fas fa-paper-plane"></i>
                          <span>Manage Post</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="manage_img.php">
                          <i class="fas fa-image"></i> 
                          <span>Manage Images</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="manage_comments.php">
                          <i class="fas fa-comment-alt"></i>
                          <span>Manage Comments</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="manage_category.php">
                          <i class="fas fa-clipboard-list"></i>
                          <span>Manage Category</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="manage_menu.php">
                          <i class="fas fa-bars"></i>
                          <span>Manage Menu</span>
                      </a>
          </li>
          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <!-- info -->
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fas fa-envelope"></i>
              <div class="count"><?=getAllPostNo($conn)?></div>
              <div class="title">Posts</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fas fa-comment"></i>
              <div class="count"><?=getAllCommentNo($conn)?></div>
              <div class="title">Comments</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>

          <!-- dashboard -->
        <div class="row">

        <a href="index.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box green-bg">
                <i class="icon_house_alt"></i>
                <div class="count">Home</div>
                <div class="title">DASHBOARD</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>


          <a href="Add_Post.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box yellow-bg">
                <i class="fas fa-plus-circle"></i>
                <div class="count">ADD</div>
                <div class="title">Posts</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>

          <a href="manage_post.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box red-bg">
                <i class="fas fa-paper-plane"></i>
                <div class="count">Manage</div>
                <div class="title">Posts</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>

          <a href="manage_img.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box dark-bg">
                <i class="fas fa-image"></i> 
                <div class="count">Manage</div>
                <div class="title">Images</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>
          
          <a href="manage_comments.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box orange-bg">
                <i class="fas fa-comment-alt"></i>
                <div class="count">Manage</div>
                <div class="title">Comments</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>

          <a href="manage_category.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box lime-bg">
                <i class="fas fa-clipboard-list"></i>
                <div class="count">Manage</div>
                <div class="title">CATEGORY</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>

          <a href="manage_menu.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box purple-bg">
                <i class="fas fa-bars"></i>
                <div class="count">Manage</div>
                <div class="title">Menu</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>


          <a href="profile.php">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
              <div class="info-box magenta-bg">
                <i class="icon_profile"></i>
                <div class="count">Account</div>
                <div class="title">PROFILE</div>
              </div>
              <!--/.info-box-->
            </div>
            <!--/.col-->
          </a>

        </div>

        
    
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
   
    
     <!-- ck editor -->
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  

</body>

</html>
