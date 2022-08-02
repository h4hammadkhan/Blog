<?php
    require('db.php');
    require('function.php');
    if(!isset($_SESSION['isUserLoggedIn'])){
    header('Location:../admin/login.php');
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
  <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../admin/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../admin/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../admin/css/font-awesome.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/bc311c2fc7.js" crossorigin="anonymous"></script>
  <!-- full calendar css-->
  <link href="../admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="../admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="../admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="../admin/css/owl.carousel.css" type="text/css">
  <link href="../admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../admin/css/fullcalendar.css">
  <link href="../admin/css/widgets.css" rel="stylesheet">
  <link href="../admin/css/style.css" rel="stylesheet">
  <link href="../admin/css/style-responsive.css" rel="stylesheet" />
  <link href="../admin/css/xcharts.min.css" rel=" stylesheet">
  <link href="../admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
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
            <a class="" href="../admin/index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
        <li class="active">
            <a class="" href="../admin/Add_Post.php">
                          <i class="fas fa-plus-circle"></i>
                          <span>Add Post</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="../admin/manage_post.php">
                          <i class="fas fa-paper-plane"></i>  
                          <span>Manage Post</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="../admin/manage_img.php">
                          <i class="fas fa-image"></i> 
                          <span>Manage Images</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="../admin/manage_comments.php">
                          <i class="fas fa-comment-alt"></i>
                          <span>Manage Comments</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="../admin/manage_category.php">
                          <i class="fas fa-clipboard-list"></i>
                          <span>Manage Category</span>
                      </a>
          </li>
          <li class="active">
            <a class="" href="../admin/manage_menu.php">
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



        <?php       
                    $edit_id = $_GET['id'];

                    $sql = "SELECT * FROM category WHERE id=$edit_id";
                    $result = mysqli_query($conn, $sql);

                    $data=mysqli_fetch_assoc($result); 
        ?>
        
         
            
            <h4 class="modal-title">Edit Category</h4>

              <div class="modal-body">

                <form role="form" name="myform" onsubmit="return validateform()" action="edit_cate.php" method="post">
                    <div class="form-group">
                    <input type="hidden" name="category-id" value="<?=$data['id']?>">
                    <label for="Category">Edit Category Name</label>
                    <input type="text" class="form-control" name="category-name" id="catname" value="<?=$data['name']?>" placeholder="Enter Category Name..." >
                    <small class="formerror"></small>
                    </div> 
                    
                    <button type="submit" name="editcate" class="btn btn-primary" onclick="return checkEdit()">Edit</button>
                </form>
              </div>

          
      
        
        </section> <!--wrapper end-->     
    </section> <!--main content end-->


  <!-- javascripts -->
  <script src="../admin/js/jquery.js"></script>
  <script src="../admin/js/jquery-ui-1.10.4.min.js"></script>
  <script src="../admin/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="../admin/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="../admin/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../admin/js/jquery.scrollTo.min.js"></script>
  <script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>

  
  <!--custome script for all page-->
  <script src="../admin/js/scripts.js"></script>
  
  <script>
      function checkEdit() {
		    return confirm("Do you want to Edit this record !");
	    }
  </script>

    <script>
          
          function clearerrors() {
            errors = document.getElementsByClassName("formerror");
            for(let item of errors){
              item.innerHTML = "";
            }
            document.getElementById("catname").style.borderColor = "";
          
          }

          function seterrortitle(id, error){
            //add error inside of tag id
            document.getElementById(id);
            document.getElementsByClassName("formerror")[0].innerHTML = error;
            document.getElementById("catname").style.borderColor = "red";
            
          }



          function validateform() {
            var returnval = true;
            clearerrors();
            var title = document.forms['myform']["catname"].value;
      
            //Employee name validation
            // var alpha = /^[a-zA-Z\s]*$/;
            var num = /[0-9]/;
            if(!title.match(num)){
              returnval = true;
            }
            else{
              seterrortitle("catname", "*Numbers not allowed!");
              returnval = false;
            }
            
            if(title.length<3){
              seterrortitle("catname", "*Length of Title is too short!");
              returnval = false;
            }
            
            if(title.length==0){
              seterrortitle("catname", "*Title cannot be blank!");
              returnval = false;
            }

        

            return returnval;

          }


    </script>

    </body>

</html>
