<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thêm Sản phẩm</title>
    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
     <!--Thu vien Jquery-->  
     <script src="./bootstrap-4.5.3-dist/js/jquery-3.5.1.min.js"></script>

     <!--Thuộc tính Jquery-->
     <script src="./bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
     <style>
        .bgCreate{
            background: url(./img/Background-dep-vector.jpg);
        }  
        .bgProduct{
            background: url(./img/bg.jpg);
        }
        .card{
            box-shadow: 10px 5px 15px black;
        }
     </style>
</head>
<body>
<nav class=" navbar navbar-expand-lg navbar-light bg-dark fixed-top opacity">
      <img  src="./img/logo.png" width="5%"><a class="navbar-brand text-light font-weight-bolder" href="./addProduct.php"> aNSport</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="./addProduct.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Shop
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./addProduct.php">Giày thể thao</a>
                <a class="dropdown-item" href="./addProduct.php">Áo thể thao</a>
                <a class="dropdown-item" href="./addProduct.php">Phụ kiện</a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light " href="./addProduct.php"> AboutUs </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="./addProduct.php"> News </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="./addProduct.php"> Contact </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="https://www.facebook.com/an.lamduong"> MyFacebook </a>
            </li>
          </ul>
 
</div>
</nav>
<?php 
    require 'connect.php';
    if(isset($_POST['submit'])) {
        $sql = "INSERT INTO giaythethao(imgSP, nameSP, priceSP, countSP, brandSP, noteSP)
        VALUES(" ."'" .$_POST['pic'] . "'," 
                . "'" .$_POST['name'] . "',"  
                . "'" .$_POST['price'] . "'," 
                . "'" .$_POST['count'] . "',"  
                . "'" .$_POST['brand'] . "'," 
                . "'" .$_POST['note'] . "')";
        connect::connectDataBase($sql);  //Kiểm tra lỗi kèm xuất biến       
    }
    
?>
<br><br>
<div class="row bgCreate">
    <div class="col-4">
        <form action="addProduct.php" method="post">
            <div class=" mt-3 ml-3" align="center" id="form">
                <h3 class="text-light font-weight-bold">Nhập Thông Tin Sản Phẩm</h3>
                <label class="text-light">Ảnh Sản phẩm</label> <br>
                <input type="text" name="pic" placeholder="Nhập ảnh"><br>
                <label class="text-light">Tên Sản phẩm</label> <br>
                <input type="text" name="name" placeholder="Nhập tên"><br>
                <label class="text-light">Giá Thành</label> <br>
                <input type="text" name="price" placeholder="Nhập giá"><br>
                <label class="text-light">Số lượng</label> <br>
                <input type="text" name="count" placeholder="Nhập số lượng"><br>
                <label class="text-light">Nhà cung cấp</label> <br>
                <input type="text" name="brand" placeholder="Nhập nhà cung cấp"><br>
                <label class="text-light">Mô Tả</label> <br>
                <textarea name="note" id="" cols="30" rows="5" placeholder="Nhập mô tả"></textarea>
                <div class="mt-3">
                    <input class="btn btn-success" type="submit" name="submit" value="Thêm Sản phẩm">
                    <input class="btn btn-warning" type="reset" name="" value="Làm mới">
                </div>
            </div>
        </form>
    </div>  <!-- End col-4 -->
    <div class="col-7">
        <H3 class="text-center mt-3 text-light font-weight-bold">ĐỊA CHỈ SHOP</H3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.477576279843!2d106.63214551488504!3d10.774687292322685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea168a65c0b%3A0x2a4a7dc43e177de1!2zMTIgVHLhu4tuaCDEkMOsbmggVGjhuqNvLCBIb8OgIFRoYW5oLCBUw6JuIFBow7osIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1626417992906!5m2!1svi!2s" 
        width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>  <!-- End row -->
<h2 Class=" m-0 text-center bg-primary text-light font-weight-bolder">DANH SÁCH SẢN PHẨM</h2>
<div class="bgProduct">
<form class="container text-right" action="searchSP.php" method="get">
        <input type="text" name="search" placeholder="Tìm kiếm" style="height:100%;">
        <input type="submit" value="Tìm" class="btn btn-warning">
    </form>
<?php
    $sql = "SELECT * FROM giaythethao";
    $result = connect::connectDataBase($sql);
    
    //Hiển thị danh sách sản phẩm
    echo "<div class='row'>";
    $stt = 1;
    while ($row =mysqli_fetch_array($result)) {
        
        echo "<div class='col-12 col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3'>";
        echo "<div class='card text-center' style='width: 18rem;'>";
        echo $stt;
        echo "<img class='card-img-top' src='img/" . $row['imgSP'] . "'>";
        echo "<div class='card-body'>";
        echo "<h4 class='card-title'>" . $row['nameSP'] . "</h4>";
        echo "<h5 class='card-text'>" . $row['priceSP'] . " VNĐ </h5>";
        echo "<h5 class='card-text'>Số lượng: " . $row['countSP'] . "</h5>";
        echo "<h5 class='card-text'>Nhà cung cấp: " . $row['brandSP'] . "</h5>";
        echo "<h5 class='card-text'>Mô tả </h5>";
        echo "<p class='card-text'>" . nl2br($row['noteSP']) . "</p>";
        echo "<a href='delSP.php?id=".$row['codeSP']."'><input class='btn btn-outline-danger mr-3' type='button' value='Xóa'></a>";
        echo "<a href='editSP.php?id=".$row['codeSP']."'><input class='btn btn-outline-success' type='button' value='Chỉnh sửa'></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        $stt++;
    }
   
    echo "</div>";
?>
</div>
</body>
</html>