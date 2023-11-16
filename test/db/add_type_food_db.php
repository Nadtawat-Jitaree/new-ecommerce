<?php
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $type_food = $_POST['type_food'];
        $sql = "INSERT INTO type_foods(type_food) VALUES('$type_food')";
        mysqli_query($conn , $sql);
        $_SESSION['success']='เพิ่มหมวดหมู่อาหารสำเร็จ!!';
        header('location: ../add_type_food.php');
    }
?>