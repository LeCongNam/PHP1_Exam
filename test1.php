<?php
include "DataProvider.php";


$id    = "";
$Avatar = "";
$Avatar     = "";
$hoTen     = "";
$gioiTinh     = "";
$chucVu     = "";
$ngaySinh     = "";
$noiSinh   = "";

if (isset($_POST["submit"]) == "post") {


    $id = $_POST["id"];
    $Avatar = $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];
    $Avatar = "img/" . $Avatar;
    $hoTen = $_POST["hoten"];
    $gioiTinh = $_POST["gioitinh"];
    $chucVu = $_POST["chucvu"];
    $ngaySinh = $_POST["ngaysinh"];
    $noiSinh = $_POST["noisinh"];



    $sql = "INSERT INTO nhanvien(id, Avatar, ho_ten, gioi_tinh, Nam_sinh, chuc_vu, Noi_Sinh) 
  VALUES('$id', '$Avatar', '$hoTen', '$gioiTinh', '$ngaySinh', '$chucVu', '$noiSinh')";

    DataProvider::executeQuery($sql);
    move_uploaded_file($image_tmp, "img/" . $_FILES["img"]["name"]);
}



?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- id, Avatar, ho_ten, gioi_tinh, Nam_sinh, chuc_vu, Noi_Sinh -->
    <form action="" method="post" enctype="multipart/form-data">
        id<input type="text" name="id" id="id"><br>
        img<input type="file" name="img" id="img"><br>
        hoten <input type="text" name="hoten" id="hoten"><br>
        <span>gtinh</span>
        nam<input type="radio" name="gioitinh" id="" value="nam"><br>
        nữ<input type="radio" name="gioitinh" id="" value="nu"><br>
        Ngày sinh<input type="date" name="ngaysinh" id=""><br>
        chucvu<input type="text" name="chucvu" id=""><br>
        nơi sinh<input type="text" name="noisinh" id="">
        <input type="submit" name="submit" id="submit">
    </form>

</body>

</html>