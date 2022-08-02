<?php

    require('db.php');
    if(isset($_POST['addmenu'])){
        // print_r($_POST);
        $menu_name = mysqli_real_escape_string($conn, $_POST['menu-name']);
        $menu_link = mysqli_real_escape_string($conn, $_POST['menu-link']);

        $sql = "INSERT INTO menu(name, action) VALUES('$menu_name','$menu_link')";
        $result = mysqli_query($conn,$sql);
        header('location:../admin/manage_menu.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>"; 
    }




?>