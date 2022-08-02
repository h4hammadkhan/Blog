<?php

    require('db.php');
    if(isset($_POST['addsubmenu'])){
        print_r($_POST);
        $submenu_name = mysqli_real_escape_string($conn,$_POST['submenu-name']);
        $parent_id = mysqli_real_escape_string($conn,$_POST['parent-id']);
        $submenu_link = mysqli_real_escape_string($conn,$_POST['submenu-link']);

        $sql = "INSERT INTO submenu(name,parent_menu_id,action) VALUES('$submenu_name',$parent_id,'$submenu_link')";
        $resutl = mysqli_query($conn,$sql);

        header('location:../admin/manage_menu.php');
    }
    else{
        echo "<script>alert('Something Went Wrong !')</script>"; 
    }



?>