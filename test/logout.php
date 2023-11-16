<?php
    session_start();
    session_destroy();
    $_SESSION['error']='ออกจากระบบแล้ว';
    header('location: login.php');
?>