<?php
    session_start();
        require('db.php');
        $id_type_food=$_GET['id'];
        $sql_check = "SELECT * FROM type_foods WHERE id_type_food=$id_type_food";
        $query_check = mysqli_query($conn,$sql_check);
        $check = mysqli_num_rows($query_check);
        if($check>=1){
            $sql = "DELETE FROM type_foods WHERE id_type_food=$id_type_food";
            mysqli_query($conn , $sql);
            $_SESSION['error']='ลบหมวดหมู่อาหารสำเร็จ!!';
            header('location: ../add_type_food.php');
        }else{
            $_SESSION['error']='เกิดข้อผิดพลาด';
            header('location: ../add_type_food.php');
        }
?>