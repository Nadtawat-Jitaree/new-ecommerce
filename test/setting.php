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
    <title>ตั้งค่าข้อมูลส่วนตัว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div><?php include('menu.php')?></div>
    <br><br>
    <div style="display: flex;justify-content: center;" class="my-4">
        <form action="db/setting_db.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>ตั้งค่าข้อมูลส่วนตัว</h3>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
                <?php }?>
                <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
                <?php }?>
            </div>
            <?php
                $username=$_SESSION['username'];
                $sql = "SELECT * FROM users WHERE username='$username'";
                $query = mysqli_query($conn,$sql);
                $fetch = mysqli_fetch_assoc($query);
            ?>
            <div>
                <label class="form-label">ชื่อจริง</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $fetch['firstname']?>">
            </div>
            <div>
                <label class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $fetch['lastname']?>">
            </div>
            <div>
                <label  class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="address" value="<?php echo $fetch['address']?>">
            </div>
            <div>
                <label  class="form-label">เบอร์มือถือ</label>
                <input type="text" class="form-control" name="tel" value="<?php echo $fetch['tel']?>">
            </div>
            <div>
                <label  class="form-label">รูปภาพโปรไฟล์</label>
                <input type="file" class="form-control" name="image_user">
                <div><img src="images/<?php echo $fetch['image_user']?>" width="100px" alt=""></div>
            </div>
            <input type="submit" class="btn btn-primary my-2" name="submit" value="แก้ไข"></input>
        </form>
    </div>
</body>
</html>