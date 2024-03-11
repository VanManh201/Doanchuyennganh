<?php
session_start(); // Bắt đầu session

// Kiểm tra nếu form đã được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
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

    // Lưu dữ liệu vào session
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

    header("Location: PayFlight.php");
    exit(); // Kết thúc script để đảm bảo không có mã PHP nào được thực thi sau khi chuyển hướng
}
?>
