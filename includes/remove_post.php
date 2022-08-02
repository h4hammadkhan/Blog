<?php

    require('db.php');
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];

        $sqlSelectImg = "SELECT * FROM images WHERE post_id=$post_id";
        $resultSelectImg = mysqli_query($conn,$sqlSelectImg);
        $data = mysqli_fetch_all($resultSelectImg,MYSQLI_ASSOC);
        $rows = count($data);


        for($i=0; $i < $rows; $i++) { 
            unlink("../img/".$data[$i]['image']);
            
        }

        $sqlDeleteImg = "DELETE FROM images WHERE post_id=$post_id";
        $resultDeletetImg = mysqli_query($conn, $sqlDeleteImg);


        $sql = "DELETE FROM posts WHERE id=$post_id";
        $result = mysqli_query($conn, $sql);


        header('location:../admin/manage_post.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>"; 
    }



?>