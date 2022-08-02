<?php
  require('includes/db.php');
  require('includes/function.php');

  if(isset($_GET['id'])){
  $post_id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE id=$post_id";
  $result = mysqli_query($conn,$sql);
  $post = mysqli_fetch_assoc($result);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
    <style>
       body{
        padding-bottom: 5rem;
      }

    .formerror{
      color: red;
    }
  
    </style>
</head>
<body>
    <?php include_once('includes/navbar.php'); ?>   
    <?php

      if(isset($_GET['search'])){
        $_SESSION['search'] = $_GET;
        header('Location:index.php?search='.$_GET['search']);
      }

      ?>
  <div>
      <div class="container m-auto mt-3 row">
          <div class="col-8">
              <div class="card mb-3">
                  
                  <div class="card-body">
                    <h5 class="card-title"><?=$post['title']?></h5>
                    <span class="badge bg-primary ">Posted on <?=date('F jS, Y', strtotime($post['created_at']))?></span>
                    <span class="badge bg-danger"><?=getCategory($conn,$post['category_id']);?></span>
                    <div class="border-bottom mt-3"></div>

                <?php 

                  $post_img=getimages($conn,$post['id']);

                ?>

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">

                <?php
                  
                    $inc = 1;
                  
                    foreach($post_img as $img){
                      if($inc>1){
                        $activeclass = "";
                      }else{
                        $activeclass = "active";
                      }
                      ?>

                    <div class="carousel-item <?=$activeclass?>">
                      <img src="img/<?=$img['image']?>" class="d-block w-100" alt="...">
                    </div>

                    <?php
                    $inc++;
                    }

                    ?>
                  
                  
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>

                    <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" class="img-fluid mb-2 mt-2" alt="Responsive image"> -->


                    <p class="card-text"><?=$post['content']?></p>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox"></div>
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Comment on this
                    </button>

                  </div>
                </div>



                

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Your Comments</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="includes/addComment.php" method="post" name="myform" onsubmit="return validateform()">
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                              <small class="formerror"></small>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Comment</label>
                              <input type="text" class="form-control" name="comment" id="comment">
                              <small class="formerror"></small>
                            </div>
                            <input type="hidden" name="post_id" value="<?=$post['id']?>">
                            <button type="submit" name="add" class="btn btn-primary">Add Comment</button>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
          
                <div>
                    <h4>Related Posts</h4>

                    
                  <?php

                  $pSql = "SELECT * FROM posts WHERE category_id={$post['category_id']} ORDER BY id DESC";
                  $result = mysqli_query($conn,$pSql);

                  while($rpost = mysqli_fetch_assoc($result)){
                      if($rpost['id'] == $post['id']){
                        continue;
                      }
                    ?>
                    <a href="post.php?id=<?=$rpost['id']?>" style="text-decoration: none; color: black;">
                      <div class="card mb-3" style="max-width: 700px;">
                          <div class="row g-0">
                            <div class="col-md-5" style="background-image: url('img/<?=getPostThumb($conn,$rpost['id'])?>');background-size: cover">
                              <!-- <img src="https://images.moneycontrol.com/static-mcnews/2020/04/stock-in-the-news-770x433.jpg" alt="..."> -->
                            </div>
                            <div class="col-md-7">
                              <div class="card-body">
                                <h5 class="card-title"><?=$rpost['title']?></h5>
                                <div class="card-text text-truncate" style="height:65px;"><?=$rpost['content']?></div>
                                <p class="card-text"><small class="text-muted">Posted on <?=date('F jS, Y', strtotime($rpost['created_at']))?></small></p>
                              </div>
                            </div>
                          </div>
                      </div>
                    </a>
                  <?php  
                  }

                  ?>
                    
                </div>
          
              </div>
        <?php include_once('includes/sidebar.php'); ?>   
  </div>

 
      
      
    <?php include_once('includes/footer.php'); ?>   
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-614ed3efce6aba37"></script>

    <script>
    
    function clearerrors() {
      errors = document.getElementsByClassName("formerror");
      for(let item of errors){
        item.innerHTML = "";
      }
      document.getElementById("name").style.borderColor = "";
      document.getElementById("comment").style.borderColor = "";
    
    }

    function seterrorName(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[0].innerHTML = error;
      document.getElementById("name").style.borderColor = "red";
      
    }

    function seterrorComment(id, error){
      //add error inside of tag id
      document.getElementById(id);
      document.getElementsByClassName("formerror")[1].innerHTML = error;
      document.getElementById("comment").style.borderColor = "red";
    }




    function validateform() {
      var returnval = true;
      clearerrors();
      var name = document.forms['myform']["name"].value;
      var comment = document.forms['myform']["comment"].value;
    
      //Employee name validation
      var num = /[0-9]/;
      var alpha = /^[a-zA-Z\s]*$/;
      if(name.match(alpha) && !name.match(num)){
        returnval = true;
      }
      else{
        seterrorName("name", "*only alphabets allowed!");
        returnval = false;
      }
      
      if(name.length<3){
        seterrorName("name", "*Length is too short!");
        returnval = false;
      }
      
      if(name.length==0){
        seterrorName("name", "*cannot be blank!");
        returnval = false;
      }

      //country Validation
      if(comment.match(alpha) && !comment.match(num)){
        returnval = true;
      }
      else{
        seterrorComment("comment", "*only alphabets allowed!");
        returnval = false;
      }

      if (comment.length == 0) {
        seterrorComment("comment", "*cannot be blank!");
        returnval = false;
      }

        return returnval;

    }


  </script>

    
</body>
</html>