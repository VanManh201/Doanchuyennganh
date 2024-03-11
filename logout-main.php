<?php
session_start();

// Xóa session của người dùng
unset($_SESSION['email']);

// Chuyển hướng về trang login.php
header("Location: home.php");
exit();
?>
