<?php
require('db.php');
if(isset($_POST['post'])){
    $posttitle = mysqli_real_escape_string($conn,$_POST['post_title']);    
    $postcontent = mysqli_real_escape_string($conn,$_POST['post_content']);    
    $postcategoryid = $_POST['post_category'];
    
    $sql = "INSERT INTO posts (title,content,category_id) VALUES('$posttitle','$postcontent','$postcategoryid')";
    $result = mysqli_query($conn,$sql);

    $last_post_id =  mysqli_insert_id($conn);

    $image_name = $_FILES['post_image']['name'];
    $img_tmp = $_FILES['post_image']['tmp_name'];
    // echo "<pre>";
    // print_r($image_name);
    // print_r($img_tmp);

    foreach($image_name as $index=>$img){
        if(move_uploaded_file($img_tmp[$index], "../img/$img")){
            $msql = "INSERT INTO images (post_id,image) VALUES($last_post_id, '$img')";
            $mresult = mysqli_query($conn,$msql);   
        }
    }

    header('location:../admin/index.php');
}
else{
    echo "<script>alert('something went wrong!');</script>";
}


?>