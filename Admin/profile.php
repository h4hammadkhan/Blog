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

  <title>Profile | Creative - Bootstrap 3 Responsive Admin Template</title>

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
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- image atre select css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/css/imgareaselect-default.css" integrity="sha512-wUdm/cyWPwiPypgc4kem0zyqbdCfAFIMElxGR1LOTgIT4uS9KSi5XwBLnQtGFC5QGmtcwPSnuGaDrFzD1T1ilA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  

</head>
   

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
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
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-user-md"></i><a href="profile.php">Profile</a></li>
              <li><i class="fas fa-user-edit"></i><a href="editProfile.php">Edit Profile</a></li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?=$admin['full_name']?></h4>
                  <div class="follow-ava">

                      <img src="../profile/<?=getAdminThumb($conn,$admin['id'])?>" alt="" id="profile_picture" data-holder-rendered="true">
                      
                  
                  </div>
                  <h6>Administrator</h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello I’m ,<?=$admin['full_name']?> a leading expert in Web Development.</p>
                  <p><?=$admin['email']?></p>
                  <p><i class="fa fa-twitter"><?=$admin['full_name']?></i></p>
                </div>
             

              </div>
            </div>
          </div>

        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
                <div class="tab-content">
  
                  <!-- profile -->
                  <div id="profile" class="">
                    <section class="panel">
               
                      <div class="panel-body bio-graph-info">
                        <h1>Bio Graph</h1>
                        <div class="row">

                          <div class="bio-row">
                            <p><span>Full Name </span>: <?=$admin['full_name']?></p>
                          </div>
                                                  
                          <div class="bio-row">
                            <p><span>Country </span>: <?=$admin['country']?></p>
                          </div>

                          <div class="bio-row">
                            <p><span>Occupation </span>: <?=$admin['occupation']?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: <?=$admin['email']?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Mobile </span>: <?=$admin['mobile']?></p>
                          </div>
                        
                          
                        </div>
                      </div>
                    </section>

                    <form method="post" action="change_pic.php" onsubmit="return checkCoords();" enctype="multipart/form-data">
                      <a href="" id="upload_link" class="btn btn-primary">Select Image</a> 
                      <input type="file"  name="image" class="image" id="fileInput" style="display: none;">
                      <input type="hidden" id="x" name="x" />
                      <input type="hidden" id="y" name="y" />
                      <input type="hidden" id="w" name="w" />
                      <input type="hidden" id="h" name="h" />
                      <input type="submit"  name="upload" value="UPLOAD" class="btn btn-success">
                    </form>
                    <p><img id="imagePreview" width="50%" style="display:none; margin-top:20px"></p>

                  </div>
                

                </div>
              </div>
            </section>
          </div>
        </div>



     

        <!-- page end-->
      </section>
    </section>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
  <!-- jquery min js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <!-- image are select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.js" integrity="sha512-dt/pzq6FVYkejyZ/oLCrWIDmfJSpFOGiwExcHURKdNawbwWXLNvtmKjAmZ2y5ht4LX5G0dQNwp7MQXw2t/E4ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  



  <script>
    $(function(){
      $("#upload_link").on('click', function(e){
          e.preventDefault();
          $("#fileInput:hidden").trigger('click');
      });
    });
  </script>

  <script>
        // Check coordinates
    function checkCoords(){
        if(parseInt($('#w').val())) return true;
        alert('Please select Image OR select crop region then press upload.');
        return false;
    }

    // Set image coordinates
    function updateCoords(im,obj){
        var img = document.getElementById("imagePreview");
        var orgHeight = img.naturalHeight;
        var orgWidth = img.naturalWidth;
      
        var porcX = orgWidth/im.width;
        var porcY = orgHeight/im.height;
      
        $('input#x').val(Math.round(obj.x1 * porcX));
        $('input#y').val(Math.round(obj.y1 * porcY));
        $('input#w').val(Math.round(obj.width * porcX));
        $('input#h').val(Math.round(obj.height * porcY));
    }

    $(document).ready(function(){
        // Prepare instant image preview
        var p = $("#imagePreview");
        $("#fileInput").change(function(){
            //fadeOut or hide preview
            p.fadeOut();
        
            //prepare HTML5 FileReader
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);
        
            oFReader.onload = function(oFREvent){
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });
      
        // Implement imgAreaSelect plugin
        $('#imagePreview').imgAreaSelect({
            onSelectEnd: updateCoords
        });
    });
  </script>




  <script>
    //knob
    $(".knob").knob();
  </script>



</body>

</html>
