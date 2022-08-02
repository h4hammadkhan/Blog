<?php

    require('db.php');

    if(isset($_POST['editsubmenu'])){
      
        $submenu_id = $_GET['id'];
        $submenu_name = mysqli_real_escape_string($conn, $_POST['submenu-name']);
        $parent_id = $_POST['parent-id'];
        $submenu_link = mysqli_real_escape_string($conn, $_POST['submenu-link']);

        $sql = "UPDATE submenu SET parent_menu_id=$parent_id, name='$submenu_name', action='$submenu_link' WHERE id=$submenu_id";
        $result = mysqli_query($conn, $sql);

        header('location:../admin/manage_menu.php');

    }


?>