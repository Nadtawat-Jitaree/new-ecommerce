<?php
    session_start();
        require('db.php');
        $id_user=$_GET['id'];
        $sql_check = "SELECT * FROM users WHERE id_user='$id_user'";
        $query_check = mysqli_query($conn,$sql_check);
        $check = mysqli_num_rows($query_check);
        if($check>=1){
            $sql = "DELETE FROM users WHERE id_user='$id_user'";
            mysqli_query($conn , $sql);
            $_SESSION['error']='ลบบัญชีนี้สำเร็จ';
            header('location: ../admin_system.php');
        }else{
            $_SESSION['error']='เกิดข้อผิดพลาด';
            header('location: ../admin_system.php');
        }
?>