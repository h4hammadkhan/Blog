<?php

    require('db.php');

    if(isset($_POST['addcate'])){

        $newcate = mysqli_real_escape_string($conn, $_POST['category-name']);

        $sql = "INSERT INTO category(name) VALUES('$newcate')";
        $result = mysqli_query($conn, $sql);
        header('location:../admin/manage_category.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>";
    }



?>