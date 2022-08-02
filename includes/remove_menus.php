<?php

    require('db.php');
    if(isset($_GET['id'])){
        
        $menu_id = $_GET['id'];

        $sql = "DELETE FROM menu WHERE id=$menu_id";
        $resutl = mysqli_query($conn, $sql);

        header('location:../admin/manage_menu.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>"; 
    }



?>