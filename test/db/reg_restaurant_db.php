<?php 
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $name_restaurant = $_POST['name_restaurant'];
        $detail_restaurant = $_POST['detail_restaurant'];
        $id_type_restaurant = $_POST['id_type_restaurant'];
        $username = $_SESSION['username'];
        
        if(empty($name_restaurant)){
            $_SESSION['error']='กรุณากรอกชื่อร้านอาหาร!!';
            header('location: ../reg_restaurant.php');
        }else if(empty($detail_restaurant)){
            $_SESSION['error']='กรุณากรอกรายละเอียดร้านอาหาร!!';
            header('location: ../reg_restaurant.php');
        }

        $sql_check_name = "SELECT * FROM restaurants WHERE username='$username'";
        $query_check_name = mysqli_query($conn,$sql_check_name);
        $check_name = mysqli_num_rows($query_check_name);
        if($check_name>=1){
            $_SESSION['error']='มีชื่อ Username นี้อยู่ในระบบลงทะเบียนอยู่แล้ว';
            header('location: ../reg_restaurant.php');
        }

        if(!isset($_SESSION['error'])){
            if($_FILES['image_restaurant']['type']=="image/jpeg" || $_FILES['image_restaurant']['type']=="image/png"){
                if(empty($_FILES['image_restaurant'])){
                    $sql = "INSERT INTO restaurants(name_restaurant,detail_restaurant,username,verify_restaurant,id_type_restaurant) VALUES('$name_restaurant','$detail_restaurant','$username','รอยืนยัน',$id_type_restaurant);";
                    $query = mysqli_query($conn,$sql);
                    $_SESSION['sucess'] = 'ลงทะเบียนร้านอาหารสำเร็จ รอยืนยัน!!';
                    header('location: ../index.php');
                }else{
                    $filename = $_FILES['image_restaurant']['name'];
                    $tmp_name = $_FILES['image_restaurant']['tmp_name'];
                    $floder = "../images/$name_restaurant".$filename;

                    if(move_uploaded_file($tmp_name,$floder)){
                        $sqlsuccess = "INSERT INTO restaurants(name_restaurant,detail_restaurant,image_restaurant,username,verify_restaurant,id_type_restaurant) VALUES('$name_restaurant','$detail_restaurant','$name_restaurant$filename','$username','รอยืนยัน',$id_type_restaurant);";
                        mysqli_query($conn,$sqlsuccess);
                        $_SESSION['sucess'] = 'ลงทะเบียนร้านอาหารสำเร็จ รอยืนยัน!!';
                        header('location: ../index.php');
                    }
                }
            }
        }
    }else {
        $_SESSION['error']='เกิดข้อผิดพลาด!!';
        header('location: ../reg_restaurant.php');
    }
?>