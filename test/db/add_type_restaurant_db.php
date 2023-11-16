<?php
    session_start();
    if(isset($_POST['submit'])){
        require('db.php');
        $type_restaurant = $_POST['type_restaurant'];
        $sql = "INSERT INTO type_restaurant(type_restaurant) VALUES('$type_restaurant')";
        mysqli_query($conn , $sql);
        $_SESSION['success']='เพิ่มประเภทร้านอาหารสำเร็จ';
        header('location: ../add_type_restaurant.php');
    }
?>