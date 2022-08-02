<?php

    require('db.php');
    if(isset($_GET['id'])){
        $submenu_id = $_GET['id'];

        $sql = "DELETE FROM submenu WHERE id=$submenu_id";
        $result = mysqli_query($conn, $sql);

        header('location:../admin/manage_menu.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>"; 
    }



?>