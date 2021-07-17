<?php
include "DataProvider.php"



?>







<!doctype html>
<html lang="en">

<head>
    <title>Tìm kiếm nhân viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <!-- NaV -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo2.png" alt="logo" id="logo" style="width: 100px; ">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home"></i>
                            Home
                            <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Báo cáo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-headset"></i>
                            Trợ giúp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Ô tìm kiếm -->



    <!-- show nhân viên -->
    <div class="container">
        <form action="" method="GET">
            <div class="search_nv">
                <div class="timkiem">
                    <h5>Tên nhân viên(Nhập bất kì)</h5>
                    <input type="search" name="search" id="search_3" class="mb-3"><br>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    <a href="search.php" class="btn btn-warning">Refesh Website</a>
                </div>
            </div>

        </form>
    </div>

    <div class="container">
        <table class="table table-striped table-dark ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Họ và Tên</th>
                    <th>Giới tính</th>
                    <th>Ngày Sinh</th>
                    <th>Chức vụ</th>
                    <th>Nơi Sinh</th>
                    <td colspan="2">Thay đổi</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $hoTen= "";
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    if ( isset($_GET["search"])) {
                        $hoTen = $_GET["search"];
                    }

                    if ( $hoTen != "") {
                        $sql = "SELECT * FROM nhanvien WHERE ho_ten LIKE '%$hoTen%'";
    
                    }else{
                        $sql = "select * from nhanvien";

                    }
                }
                

                $query = DataProvider::executeQuery($sql);


                while ($arrResult = mysqli_fetch_array($query)) {
                ?>

                    <tr>
                        <td><?php echo $arrResult["id"]; ?></td>
                        <td><img src="<?php echo $arrResult["Avatar"]; ?>" alt="avatar" class="avatar"></td>
                        <td><?php echo $arrResult["ho_ten"]; ?></td>
                        <td><?php echo $arrResult["gioi_tinh"]; ?></td>
                        <td><?php echo $arrResult["Nam_sinh"]; ?></td>
                        <td><?php echo $arrResult["chuc_vu"]; ?></td>
                        <td><?php echo $arrResult["Noi_Sinh"] ?></td>
                        <td>

                            <a class="btn btn-warning" href="edit.php?id=<?php echo $arrResult["id"] ?>">
                                <i class="fas fa-info"></i>
                                Sửa
                            </a>

                        </td>

                        <td>
                            <a onclick="return del_message('<?php echo $arrResult['ho_ten']; ?>')" href="delete.php?id=<?php echo $arrResult["id"]; ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>