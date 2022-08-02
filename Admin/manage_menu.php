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

  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
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
    .formerror2{
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
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <div class="row">
                  <div class="col-md-1">
                    Menu
                  </div>

                  <div class="col-md-4">
                    <a href="#myModal" data-toggle="modal" class="">
                      Add New Menu
                    </a>
                  </div>
                </div>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>

                  <tr>

                    <th> #</th>
                    <th> Menu</th>
                    <th> Links</th>
                    <th> Action</th>

                  </tr>

                  <?php
                    $menus = getmenu($conn);
                    $count = 1;
                    foreach($menus as $menu){
                  ?>
                  <tr>

                    <td><?=$count?></td>
                    <td><?=$menu['name']?></td>
                    <td><?=$menu['action']?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" name="remove" href="../includes/remove_menus.php?id=<?=$menu['id']?>" onclick="return checkdelete()"><i class="icon_close_alt2"></i></a>
                        <a class="btn btn-primary" name="edit" href="../includes/edit_menu_form.php?id=<?=$menu['id']?>" ><i class="icon_plus_alt2"></i></a>
                      </div>
                    </td>

                  </tr>


                  <?php
                    $count++;
                    }
                  ?>

                    

                </tbody>
              </table>
            </section>
          </div>
        </div>
        
        <!--  Add New Menu Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Add New Menu</h4>
              </div>
              <div class="modal-body">

                <form role="form" name="myform" onsubmit="return validateform()" action="../includes/add_menus.php" method="post">
                  
                  <div class="form-group">
                    <label for="Menu title">Menu Title</label>
                    <input type="text" class="form-control" name="menu-name" id="name" placeholder="Enter Menu Title..." >
                    <small class=formerror></small>
                  </div>

                  <div class="form-group">
                    <label for="Menue link">Menu Link</label>
                    <input type="text" class="form-control" name="menu-link" id="link" value="#" placeholder="Enter Menu Link..." >
                    <small class=formerror></small>
                  </div>
                  
                  <button type="submit" name="addmenu" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- Sub Menu Start -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <div class="row">
                  <div class="col-md-1">
                    SubMenu
                  </div>

                  <div class="col-md-4">
                    <a href="#myModal1" data-toggle="modal" class="">
                      Add New SubMenu
                    </a>
                  </div>
                </div>
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>

                  <tr>

                    <th> #</th>
                    <th> SubMenu</th>
                    <th> Parent Menu</th>
                    <th> Links</th>
                    <th> Action</th>

                  </tr>

                  <?php
                    $submenus = getAllsubmenu($conn);
                    $count = 1;
                    foreach($submenus as $submenu){
                  ?>
                  <tr>

                    <td><?=$count?></td>
                    <td><?=$submenu['name']?></td>
                    <td><?=getMenuName($conn,$submenu['parent_menu_id'])?></td>
                    <td><?=$submenu['action']?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" name="remove" href="../includes/remove_submenus.php?id=<?=$submenu['id']?>" onclick="return checkdelete()"><i class="icon_close_alt2"></i></a>
                        <a class="btn btn-primary" name="edit" href="../includes/edit_submenu_form.php?id=<?=$submenu['id']?>" ><i class="icon_plus_alt2"></i></a>
                      </div>
                    </td>
                   
                  </tr>


                  <?php
                    $count++;
                    }
                  ?>

                    

                </tbody>
              </table>
            </section>
          </div>
        </div>

        <!--  Add New SubMenu Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Add New SubMenu</h4>
              </div>
              <div class="modal-body">

                <form role="form" name="myform2" onsubmit="return validateform()" action="../includes/add_submenus.php" method="post">
                  
                  <div class="form-group">
                    <label for="Category">SubMenu Title</label>
                    <input type="text" class="form-control" name="submenu-name" id="subname" placeholder="Enter SubMenu Title...">
                    <small class="formerror2"></small>

                  </div>

                  <div class="form-group">
                    <label for="Category">Select Parent Menu</label>
                    <select type="text" class="form-control" name="parent-id">
                      
                      <?php
                        $menus = getmenu($conn);
                        foreach($menus as $menu){
                      ?>

                      <option value="<?=$menu['id']?>"><?=$menu['name']?></option>

                      <?php
                        }
                      ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Category">SubMenu Link</label>
                    <input type="text" class="form-control" name="submenu-link" id="sublink" value="#" placeholder="Enter SubMenu Link...">
                    <small class="formerror"></small>

                  </div>
                  
                  <button type="submit" name="addsubmenu" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        
      </section> <!--wrapper end-->     
    </section> <!--main content end-->


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
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
     <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
      function checkdelete() {
		    return confirm("Do you want to delete this record");
	    }
    </script>

   
    <script>
          
          function clearerrors() {
            errors = document.getElementsByClassName("formerror");
            for(let item of errors){
              item.innerHTML = "";
            }
            document.getElementById("name").style.borderColor = "";
            document.getElementById("link").style.borderColor = "";
            
          
          }

          function seterrortitle(id, error){
            //add error inside of tag id
            document.getElementById(id);
            document.getElementsByClassName("formerror")[0].innerHTML = error;
            document.getElementById("name").style.borderColor = "red";
            
          }   
          
          function seterrorlink(id, error){
            //add error inside of tag id
            document.getElementById(id);
            document.getElementsByClassName("formerror")[1].innerHTML = error;
            document.getElementById("link").style.borderColor = "red";
            
          }



          function validateform() {
            var returnval = true;
            clearerrors();
            var title = document.forms['myform']["name"].value;
            var link = document.forms['myform']["link"].value;
      
            //Employee name validation
            // var alpha = /^[a-zA-Z\s]*$/;
            var num = /[0-9]/;
            if(!title.match(num)){
              returnval = true;
            }
            else{
              seterrortitle("name", "*Numbers not allowed!");
              returnval = false;
            }
            
            if(title.length<3){
              seterrortitle("name", "*Length of Title is too short!");
              returnval = false;
            }
            
            if(title.length==0){
              seterrortitle("name", "*menu title cannot be blank!");
              returnval = false;
            }

            if(link.length==0){
              seterrorlink("link", "*menu link cannot be blank!");
              returnval = false;
            }

        

            return returnval;

          }

    </script>

    <!-- Submenu validation -->
    <script>
       function clearerrors() {
            errors = document.getElementsByClassName("formerror2");
            for(let item of errors){
              item.innerHTML = "";
            }
            document.getElementById("subname").style.borderColor = "";
            document.getElementById("sublink").style.borderColor = "";
            
          
          }

          function seterrortitle(id, error){
            //add error inside of tag id
            document.getElementById(id);
            document.getElementsByClassName("formerror2")[0].innerHTML = error;
            document.getElementById("subname").style.borderColor = "red";
            
          }   
          
          function seterrorlink(id, error){
            //add error inside of tag id
            document.getElementById(id);
            document.getElementsByClassName("formerror2")[1].innerHTML = error;
            document.getElementById("sublink").style.borderColor = "red";
            
          }



          function validateform() {
            var returnval = true;
            clearerrors();
            var title = document.forms['myform2']["subname"].value;
            var link = document.forms['myform2']["sublink"].value;
      
            //Employee name validation
            // var alpha = /^[a-zA-Z\s]*$/;
            var num = /[0-9]/;
            if(!title.match(num)){
              returnval = true;
            }
            else{
              seterrortitle("subname", "*Numbers not allowed!");
              returnval = false;
            }
            
            if(title.length<3){
              seterrortitle("subname", "*Length of Title is too short!");
              returnval = false;
            }
            
            if(title.length==0){
              seterrortitle("subname", "*menu title cannot be blank!");
              returnval = false;
            }

            if(link.length==0){
              seterrorlink("sublink", "*menu link cannot be blank!");
              returnval = false;
            }

        

            return returnval;

          }
    </script>

</body>

</html>
