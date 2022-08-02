<?php

    require('db.php');
    require('function.php');

    
    if(!isset($_SESSION['isUserLoggedIn'])){
        header('Location:login.php');
        }
        $admin = getAdminInfo($conn,$_SESSION['email']);

     #Edit post Data   
    if(isset($_POST['editpost'])){
        $post_id = $_GET['id'];
        $post_title = mysqli_real_escape_string($conn,$_POST['post_title']);
        $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);
        $post_categoryId = $_POST['post_category'];

        $sql = "UPDATE posts SET title='$post_title', content='$post_content', category_id=$post_categoryId WHERE id=$post_id";

        $result = mysqli_query($conn, $sql);


    }

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
            // $sql = "SELECT * FROM posts WHERE id=$edit_id";
            // $result = mysqli_query($conn, $sql);

            // $data=mysqli_fetch_assoc($result);

        ?>
        
        <div class="row">
          <div class="col-lg-12 col-md-12">
             <!-- CKEditor -->
             
             <div class="col-lg-12">
                <p style="color:red;"><span style="font-weight: bolder; font-size: 1.5rem;">Note:</span> Data Updated. if you want to skip this step OR you can add new Images.</p>
                <section class="panel">
                  <header class="panel-heading">
                    Edit Posts Images
                  </header>
                  <div class="panel-body">

                    <div class="form">
                      <form action="../includes/edit_post_uploadImg.php?id=<?=$edit_id?>" method="post"  enctype="multipart/form-data" class="form-horizontal" name="myform"  onsubmit="return validateform()">

                        <div class="form-group col-sm-12">
                            <div class="col-sm-12">
                              <label>Upload Images (max 5)</label>
                                <input type="file" class="form-control" id="file" name="post_image[]" accept="image/*" multiple required>
                                <small class="formerror"></small>
                            </div>
                        </div>

                        
                        <div class="form-group col-sm-12">
                          <div class="col-sm-12">
                            <button type="submit" name="edit_or_uppload_img" class="btn btn-primary" onclick="return checkEdit()">Edit Post</button>
                          </div>
                        </div>
                        
                      </form>
                      
                      <div class="form-group col-sm-12 mt-5">
                        <div class="col-sm-6">

                          <table class="table table-striped table-advance table-hover" style="margin-top:50px">

                            <tr>
                              <th>#</th>
                              <th>Uploaded Image</th>
                        
                            
                            </tr>

                            <?php
                                $image = getimages($conn, $edit_id);
                                $cout=1;
                                foreach($image as $img){
                            ?>
                            <tr>
                            
                                <td><?=$cout?></td>
                                <td><img src="<?php echo "../img/".$img['image']?>" alt="" width="200px"></td>
                                                               
                            </tr>
                            <?php
                              $cout++;
                              }
                              ?>

                          </table>
                                                      
                        </div>
                      </div>
                      
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
<script src="../admin/js/jquery.js"></script>
  <script src="../admin/js/jquery-ui-1.10.4.min.js"></script>
  <script src="../admin/js/jquery-1.8.3.min.js"></script>
  <script type="../admin/text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="../admin/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../admin/js/jquery.scrollTo.min.js"></script>
  <script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>
  
  <!--custome script for all page-->
  <script src="../admin/js/scripts.js"></script>

    
     <!-- ck editor -->
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  

    <script>
      CKEDITOR.replace( 'editor1' );


      function checkEdit() {
		    return confirm("Do you want to Add New Images !");
	    }

      function checkdeleteImg() {
		    return confirm("Do you want to Delete this Image !");
	    }


    </script>

    <script>
      
      function clearerrors() {
        errors = document.getElementsByClassName("formerror");
        for(let item of errors){
          item.innerHTML = "";
        }
        document.getElementById("file").style.borderColor = "";
      }

      function seterrorfile(id, error){
        //add error inside of tag id
        document.getElementById(id);
        document.getElementsByClassName("formerror")[0].innerHTML = error;
        document.getElementById("file").style.borderColor = "red";
        
      }


      function validateform() {
        var returnval = true;
        clearerrors();
        var file = document.forms['myform']["file"].value;
    
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
