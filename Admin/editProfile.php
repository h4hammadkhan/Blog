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

  <style>
    .formerror{
      color: red;
    }
  </style>
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
              <li><i class="fas fa-user-edit"></i>Edit Profile</li>
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
                    <img alt="" src="../profile/<?=getAdminThumb($conn,$admin['id'])?>" data-holder-rendered="true">
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
  
               
                  <!-- edit-profile -->
                  <div id="edit-profile" class="">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" name="myform" role="form"  action="../includes/Edit_ProfileInfo.php?id=<?=$admin['id']?>" method="post" onsubmit="return validateform()" >

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Full Name</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="full-name" name="full-name" value="<?=$admin['full_name']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>
                      
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Country</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="country" name="c-name" value="<?=$admin['country']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Occupation</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="occupation" name="occu" value="<?=$admin['occupation']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="email" class="form-control" id="email" name="email" value="<?=$admin['email']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" id="password" name="password" value="<?=$admin['password']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Reenter Password</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" id="re-password" name="re-password" value="<?=$admin['password']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Mobile</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$admin['mobile']?>" placeholder=" ">
                              <small class="formerror"></small>
                            </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </form>
                      </div>
                    </section>
                  </div>
                  
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
   

        </div>
    </div>
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

  <script>
    //knob
    $(".knob").knob();
  </script>

  <script>
    
    function clearerrors() {
      errors = document.getElementsByClassName("formerror");
      for(let item of errors){
        item.innerHTML = "";
      }
      document.getElementById("full-name").style.borderColor = "";
      document.getElementById("country").style.borderColor = "";
      document.getElementById("occupation").style.borderColor = "";
      document.getElementById("email").style.borderColor = "";
      document.getElementById("password").style.borderColor = "";
      document.getElementById("re-password").style.borderColor = "";
      document.getElementById("mobile").style.borderColor = "";
    }

    function seterrorName(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[0].innerHTML = error;
      document.getElementById("full-name").style.borderColor = "red";
      
    }

    function seterrorCountry(id, error){

      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[1].innerHTML = error;
      document.getElementById("country").style.borderColor = "red";
    }

    function seterrorOccupation(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[2].innerHTML = error;
      document.getElementById("occupation").style.borderColor = "red";
    }

    function seterrorEmail(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[3].innerHTML = error;
      document.getElementById("email").style.borderColor = "red";
    }


    function seterrorPassword(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[4].innerHTML = error;
      document.getElementById("password").style.borderColor = "red";
    }


    function seterrorRepassword(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[5].innerHTML = error;
      document.getElementById("re-password").style.borderColor = "red";
    }


    function seterrormobile(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[6].innerHTML = error;
      document.getElementById("mobile").style.borderColor = "red";
    }




    function validateform() {
      var returnval = true;
      clearerrors();
      var name = document.forms['myform']["full-name"].value;
      var con = document.forms['myform']["country"].value;
      var occu = document.forms['myform']["occupation"].value;
      var email = document.forms['myform']["email"].value;
      var pass = document.forms['myform']["password"].value;
      var repass = document.forms['myform']["re-password"].value;
      var mobile = document.forms['myform']["mobile"].value;
    
      //Employee name validation
      var num = /[0-9]/;
      var alpha = /^[a-zA-Z\s]*$/;
      if(name.match(alpha) && !name.match(num)){
        returnval = true;
      }
      else{
        seterrorName("full-name", "*only alphabets allowed!");
        returnval = false;
      }
      
      if(name.length<3){
        seterrorName("full-name", "*Length is too short!");
        returnval = false;
      }
      
      if(name.length==0){
        seterrorName("full-name", "*cannot be blank!");
        returnval = false;
      }

      //country Validation
      if(con.match(alpha) && !con.match(num)){
        returnval = true;
      }
      else{
        seterrorCountry("country", "*only alphabets allowed!");
        returnval = false;
      }

      if (con.length == 0) {
        seterrorCountry("country", "*cannot be blank!");
        returnval = false;
      }

      //occupation Validation
      if(occu.match(alpha) && !occu.match(num)){
        returnval = true;
      }
      else{
        seterrorOccupation("occupation", "*only alphabets allowed!");
        returnval = false;

      }

      if (occu.length == 0) {
        seterrorOccupation("occupation", "*cannot be blank!");
        returnval = false;
      }

      // email
      if(email.length == 0){
        seterrorEmail("email", "*cannot be blank!");
        returnval = false;
      }

      // password
      if(pass.length == 0){
        seterrorPassword("password", "*cannot be blank!");
        returnval = false;
      }

      if(repass.length == 0){
        seterrorRepassword("re-password", "*connot be blank!");
        returnval = false;
      }

      if(pass != repass){
        seterrorRepassword("re-password", "*re-password do not match!");
        seterrorPassword("password", "*password do not match!");
        returnval = false;
      }
    

      // mobile
      if(mobile.match(num) && mobile.length==11){
        returnval = true;
      }
      else{
        seterrormobile("mobile", "*only number allowed or length too short Or too long!");
        returnval = false;

      }

      if(mobile.length == 0){
        seterrormobile("mobile", "*cannot blanck!");
        returnval= false;
      }


        return returnval;

    }


  </script>


</body>

</html>
