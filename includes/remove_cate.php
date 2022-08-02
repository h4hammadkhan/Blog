<?php

    require('db.php');

    if(isset($_GET['id'])){

        $remove_id = $_GET['id'];

        $sql = "DELETE FROM category WHERE id=$remove_id";
        $result = mysqli_query($conn, $sql);
        header('location:../admin/manage_category.php');
    }
    else{
        echo "<script>alert('Incorrect Email or Password !')</script>"; 
    }



?>