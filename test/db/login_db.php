<?php 
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username)){
            $_SESSION['error']='กรุณากรอก Username!!';
            header('location: ../login.php');
        }else if(empty($password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่าน!!';
            header('location: ../login.php');
        }

        if(!isset($_SESSION['error'])){
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $query = mysqli_query($conn,$sql);
            $check_username = mysqli_num_rows($query);
            if($check_username>=1){
                $_SESSION['username'] = $username;
                $_SESSION['sucess'] = 'เข้าสู่ระบบสำเร็จ!!';
                header('location: ../index.php');
            }else {
                $_SESSION['error']='รหัสผ่าน หรือ Username ผิด!!';
                header('location: ../login.php');
            }
        }
    }else {
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../login.php');
    }
?>