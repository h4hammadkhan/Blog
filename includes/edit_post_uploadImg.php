<?php


    require('db.php');

    if(isset($_FILES['post_image'])){

        $post_id = $_GET['id'];
        $image_name = $_FILES['post_image']['name'];
        $img_tmp = $_FILES['post_image']['tmp_name'];

        foreach($image_name as $index=>$img){
            if(move_uploaded_file($img_tmp[$index],"../img/$img")){
                $sql = "INSERT INTO images (post_id,image) VALUES($post_id, '$img')";
                $_result = mysqli_query($conn, $sql);
            }
        }

        header('location:../admin/manage_post.php');

      
    
    }
    else{
        echo "<script>alert('something went wrong!');</script>";
    }



?>