<?php

require('db.php');
if(isset($_POST['add'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $commnet = mysqli_real_escape_string($conn,$_POST['comment']); 
    $post_id = $_POST['post_id']; 

    print_r($_POST);

    $sql = "INSERT INTO comments(comment,name, post_id) VALUES ('$commnet','$name',$post_id)";
    if(mysqli_query($conn,$sql)){
        header("location:../post.php?id=$post_id");
    }
    else{
        echo "comment is not added !";
    }

}

?>