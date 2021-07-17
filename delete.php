<?php
require "DataProvider.php";
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM nhanvien WHERE id = $id";
    DataProvider::executeQuery($sql);
    header('location: index.php');
}
