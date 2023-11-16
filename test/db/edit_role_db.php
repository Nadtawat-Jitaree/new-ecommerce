<?php
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $id_user=$_POST['id_user'];
        $role=$_POST['role'];

            $sql_check = "SELECT * FROM users WHERE id_user='$id_user'";
            $query_check = mysqli_query($conn,$sql_check);
            $check = mysqli_num_rows($query_check);
            if($check>=1){
                $sql = "UPDATE users SET role='$role' WHERE id_user='$id_user'";
                mysqli_query($conn , $sql);
                $_SESSION['success']='เปลี่ยนบทบาทเรียบร้อย';
                header('location: ../admin_system.php');
            }else{
                $_SESSION['error']='ไม่มี User นี้!!';
                header('location: ../admin_system.php');
            }
    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด';
        header('location: ../admin_system.php');
    }
?>