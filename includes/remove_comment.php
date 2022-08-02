<?php

    require('db.php');
    if(isset($_GET['id']));
    
        $comment_id = $_GET['id'];

        $sql = "DELETE FROM comments WHERE id=$comment_id";
        $result = mysqli_query($conn, $sql);

        header('location:../admin/manage_comments.php');


?>