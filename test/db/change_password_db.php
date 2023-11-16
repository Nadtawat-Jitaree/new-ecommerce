<?php
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $old_password=$_POST['old_password'];
        $password=$_POST['password'];
        $c_password=$_POST['c_password'];
        $username=$_SESSION['username'];

        if(empty($old_password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่านเดิม!!';
            header('location: ../change_password.php');
        }else if(empty($password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่านใหม่!!';
            header('location: ../change_password.php');
        }else if(empty($c_password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่านใหม่อีกครั้ง!!';
            header('location: ../change_password.php');
        }else if($password!=$c_password){
            $_SESSION['error']='กรุณากรอกรหัสผ่านใหมให้ตรงกัน!!';
            header('location: ../change_password.php');
        }

        if(!isset($_SESSION['error'])){
            $sql_check = "SELECT * FROM users WHERE username='$username' AND password='$old_password'";
            $query_check = mysqli_query($conn,$sql_check);
            $check = mysqli_num_rows($query_check);
            if($check>=1){
                $sql = "UPDATE users SET password='$password' WHERE username='$username'";
                mysqli_query($conn , $sql);
                $_SESSION['success']='เปลี่ยนรหัสผ่านของคุณเรียบร้อย';
                header('location: ../change_password.php');
            }else{
                $_SESSION['error']='รหัสผ่านผิด!!';
                header('location: ../change_password.php');
            }
        }
    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด';
        header('location: ../change_password.php');
    }
?>