<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div style="display: flex;justify-content: center;" class="my-4">
        <form action="db/reg_db.php" method="POST">
            <div>
                <h3>สมัครสมาชิก</h3>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
                <?php }?>
                <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
                <?php }?>
            </div>
            <div>
                <label class="form-label">ชื่อจริง</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div>
                <label class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div>
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div>
                <label  class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div>
                <label  class="form-label">ยืนยันรหัสผ่าน</label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <div>
                <label  class="form-label">ที่อยู่</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div>
                <label  class="form-label">เบอร์มือถือ</label>
                <input type="text" class="form-control" name="tel">
            </div>
            <input type="submit" class="btn btn-primary my-2" name="submit" value="สมัครสมาชิก"></input>
            <p>คุณมีบัญชีแล้วใช่ไหม<a href="login.php">คลิกที่นี่</a>เพื่อเข้าสู่ระบบ</p>
        </form>
    </div>
</body>
</html>