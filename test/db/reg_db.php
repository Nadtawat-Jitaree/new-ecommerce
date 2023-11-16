<?php 
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        
        if(empty($firstname)){
            $_SESSION['error']='กรุณากรอกชื่อจริง!!';
            header('location: ../register.php');
        }else if(empty($lastname)){
            $_SESSION['error']='กรุณากรอกนามสกุล!!';
            header('location: ../register.php');
        }else if(empty($username)){
            $_SESSION['error']='กรุณากรอกUsername!!';
            header('location: ../register.php');
        }else if(empty($password)){
            $_SESSION['error']='กรุณากรอกรหัสผ่าน!!';
            header('location: ../register.php');
        }else if(empty($c_password)){
            $_SESSION['error']='กรุณากรอกยืนยันรหัสผ่าน!!';
            header('location: ../register.php');
        }else if(empty($address)){
            $_SESSION['error']='กรุณากรอกที่อยู่!!';
            header('location: ../register.php');
        }else if(empty($tel)){
            $_SESSION['error']='กรุณากรอกเบอร์มือถือ!!';
            header('location: ../register.php');
        }else if($password!=$c_password){
            $_SESSION['error']='รหัสผ่านไม่ตรงกัน!!';
            header('location: ../register.php');
        }

        $sql_check_username = "SELECT * FROM users WHERE username='$username'";
        $query_check_username = mysqli_query($conn,$sql_check_username);
        $check_username = mysqli_num_rows($query_check_username);
        if($check_username>=1){
            $_SESSION['error']='ชื่อ Username นี้มีอยู่ในระบบอยู่แล้ว!!';
            header('location: ../register.php');
        }

        if(!isset($_SESSION['error'])){
            $sql = "INSERT INTO users(firstname,lastname,username,password,role,address,tel) VALUES('$firstname','$lastname','$username','$password','สมาชิก','$address','$tel');";
            $query = mysqli_query($conn,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['sucess'] = 'สมัครสมาชิกสำเร็จ!!';
            header('location: ../login.php');
        }
    }else {
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../register.php');
    }
?>