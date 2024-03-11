<?php
session_start();
include 'db.php';
// Hàm xóa chuyến bay từ session
function removeFlight($loaibay, $matuyenToRemove) {
    if(isset($_SESSION['selected_flights']) && isset($_SESSION['selected_flights'][$loaibay])) {
        // Lặp qua các chuyến bay đã chọn và loại bỏ chuyến bay cần xóa
        foreach ($_SESSION['selected_flights'][$loaibay] as $key => $matuyen) {
            if ($matuyen === $matuyenToRemove) {
                unset($_SESSION['selected_flights'][$loaibay][$key]);
                break;
            }
        }
        // Nếu không còn chuyến bay nào trong loại bay, loại bỏ cả loại bay đó khỏi session
        if (empty($_SESSION['selected_flights'][$loaibay])) {
            unset($_SESSION['selected_flights'][$loaibay]);
        }
    }
}

// Xử lý khi người dùng nhấp vào nút "Xóa"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_matuyen']) && isset($_POST['remove_loaibay'])) {
    $matuyenToRemove = $_POST['remove_matuyen'];
    $loaibayToRemove = $_POST['remove_loaibay'];
    removeFlight($loaibayToRemove, $matuyenToRemove);
    // Chuyển hướng người dùng lại trang test.php để cập nhật lại thông tin
    header("Location: test.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .header {
        background-color: #333; /* Màu nền của hình chữ nhật */
        height: 300px; /* Điều chỉnh độ cao của hình chữ nhật tại đây */
        width: 100%;
    }
    .content {
        color: white;
        text-align: center;
        padding-top: 100px; /* Điều chỉnh khoảng cách từ trên xuống */
    }
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-group::after {
        content: "";
        display: table;
        clear: both;
    }
    .form-group.col-half {
        float: left;
        width: 48%;
        margin-right: 4%;
    }
    .form-group.col-half:last-child {
        margin-right: 0;
    }
    .form-group.col-full {
        width: 100%;
    }
    .form-submit {
        text-align: center;
    }
    .form-submit button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .form-submit button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<div class="header">
    <div class="content">
<?php
// Kiểm tra xem session đã được khởi tạo chưa
if(isset($_SESSION['selected_flights'])) {
    $selected_flights = $_SESSION['selected_flights'];
    echo "Các chuyến bay đã chọn:<br>";
    foreach ($selected_flights as $loaibay => $chuyenbay) {
        echo "Loại bay: $loaibay<br>";
        foreach ($chuyenbay as $matuyen) {
            echo "Mã tuyến: $matuyen ";
            // Nút xóa để xóa chuyến bay
            echo "<form method='post' style='display: inline;'>";
            echo "<input type='hidden' name='remove_matuyen' value='$matuyen'>";
            echo "<input type='hidden' name='remove_loaibay' value='$loaibay'>";
            echo "<input type='submit' value='Xóa'>";
            echo "</form>";
            echo "<br>";
        }
    }
} else {
    echo "Không có chuyến bay nào được chọn.";
}
?>

    </div>
</div>
	
<!--
<div class="form-container">
    <form action="#" method="post">
        <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" placeholder="Your Phone Number" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
            <textarea name="address" placeholder="Your Address" rows="4" required></textarea>
        </div>
        <div class="form-submit">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.delete-button').click(function() {
        var flightIndex = $(this).data('index');
        // Gửi yêu cầu AJAX để xóa chuyến bay khỏi session
        $.ajax({
            url: 'delete_selected_flight.php',
            type: 'POST',
            data: {delete_flight: flightIndex},
            success: function(response) {
                if(response === 'success') {
                    alert('Chuyến bay đã được xóa thành công!');
                    // Tải lại trang để cập nhật thông tin từ session
                    location.reload();
                } else {
                    alert('Đã xảy ra lỗi khi xóa chuyến bay!');
                }
            }
        });
    });
});
</script>
</body>
</html>
