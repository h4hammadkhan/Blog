<?php

    function getCategory($conn, $id){
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data['name'];
    }


    function getAllCategory($conn){
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }

    function getimages($conn, $post_id){
        $sql = "SELECT * FROM images WHERE post_id=$post_id";
        $result = mysqli_query($conn,$sql);
        $data = array();
        
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }

        return $data;
    }
    
    function getallimages($conn){
        $sql = "SELECT * FROM images ORDER BY id DESC";
        $result = mysqli_query($conn,$sql);
        $data = array();
        
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }

        return $data;
    }

    function getoneimage($conn, $id){
        $sql = "SELECT * FROM images WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data['image'];
    }


    function getcomment($conn, $post_id){
        $sql = "SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC";
        $result = mysqli_query($conn,$sql);
        $data = array();
        
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }

        return $data;
    }

    function getsubmenu($conn, $menu_id){
        $sql = "SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
        $result = mysqli_query($conn, $sql);
        $data = array();
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }
        return $data;
    }

    
    function getsubmenuNo($conn,$menu_id){
        $sql = "SELECT * FROM submenu WHERE parent_menu_id=$menu_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result);
    }

    function getAdminInfo($conn, $email){
        $sql = "SELECT * FROM admin WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function getAdminThumb($conn, $id){
        $sql = "SELECT * FROM admin WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data['profile'];
    }

    function getmenu($conn){
        $sql = "SELECT * FROM menu ";
        $result = mysqli_query($conn, $sql);
        $data = array();
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }
        return $data;
    }

    function getAllComment($conn){
        $sql = "SELECT * FROM comments ORDER BY id DESC ";
        $result = mysqli_query($conn, $sql);
        $data = array();
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }
        return $data;
    }

    function getAllCommentNo($conn){
        $sql = "SELECT * FROM comments";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }

    function getAllsubmenu($conn){
        $sql = "SELECT * FROM submenu ";
        $result = mysqli_query($conn, $sql);
        $data = array();
        while($fetch = mysqli_fetch_assoc($result)){
            $data[] = $fetch;
        }
        return $data;
    }

    function getAllsubmenuName($conn, $id){
        $sql = "SELECT * FROM submenu WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data['name'];
    }

    function getMenuName($conn, $id){
        $sql = "SELECT * FROM menu WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data['name'];
    }

    function getAllPost($conn){
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }

    function getAllPostNo($conn){
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        return $row;
    }

    function getPostName($conn, $id){
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data['title'];
    }

    
    function getPostThumb($conn,$id){
        $sql = "SELECT * FROM images WHERE post_id=$id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data['image'];
    }




?>