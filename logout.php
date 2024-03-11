<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập với vai trò admin chưa
if(isset($_SESSION['admin_email'])) {
    // Xóa session của người dùng có vai trò là admin
    unset($_SESSION['admin_email']);
}

// Chuyển hướng về trang login.php
header("Location: /BayWithVaa/login.php");
exit();
?>
