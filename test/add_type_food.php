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
    <title>เพิ่มหมวดหมู่อาหาร</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div><?php include('menu.php')?></div><br><br>
    <div style="display: flex;justify-content: center;" class="my-4">
        <form action="db/add_type_food_db.php" method="POST">
            <div>
                <h3>เพิ่มหมวดหมู่อาหาร</h3>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></div>
                <?php }?>
                <?php if(isset($_SESSION['success'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];unset($_SESSION['success'])?></div>
                <?php }?>
            </div>
            <div>
                <label class="form-label">ชื่อหมวดหมู่อาหาร</label>
                <input type="text" class="form-control" name="type_food">
            </div>
            <input type="submit" class="btn btn-success my-2" name="submit" value="เพิ่มหมวดหมู่อาหาร"></input>
        </form>
    </div>
    <div style="margin-left: 20%;margin-right: 20%;">
        <table class="table table-success table-striped">
            <tr>
                <td width="50px">ลำดับ</td>
                <td>ชื่อหมวดหมู่อาหาร</td>
                <td width="50px"></td>
            </tr>
            <?php 
            require('db/db.php');
            $sql = "SELECT * FROM type_foods";
            $query = mysqli_query($conn , $sql);
            $num=1;
            while($rows=mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $num++?></td>
                <td><?php echo $rows['type_food']?></td>
                <td><a href="db/delete_type_food_db.php?id=<?php echo $rows['id_type_food']?>" class="btn btn-danger">ลบ</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>