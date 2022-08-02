<?php

    require('db.php');

    if(isset($_POST['save'])){
        
        $id = $_GET['id'];
        $full_name = mysqli_real_escape_string($conn, $_POST['full-name']);
        $country = mysqli_real_escape_string($conn, $_POST['c-name']);
        $occupation = mysqli_real_escape_string($conn, $_POST['occu']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $re_password = mysqli_real_escape_string($conn, $_POST['re-password']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

        if($password==$re_password){
            
            $sql = "UPDATE admin SET full_name='$full_name', email='$email', password='$password', country='$country', occupation='$occupation', mobile='$mobile' WHERE id=$id";
            $result = mysqli_query($conn, $sql);

            header('location:../admin/profile.php');
        }
        else{
            echo "<script>alert('Password confirmation dosen't match!');</script>";
        }




    }


?>