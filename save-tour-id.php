<?php
session_start();

// Kiểm tra nếu ID Tour được gửi qua phương thức POST
if (isset($_POST['tour_id'])) {
    // Lưu ID Tour vào session
    $_SESSION['tour_id'] = $_POST['tour_id'];
    // Chuyển hướng đến trang CartTour.php
    header("Location: CartTour.php");
    exit(); // Đảm bảo không có mã HTML hoặc mã PHP nào được thêm vào trang CartTour.php
} else {
    // Nếu không có ID Tour, hiển thị thông báo lỗi và quay lại trang trước đó
    echo "error"; // Phản hồi lỗi nếu không có ID Tour
}
?>
