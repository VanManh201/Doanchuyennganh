<?php
// Kiểm tra xem có session email hay không
session_start();

if (!isset($_SESSION['email'])) {
    // Nếu không có session email, chuyển hướng người dùng đến trang đăng nhập
    header("Location: login.php");
    exit();
}

// Kết nối database
include 'db.php';

// Lấy thông tin từ form
$rating = $_POST['rating'];
$comment = $_POST['comment'];
$tour_id = $_POST['tour_id']; // Lấy ID của tour từ trường ẩn trong form
$email = $_SESSION['email']; // Email của người dùng từ session

// Lấy ID_User từ bảng users dựa vào email
$query_user_id = "SELECT ID_User FROM user WHERE Email = '$email'";
$result_user_id = $connect->query($query_user_id);

if ($result_user_id->num_rows > 0) {
    $row = $result_user_id->fetch_assoc();
    $user_id = $row['ID_User'];

    // Thực hiện truy vấn để chèn bình luận vào bảng phanhoi
    $query_insert_comment = "INSERT INTO phanhoi (ID_Tour, ID_User, NgayPhanHoi, NoiDung, Sao, AnHien)
                             VALUES ('$tour_id', '$user_id', NOW(), '$comment', '$rating', 0)";
    $result_insert_comment = $connect->query($query_insert_comment);

    if ($result_insert_comment) {
        // Hiển thị thông báo thành công bằng JavaScript
        echo "<script>alert('Bình luận đã được gửi thành công.');</script>";
        // Sau đó chuyển hướng người dùng đến trang chi tiết tour
        echo "<script>window.location.href = 'destinationDetails.php?id=$tour_id';</script>";
        exit();
    } else {
        // Nếu có lỗi khi chèn vào database
        echo "Có lỗi xảy ra khi gửi bình luận.";
    }
} else {
    // Nếu không tìm thấy ID_User từ email
    echo "Không tìm thấy thông tin người dùng.";
}

// Đóng kết nối database
$connect->close();
?>
