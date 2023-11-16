<?php
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $address=$_POST['address'];
        $tel=$_POST['tel'];

        $username=$_SESSION['username'];

        if(empty($firstname)){
            $_SESSION['error']='กรุณากรอกชื่อจริง!!';
            header('location: ../setting.php');
        }else if(empty($lastname)){
            $_SESSION['error']='กรุณากรอกนามสกุล!!';
            header('location: ../setting.php');
        }else if(empty($address)){
            $_SESSION['error']='กรุณากรอกที่อยู่!!';
            header('location: ../setting.php');
        }else if(empty($tel)){
            $_SESSION['error']='กรุณากรอกเบอร์มือถือ!!';
            header('location: ../setting.php');
        }

        if(!isset($_SESSION['error'])){
            if($_FILES['image_user']['type']=='image/jpeg' || $_FILES['image_user']['type']=='image/png'){


                if(empty($_FILES['image_user'])){
                    $sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',address='$address',tel='$tel' WHERE username='$username'";
                    mysqli_query($conn , $sql);
                    $_SESSION['success']='แก้ไขข้อมูลส่วนตัวสำเร็จ';
                    header('location: ../setting.php');
                }else{
                    $sql_check = "SELECT * FROM users WHERE username='$username'";
                    $query_check = mysqli_query($conn , $sql_check);
                    $fetch = mysqli_fetch_assoc($query_check);
                    $filename = $fetch['image_user'];
                    unlink("../images/".$filename);
                    $filename = $_FILES['image_user']['name'];
                    $tmp_name = $_FILES['image_user']['tmp_name'];
                    $floder = "../images/$username".$filename;

                    if(move_uploaded_file($tmp_name , $floder)){
                        $sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',address='$address',tel='$tel',image_user='$username$filename' WHERE username='$username'";
                        mysqli_query($conn , $sql);
                        $_SESSION['success']='แก้ไขข้อมูลส่วนตัวสำเร็จ';
                        header('location: ../setting.php');
                    }
                }
            }else{
                $sql = "UPDATE users SET firstname='$firstname',lastname='$lastname',address='$address',tel='$tel' WHERE username='$username'";
                mysqli_query($conn , $sql);
                $_SESSION['success']='แก้ไขข้อมูลส่วนตัวสำเร็จ';
                header('location: ../setting.php');
            }

        }
    }else{
        $_SESSION['error']='เกิดข้อผิดพลาด';
        header('location: ../setting.php');
    }
?>