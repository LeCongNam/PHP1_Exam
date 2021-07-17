<?php
include "DataProvider.php";

$id = $Avatar = $hoTen = $chucVu = $ngaySinh = $noiSinh = $gioiTinh = "";
$id_error = $Avatar_error = $hoTen_error = $chucVu_error
  = $ngaySinh_error = $noiSinh_error = $gioiTinh_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = getData("id");


  $hoTen = getData("hoten");
  $gioiTinh = getData("gioitinh");
  $chucVu = getData("chucvu");
  $ngaySinh = getData("ngaysinh");
  $noiSinh = getData("noisinh");

  if ($id == "") {
    $id_error = "vui lòng điền ID";
  } elseif (!is_numeric($id)) {
    $id_error = "ID phải là số";
  }



  $file = $_FILES["img_upload"];
  $Avatar  = $_FILES["img"]["name"];

  if ($Avatar == "") {
    $Avatar_error = "Vui lòng tải lên ảnh của bạn";
  } else {
    $img_patch = $_FILES["img_upload"]["tmp_name"];
    move_uploaded_file($img_patch, "img/" . $Avatar);
  }





  if ($hoTen == "") {
    $hoTen_error = "Họ Tên không được để trống!!";
  }

  if ($chucVu == "") {
    $chucVu_error = "Vui lòng không để trống chức vụ";
  } else {
    $arrChucVu = array("GD" => "giám đốc", "PGD" => "phó giám đốc", "TPKD" => "trưởng phòng kinh doanh", "TP" => "trưởng phòng", "NV" => "nhân viên");
    foreach ($arrChucVu as $key => $value) {
      $chucVu = strtoupper($chucVu);
      $key = strtoupper($key);
      if (strcasecmp($chucVu, $key) == 0) {
        $chucVu_error = "";
        return $chucVu = $value;
      } elseif (strcasecmp($chucVu, $key) != 0) {
        $chucVu_error = "nhập đúng chức vụ!! vd: GD!!!";
      }
    }
  }

  $ngayHT = date("Y-m-d");
  if ($ngaySinh == $ngayHT) {
    $ngaySinh_error = "Vui lòng chọn năm sinh!!";
  } elseif ($ngaySinh > $ngayHT) {
    $ngaySinh_error = "Ngày sinh không hợp lệ";
  }

  if ($noiSinh == "") {
    $noiSinh_error = "Nơi sinh không được bỏ trống";
  }

  

  DataProvider::executeQuery($sql);

  header("location: ./index.php");
}

function getData($input)
{
  $input = trim($input);
  $result_inp = $_POST["${input}"];
  return $result_inp;
}


?>



<!doctype html>
<html lang="en">

<head>
  <title>Home Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/fontawesome-free-5.15.3-web/css/all.min.css">
  <style>
    .error_message {
      color: red;
    }

    #form-1 {
      background-color: rgb(192, 238, 238);
    }

    .header-left {
      margin-top: 10px;
    }

    .avatar {
      width: 100px;
    }

    tr {
      text-align: center;
    }
  </style>

</head>

<body>



  <div class="container">
    <div class="row">
      <div class="col header-left">
        <!-- start form -->
        <form action="" method="post" id="form-1" class="p-2">
          <!-- headding -->
          <h3 class="text-center mb-3">Quản Lí nhân viên</h3>
          <!-- id -->
          <div class="form-group row">
            <div class="col-4">
              <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" id="id" class="form-control" placeholder="ID: 123456" aria-describedby="helpId" polo>
                <span name="id_error" class="error_message">*<?php echo $id_error; ?></span>
              </div>
            </div>

            <!-- Image -->
            <div class="col pl-3">
              <div class="form-group">
                <label for="img_upload">Avatar</label>
                <input type="file" name="img_upload" id="img_upload" class="btn btn-info btn-outline-light" style="height:39px ;     margin-left: 0px !important;">
                <span name="Avatar_error" class="error_message">*<?php echo $Avatar_error; ?></span>
              </div>
            </div>


            <div class="col">
              <div class="form-group ml-4 ">
                <label for="hoten">Họ tên</label>
                <input type="text" name="hoten" id="hoten" class="form-control" placeholder="vd: Nguyen A" aria-describedby="helpId">
                <span class="error_message" name="hoten_error">* <?php echo $hoTen_error; ?></span>
              </div>
            </div>

            <div class="col">
              <div class="form-group ml-3 mt-2">
                <label for="gioitinh">Giới Tính</label>
                <span class="error_message">*<?php echo $gioiTinh_error; ?></span><br>
                <input type="radio" name="gioitinh" id="" class="form-check-input" value="Nam" checked>Nam <i class="fas fa-mars-stroke"></i><br>
                <input type="radio" name="gioitinh" id="" class="form-check-input" value="Nữ">Nữ<i class="fas fa-venus"></i>
              </div>
            </div>
          </div>
          <!-- end row 1 -->

          <div class="form-group row">

            <div class="col">
              <div class="form-group">
                <label for="chucvu">Chức Vụ (Viết tắt chữ cái đầu)</label>
                <input type="text" name="chucvu" id="chucvu" class="form-control" placeholder="vd: nhân viên" aria-describedby="helpId">
                <span class="error_message" name="chucvu_error">* <?php echo $chucVu_error; ?></span>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="noisinh">Nơi Sinh</label>
                <input type="text" name="noisinh" id="noisinh" class="form-control" placeholder="vd: bình thuận" aria-describedby="helpId">
                <span class="error_message" name="noisinh_error">* <?php echo $noiSinh_error; ?></span>
              </div>
            </div>


            <div class="col">
              <div class="form-group">
                <label for="ngaysinh">Ngày Sinh</label>
                <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" placeholder="" value="<?php echo date("Y-m-d"); ?>">
                <span class="error_message" name="ngaysinh_error">* <?php echo $ngaySinh_error; ?></span>
              </div>
            </div>
          </div>

          <!-- btn -->
          <div class="form-group row">
            <div class="col">
              <button type="submit" class="btn btn-primary  btn-block" name="add">
                Thêm nhân viên
              </button>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary  btn-block">Sửa</button>
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