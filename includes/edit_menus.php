<?php

    require('db.php');

    if(isset($_POST['editmenu'])){
        $id = $_GET['id'];
        $nemu_name = mysqli_real_escape_string($conn, $_POST['menu-name']);
        $nemu_link = $_POST['menu-link'];

        $sql = "UPDATE menu SET name='$nemu_name' , action='$nemu_link' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        header('location:../admin/manage_menu.php');
    }
    else{
        echo "<script> alert('went worng');</script>";
    }



?>