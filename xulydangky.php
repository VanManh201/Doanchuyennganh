<?php
// Kết nối đến cơ sở dữ liệu
include('db.php');

// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if(isset($_POST['Email'], $_POST['SoDienThoai'], $_POST['Password'])) {
    // Lấy dữ liệu từ biểu mẫu
    $email = $_POST['Email'];
    $soDienThoai = $_POST['SoDienThoai'];
    $password = $_POST['Password'];

    // Tạo truy vấn SQL để thêm người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO user (Email, SoDienThoai, MatKhau) VALUES ('$email', '$soDienThoai', '$password')";

    // Thực thi truy vấn
    if($connect->query($sql) === TRUE) {
        // Đăng ký thành công
        echo "<script>alert('Đăng ký thành công!!!'); window.location.href = '/BayWithVaa/login.php';</script>";
    } else {
        // Đăng ký không thành công
        echo "<script>alert('Đăng ký không thành công, xin vui lòng thử lại hoặc liên hệ với website!!!'); window.location.href = '/BayWithVaa/login.php';</script>" . $connect->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $connect->close();
} else {
    // Nếu không có dữ liệu được gửi từ biểu mẫu, chuyển hướng người dùng đến trang đăng ký
    echo "<script>alert('Thông tin đăng ký không chính xác.'); window.location.href = '/BayWithVaa/login.php';</script>";
    exit();
}
?>
