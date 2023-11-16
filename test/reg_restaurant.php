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
    <title>ลงทะเบียนร้านอาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div><?php include('menu.php')?></div><br><br>
    <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
    <?php }?>
    <?php if(isset($_SESSION['success'])){?>
        <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
    <?php }?>
    <div style="display: flex;justify-content: center;" class="my-4">
        <form action="db/reg_restaurant_db.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>ลงทะเบียนร้านอาหาร</h3>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
                <?php }?>
                <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
                <?php }?>
            </div>
            <div>
                <label class="form-label">ชื่อร้านอาหาร</label>
                <input type="text" class="form-control" name="name_restaurant">
            </div>
            <div>
                <label  class="form-label">รายละเอียดร้านค้า</label>
                <input type="text" class="form-control" name="detail_restaurant">
            </div>
            <div>
                <label  class="form-label">ประเภทร้านอาหาร</label>
                <select name="id_type_restaurant" id="" class="form-control">
                    <?php 
                        require('db/db.php');
                        $sql = "SELECT * FROM type_restaurant";
                        $query = mysqli_query($conn , $sql);
                        while($rows=mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?php echo $rows['id_type_restaurant']?>"><?php echo $rows['type_restaurant']?></option>
                    <?php }?>
                </select>
            </div>
            <div>
                <label  class="form-label">โลโก้ร้านอาหาร</label>
                <input type="file" class="form-control" name="image_restaurant">
            </div>
            <input type="submit" class="btn btn-success my-2" name="submit" value="ลงทะเบียนร้านค้า"></input>
        </form>
    </div>
</body>
</html>