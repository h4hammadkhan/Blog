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
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <style>
    .formerror{
      color: red;
    }
  </style>
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

          <!-- task notificatoin start -->
       
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
        
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          
          <!-- alert notification end-->
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
                <a href="#"><i class="icon_profile"></i> My Account</a>
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

  

        <div class="row">
          <div class="col-lg-12 col-md-12">
             <!-- CKEditor -->
             <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Add Posts
                  </header>
                  <div class="panel-body">

                    <div class="form">
                      <form action="../includes/add_post.php" method="post"  enctype="multipart/form-data" class="form-horizontal" name="myform" onsubmit="return validateform()">

                        <div class="col-sm-12 form-group">
                            <label>Post Title</label>
                            <input type="text" class="form-control" id="title" name="post_title">
                            <small class="formerror"></small> 
                        </div>
                        
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label>Post Content</label>
                            <textarea class="form-control " id="editor1" name="post_content" rows="6"></textarea>
                            <small class="formerror"></small> 
                          </div>
                        </div>

                        <div class="row">

                          <div class="form-group col-sm-6">
                            <div class="col-sm-12">
                              <label>Select Category</label>
                              <select name="post_category" id="" class="form-control">
          
                                <?php
                                  $categories = getAllCategory($conn);
                                  foreach($categories as $showcate){
                                ?>
                                  <option value="<?=$showcate['id']?>"><?=$showcate['name']?></option>
                                <?php
                                  }
                                ?>

                              </select>
                            </div>
                          </div>


                          <div class="form-group col-sm-6">
                            <div class="col-sm-12">
                              <label>Upload Images (max 5)</label>
                                <input type="file" class="form-control" id="file" name="post_image[]" accept="image/*" multiple>
                                <small class="formerror"></small> 
                            </div>
                          </div>

                        </div>
                       
                        <button type="submit" name="post" class="btn btn-primary" onclick="return check()">Add Post</button>

                      </form>

                    </div>
                  </div>
                </section>
              </div>
          </div>
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
  

    <script>
      CKEDITOR.replace( 'editor1' );


      function check() {
		    return confirm("Do you want to Add New record !");
	    }

      // 
    </script>

    <script>
	
      function clearerrors() {
        errors = document.getElementsByClassName("formerror");
        for(let item of errors){
          item.innerHTML = "";
        }
        document.getElementById("title").style.borderColor = "";
        document.getElementById("editor1").style.borderColor = "";
        document.getElementById("file").style.borderColor = "";
      }

      function seterrortitle(id, error){
        //add error inside of tag id
        document.getElementById(id);
        document.getElementsByClassName("formerror")[0].innerHTML = error;
        document.getElementById("title").style.borderColor = "red";
        
      }

      function seterroreditor1(id, error){

        //add error inside of tag id
        document.getElementById(id);
        document.getElementsByClassName("formerror")[1].innerHTML = error;
        document.getElementById("editor1").style.borderColor = "red";
      }

      function seterrorfile(id, error){
        //add error inside of tag id
        document.getElementById(id);
        document.getElementsByClassName("formerror")[2].innerHTML = error;
        document.getElementById("file").style.borderColor = "red";
      }



      function validateform() {
        var returnval = true;
        clearerrors();
        var title = document.forms['myform']["title"].value;
        var content = document.forms['myform']["editor1"].value;
        var file = document.forms['myform']["file"].value;
      
        //Employee name validation
        // var alpha = /^[a-zA-Z\s]*$/;
        var num = /[0-9]/;
        if(!title.match(num)){
          returnval = true;
        }
        else{
          seterrortitle("title", "*Numbers not allowed!");
          returnval = false;
        }
        
        if(title.length<3){
          seterrortitle("title", "*Length of Title is too short!");
          returnval = false;
        }
        
        if(title.length==0){
          seterrortitle("title", "*Title cannot be blank!");
          returnval = false;
        }

        //Date of Birth Validation
        if (content.length == 0) {
          seterroreditor1("editor1", "*Content cannot be blank!");
          returnval = false;
        }

        //Date of Joining Validation
        if (file.length == 0) {
          seterrorfile("file", "*please select atleast one image!");
          returnval = false;
        }


        return returnval;

      }


    </script>




    

</body>

</html>
