<?php
    session_start();
        require('db.php');
        $id_type_restaurant=$_GET['id'];
        $sql_check = "SELECT * FROM type_restaurant WHERE id_type_restaurant=$id_type_restaurant";
        $query_check = mysqli_query($conn,$sql_check);
        $check = mysqli_num_rows($query_check);
        if($check>=1){
            $sql = "DELETE FROM type_restaurant WHERE id_type_restaurant=$id_type_restaurant";
            mysqli_query($conn , $sql);
            $_SESSION['error']='ลบประเภทร้านอาหารสำเร็จ';
            header('location: ../add_type_restaurant.php');
        }else{
            $_SESSION['error']='เกิดข้อผิดพลาด';
            header('location: ../add_type_restaurant.php');
        }
?>