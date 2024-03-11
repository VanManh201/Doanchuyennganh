<?php
include ('db.php');
session_start();

// Xử lý đăng nhập
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['loginpassword'];

    // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
    $sql = "SELECT * FROM user WHERE Email='$email' AND MatKhau='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['VaiTro'] == 1) {
            // Đăng nhập thành công với vai trò là 1
            $_SESSION['admin_email'] = $email; // Lưu session khác cho vai trò là 1
            header("Location: /BayWithVaa/DatVeMayBay/admin.php"); // Chuyển hướng đến trang admin.php
            exit();
        } else {
            // Đăng nhập thành công với vai trò là 0
            $_SESSION['email'] = $email;
            header("Location: /BayWithVaa/home.php"); // Chuyển hướng đến trang home.php
            exit();
        }
    } else {
        // Đăng nhập không thành công
        echo "<script>alert('Thông tin đăng nhập không chính xác.'); window.location.href = '/BayWithVaa/login.php';</script>";
    }
}

$connect->close();
?>
