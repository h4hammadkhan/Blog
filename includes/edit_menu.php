<?php


    require('db.php');

    if(isset($_POST['editmenu'])){
        
        $menu_id = $_GET['id'];
        $menu_name = mysqli_real_escape_string($conn, $_POST['menu-name']);
        $menu_link = $_POST['menu-link'];

        $sql = "UPDATE menu SET name='$menu_name', action='$menu_link' WHERE id=$menu_id";
        $result = mysqli_query($conn, $sql);

        header('location:../admin/manage_menu.php');
    }
    else{
        echo  "<script>alert('Something Went Wrong!');</script>";
    }



?>