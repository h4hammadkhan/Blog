<?php


    require('db.php');
    
    if(isset($_FILES['post_image'])){

       $imgid = $_GET['id'];

       $image_name = $_FILES['post_image']['name'];
       $image_temp = $_FILES['post_image']['tmp_name'];


       $sqlSelect = "SELECT * FROM images WHERE id=$imgid";
       $resultSelect = mysqli_query($conn, $sqlSelect);
       $data = mysqli_fetch_assoc($resultSelect);
       
       unlink("../img/".$data['image']);
       move_uploaded_file($image_temp,"../img/$image_name");
       $sql = "UPDATE images SET image='$image_name' WHERE id=$imgid";
       $result = mysqli_query($conn,$sql);
     

       header('location:../admin/manage_img.php');





    }



?>