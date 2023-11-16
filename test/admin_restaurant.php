<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['error']='ต้องเข้าสู่ระบบก่อน';
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมนูผู้ดูแลร้านอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div><?php include('menu.php')?></div>
    <div style="margin-top: 80px;margin-left: 20%;margin-right: 20%;">
        <h3>เมนูผู้ดูแลร้านอาหาร</h3> <a href="add_type_food.php" class="btn btn-success my-1">เพิ่มหมวดหมู่อาหาร</a>
        <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
        <?php }?>
        <?php if(isset($_SESSION['success'])){?>
            <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
        <?php }?>
        <table class="table table-success table-striped">
            <tr>
                <td>ลำดับ</td>
                <td></td>
                <td>ชื่อจริง</td>
                <td>นามสกุล</td>
                <td>role</td>
                <td>ที่อยู่</td>
                <td>เบอร์มือถือ</td>
                <td>วัน/เวลาที่สร้างบัญชี</td>
                <td></td>
            </tr>
            <?php 
            require('db/db.php');
            $sql = "SELECT * FROM users";
            $query = mysqli_query($conn , $sql);
            $num=1;
            while($rows=mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $num++?></td>
                <td><img src="images/<?php echo $rows['image_user']?>" width="50px" alt=""></td>
                <td><?php echo $rows['firstname']?></td>
                <td><?php echo $rows['lastname']?></td>
                <td>
                    <form action="db/edit_role_db.php" method="POST">
                        <input type="hidden" name="id_user" value="<?php echo $rows['id_user']?>">
                        <select name="role" id="">
                            <option value="<?php echo $rows['role']?>">ปัจจุบัน : <?php echo $rows['role']?></option>
                            <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                            <option value="ผู้ดูแลร้านอาหาร">ผู้ดูแลร้านอาหาร</option>
                            <option value="ผู้ส่งอาหาร">ผู้ส่งอาหาร</option>
                            <option value="สมาชิก">สมาชิก</option>
                        </select>
                        <input type="submit" name="submit" value="แก้ไข" class="btn btn-success">
                    </form>
                </td>
                <td><?php echo $rows['address']?></td>
                <td><?php echo $rows['tel']?></td>
                <td><?php echo $rows['date_user']?></td>
                <td><a href="db/delete_user_db.php?id=<?php echo $rows['id_user']?>" class="btn btn-danger">ลบ</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>