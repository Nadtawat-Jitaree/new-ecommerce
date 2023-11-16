<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">หน้าแรก</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <?php
          require('db/db.php');
          $username=$_SESSION['username'];
          $sql = "SELECT * FROM users WHERE username='$username'";
          $query = mysqli_query($conn , $sql);
          $fetch = mysqli_fetch_assoc($query);
        ?>
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><img style="border-radius: 200px;" src="images/<?php echo $fetch['image_user']?>" width="50px" alt=""> <?php echo $fetch['username'].' ['.$fetch['role'].']'?> <a href="logout.php" class="btn btn-danger">Logout</a></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <?php 
              $sql_admin_system = "SELECT * FROM users WHERE username='$username' AND role='ผู้ดูแลระบบ'";
              $query_admin_system = mysqli_query($conn , $sql_admin_system);
              $admin_system = mysqli_num_rows($query_admin_system);
              if($admin_system>=1){
            ?>
            <a class="nav-link" href="admin_system.php">⚙ เมนูผู้ดูแลระบบ</a>
              <?php } ?>
          </li>
          <li class="nav-item">
            <?php 
              $sql_admin_restaurant = "SELECT * FROM users WHERE username='$username' AND role='ผู้ดูแลร้านอาหาร'";
              $query_admin_restaurant = mysqli_query($conn , $sql_admin_restaurant);
              $admin_restaurant = mysqli_num_rows($query_admin_restaurant);
              if($admin_restaurant>=1){
            ?>
            <a class="nav-link" href="admin_restaurant.php">⚙ เมนูผู้ดูแลร้านอาหาร</a>
              <?php } ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">🛍️ ตะกร้าสินค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">🛍️ คำสั่งซื้อ</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ลงทะเบียน
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="reg_restaurant.php">ร้านอาหาร</a></li>
              <li><a class="dropdown-item" href="#">ผู้ส่งอาหาร</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="setting.php">⚙ ตั้งค่าข้อมูลส่วนตัว</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="change_password.php">⚙ เปลี่ยนรหัสผ่าน</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>