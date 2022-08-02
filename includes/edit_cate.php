<?php

    require('db.php');

    if(isset($_POST['editcate'])){

        $category_id = $_POST['category-id'];
        $category_name = mysqli_real_escape_string($conn, $_POST['category-name']);

        

        $sql = "UPDATE category set name='$category_name' WHERE id=$category_id";
        $result = mysqli_query($conn, $sql);
        header('location:../admin/manage_category.php');
    }
    else{
        echo "<script>alert('Incorrect Email or Password !')</script>"; 
    }



?>