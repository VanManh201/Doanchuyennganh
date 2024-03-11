<?php
// Kết nối tới cơ sở dữ liệu
include 'db.php';

// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $ngay = date('Y-m-d'); // Lấy ngày hiện tại
    
    // Thực hiện truy vấn để chèn dữ liệu vào bảng 'lienhe'
    $sql = "INSERT INTO lienhe (HoTen, Email, SoDienThoai, NoiDung, Ngay) VALUES ('$name', '$email', '$phone', '$message', '$ngay')";
    
    // Thực thi truy vấn
    if (mysqli_query($connect, $sql)) {
       header ('Location: home.php');
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($connect);
    }
    
    // Đóng kết nối
    mysqli_close($connect);
}
?>
