<?php
include "DataProvider.php";

$id = $Avatar = $hoTen = $chucVu = $ngaySinh = $noiSinh = $gioiTinh = "";
$id_error = $Avatar_error = $hoTen_error = $chucVu_error
    = $ngaySinh_error = $noiSinh_error = $gioiTinh_error = "";

    // Xổ Data vào ô input
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_get = $_GET["id"];
    $sql = "SELECT * FROM nhanvien WHERE id = $id_get";
    $query = DataProvider::executeQuery($sql);
    
    while ($result_arr = mysqli_fetch_array($query)) {
        // id, Avatar, ho_ten, gioi_tinh, Nam_sinh, chuc_vu, Noi_Sinh
        $id = $result_arr["id"] ;
       
        $hoTen = $result_arr["ho_ten"] ;
        $gioiTinh = $result_arr["gioi_tinh"] ;
        $chucVu = $result_arr["chuc_vu"] ;
        $ngaySinh = $result_arr["Nam_sinh"] ;
        $noiSinh = $result_arr["Noi_Sinh"] ;
    }
}


// thực thi Edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id_edit"];
    $Avatar = $_FILES['img']['name'];
    $image_tmp = $_FILES['img']['tmp_name'];
    $Avatar = "img/" . $Avatar;
    $hoTen = $_POST["hoten"];
    $gioiTinh = $_POST["gioitinh"];
    $chucVu = $_POST["chucvu"];
    $ngaySinh = $_POST["ngaysinh"];
    $noiSinh = $_POST["noisinh"];



    if ($id == "") {
        $id_error = "vui lòng điền ID";
    } elseif (!is_numeric($id)) {
        $id_error = "ID phải là số";
    }


    if ($Avatar == "") {
        $Avatar_error = "Vui lòng tải lên ảnh của bạn";
    }

    if ($hoTen == "") {
        $hoTen_error = "Họ Tên không được để trống!!";
    }

    if ($chucVu == "") {
        $chucVu_error = "Vui lòng không để trống chức vụ";
    } elseif ($chucVu != "") {
        $chucVu_array = ["Giám đốc", "Phó giám đốc", "Nhân Viên", "Trưởng phòng KD", "trưởng phòng"];
        $count = 0;
        foreach ($chucVu_array as $value) {
            if ($chucVu == $value) {
                $count++;
            }
        }
        if ($count == 0) {
            $chucVu_error = "Chức vụ nhập không đúng !";
        } else {
            $chucVu_error = "1";
        }
    }

    $ngayHT = date("Y-m-d");

    if ($ngaySinh == $ngayHT) {
        $ngaySinh_error = "Vui lòng chọn năm sinh < ngày hiện tại!!";
    } elseif ($ngaySinh > $ngayHT) {
        $ngaySinh_error = "Ngày sinh không hợp lệ";
    }



    if ($noiSinh == "") {
        $noiSinh_error = "Nơi sinh không được bỏ trống";
    }

            // id, Avatar, ho_ten, gioi_tinh, Nam_sinh, chuc_vu, Noi_Sinh
            $sql = "UPDATE nhanvien SET id='$id',Avatar='$Avatar',ho_ten='$hoTen',gioi_tinh='$gioiTinh',Nam_sinh='$ngaySinh',chuc_vu='$chucVu',Noi_Sinh='$noiSinh' WHERE id= '$id'";
    if ($id != "" && $Avatar != "" && $hoTen != "" && $gioiTinh != "" && $ngaySinh != "" && $chucVu != "" && $noiSinh != "") {
        DataProvider::executeQuery($sql);
        move_uploaded_file($image_tmp, "img/" . $_FILES["img"]["name"]);
        header("location: index.php");
    }
}




?>



<!doctype html>
<html lang="en">

<head>
    <title>Edit nhân viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col header-left">
                <!-- start form -->
                <form action="" method="post" id="form-1" class="p-2" enctype="multipart/form-data">
                    <!-- headding -->
                    <h3 class="text-center mb-3">Quản Lí nhân viên</h3>
                    <!-- id -->
                    <div class="form-group row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" name="id_edit" id="id" class="form-control" placeholder="ID: 123456" aria-describedby="helpId" value=" <?php echo $id; ?>">
                                <span name="id_error" class="error_message">*<?php echo $id_error; ?></span>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col pl-3">
                            <div class="form-group">
                                <label for="img_upload">Avatar</label>
                                <input type="file" name="img" id="img"  class="btn btn-info btn-outline-light" style="height:39px ;     margin-left: 0px !important;">
                                <span name="Avatar_error" class="error_message">*<?php echo $Avatar_error; ?></span>
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-group ml-4 "> 
                                <label for="hoten">Họ tên</label>
                                <input type="text" name="hoten" id="hoten" class="form-control" placeholder="vd: Nguyen A" aria-describedby="helpId" value="<?php echo $hoTen; ?>">
                                <span class="error_message" name="hoten_error">* <?php echo $hoTen_error; ?></span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group ml-3 mt-2">
                                <label for="gioitinh">Giới Tính</label>
                                <span class="error_message">*<?php echo $gioiTinh_error; ?></span><br>
                                <input type="radio" name="gioitinh" id="" class="form-check-input" value="Nam" <?php echo ($gioiTinh=="Nam")?"Checked":""; ?> >Nam <i class="fas fa-mars-stroke"></i><br>
                                <input type="radio" name="gioitinh" id="" class="form-check-input" value="Nữ" <?php echo ($gioiTinh=="Nữ")?"Checked":""; ?> >Nữ<i class="fas fa-venus"></i>
                            </div>
                        </div>
                    </div>
                    <!-- end row 1 -->

                    <div class="form-group row">

                        <div class="col">
                            <div class="form-group">
                                <label for="chucvu">Chức Vụ (Viết in hoa chữ đầu: vd "Giám đốc")</label>
                                <input type="text" name="chucvu" id="chucvu" class="form-control" placeholder="vd: nhân viên" aria-describedby="helpId" value="<?php echo $chucVu; ?>">
                                <span class="error_message" name="chucvu_error">* <?php echo $chucVu_error; ?></span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="noisinh">Nơi Sinh</label>
                                <input type="text" name="noisinh" id="noisinh" class="form-control" placeholder="vd: bình thuận" aria-describedby="helpId" value="<?php echo $noiSinh; ?>"> 
                                <span class="error_message" name="noisinh_error">* <?php echo $noiSinh_error; ?></span>
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-group">
                                <label for="ngaysinh">Ngày Sinh</label>
                                <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" placeholder="" value="<?php echo $ngaySinh; ?>">
                                <span class="error_message" name="ngaysinh_error">* <?php echo $ngaySinh_error; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- btn -->
                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary  btn-block" name="add">
                                Edit nhân viên
                            </button>
                        </div>
                        <div class="col">
                            <button type="reset" class="btn btn-primary  btn-block">Làm Lại</button>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>