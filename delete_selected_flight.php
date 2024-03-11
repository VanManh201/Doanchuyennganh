<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['matuyen'])) {
        $matuyen_to_delete = $_POST['matuyen'];

        // Xóa chuyến bay khỏi session
        if (isset($_SESSION['selectedFlights'])) {
            $selectedFlights = $_SESSION['selectedFlights'];
            $index = array_search($matuyen_to_delete, $selectedFlights);
            if ($index !== false) {
                unset($selectedFlights[$index]);
                $_SESSION['selectedFlights'] = $selectedFlights;
            }
        }

        // Chuyển hướng người dùng trở lại trang hiển thị thông tin chuyến bay
        header("Location: CustomerInfo.php");
        exit();
    }
}
?>
