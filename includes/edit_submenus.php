<?php

    require('db.php');
    if(isset($_POST['editsubmenu'])){
        print_r($_POST);
        // $submenu_name = mysqli_real_escape_string($conn,$_POST['submenu-name']);
        // $parent_id= $_POST['parent-id'];
        // $submenu_link= $_POST['submenu-link'];

        // $sql = "UPDATE submenu SET name='$submenu_name', parent_menu_id=$parent_id, action='$submenu_link'";
        // $result = mysqli_query($conn,$sql);

        // header('location:../admin/manage_menu.php');

    }


?>