<?php


    require('db.php');
    if(isset($_GET['id'])){
        $imgId = $_GET['id'];

        $sql1 = "SELECT * FROM images WHERE id=$imgId";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result1);

        unlink("../img/".$row['image']);

        $sql = "DELETE FROM images WHERE id=$imgId";
        $result = mysqli_query($conn,$sql);


        header("location:../admin/manage_img.php");
    }


?>