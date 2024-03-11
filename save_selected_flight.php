<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedFlights']) && is_array($_POST['selectedFlights'])) {
        $_SESSION['selectedFlights'] = $_POST['selectedFlights'];
        // Trả về phản hồi để xác nhận rằng thông tin chuyến bay đã được lưu thành công
        echo json_encode(array("success" => true));
    } else {
        // Trả về phản hồi lỗi nếu 'selectedFlights' không tồn tại hoặc không phải là mảng
        echo json_encode(array("success" => false, "message" => "Invalid 'selectedFlights' data."));
    }
} else {
    // Trả về phản hồi lỗi nếu không phải là yêu cầu POST
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
