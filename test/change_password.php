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
    <title>เปลี่ยนรหัสผ่าน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('menu.php')?>
    <div style="display: flex;justify-content: center;" class="my-4">
        <form action="db/change_password_db.php" method="POST">
            <div>
                <h3>เปลี่ยนรหัสผ่าน</h3>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
                <?php }?>
                <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
                <?php }?>
            </div>
            <div>
                <label class="form-label">รหัสผ่านเดิม</label>
                <input type="password" class="form-control" name="old_password">
            </div>
            <div>
                <label  class="form-label">รหัสผ่านใหม่</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div>
                <label  class="form-label">รหัสผ่านใหม่ อีกครั้ง</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <input type="submit" class="btn btn-success my-2" name="submit" value="ยืนยัน"></input>
        </form>
    </div>
</body>
</html>