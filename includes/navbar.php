<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">MyBlog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

             

              <?php 
                $navsql = "SELECT * FROM menu";
                $navresult = mysqli_query($conn,$navsql);
                while($menu = mysqli_fetch_assoc($navresult)){
                  $no = getsubmenuNo($conn,$menu['id']);
                  if(!$no){
              ?>

                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="<?=$menu['action']?>"><?=$menu['name']?></a>
                    </li>

                    <?php
                    } // if statment end
                    else{
                    ?>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="<?=$menu['action']?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?=$menu['name']?>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">


                        <?php  
                        $submenuoption = getsubmenu($conn,$menu['id']);
                        foreach($submenuoption as $sm){

                        ?>

                        <li><a class="dropdown-item" href="<?=$sm['action']?>"><?=$sm['name']?></a></li>

                        <?php
                        } // foreach end
                        ?>


                      </ul>
                    </li>

                    <?php
                    }// esle end
                    ?>

                <?php
                  } //while loop end
                ?>

     
        
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>    