<?php
session_start();
include 'db.php';

// Kiểm tra nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $gioiTinh = $_POST['gioiTinh'];
    $hoTen = $_POST['hoTen'];
    $email = $_POST['email'];
    $soDienThoai = $_POST['soDienThoai'];
    $ngaySinh = $_POST['ngaySinh'];
    $diaChi = $_POST['DiaChi'];
    $CCCD = $_POST['CCCD'];
    $soVeNguoiLon = $_POST['NguoiLon'];
    $soVeTreEm = $_POST['TreEm'];
    $soVeEmBe = $_POST['Embe'];

    // Lưu thông tin vào session
    $_SESSION['gioiTinh'] = $gioiTinh;
    $_SESSION['hoTen'] = $hoTen;
    $_SESSION['email'] = $email;
    $_SESSION['soDienThoai'] = $soDienThoai;
    $_SESSION['ngaySinh'] = $ngaySinh;
    $_SESSION['diaChi'] = $diaChi;
    $_SESSION['CCCD'] = $CCCD;
    $_SESSION['soVeNguoiLon'] = $soVeNguoiLon;
    $_SESSION['soVeTreEm'] = $soVeTreEm;
    $_SESSION['soVeEmBe'] = $soVeEmBe;

    // Chuyển hướng sang trang hiển thị và thanh toán
    header("Location: PayTour.php");
    exit();
}
?>
