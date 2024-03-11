<?php
// Bắt đầu session
session_start();

// Include file kết nối database
include 'db.php';

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\SMTP.php';

// Lấy thông tin từ form
$gioiTinh = $_POST['gioiTinh'];
$hoTen = $_POST['hoTen'];
$email = $_POST['email'];
$soDienThoai = $_POST['soDienThoai'];
$ngaySinh = $_POST['ngaySinh'];
$diaChi = $_POST['diaChi'];
$CCCD = $_POST['CCCD'];
$soVeNguoiLon = $_POST['soVeNguoiLon'];
$soVeTreEm = $_POST['soVeTreEm'];
$soVeEmBe = $_POST['soVeEmBe'];
$tongTien = $_POST['tongTien'];
$tour_id = $_POST['tour_id'];
$phuongThucThanhToan = $_POST['phuongThucThanhToan'];
$ghiChu = $_POST['ghiChu'];

// Thêm thông tin khách hàng vào bảng khachhang
$sql_insert_customer = "INSERT INTO khachhang (TenKhachHang, SoDienThoai, Email, NgaySinh, GioiTinh, DiaChi, CCCD, GhiChu, SoVeNguoiLon, SoVeTreEm, SoVeEmBe)
VALUES ('$hoTen', '$soDienThoai', '$email', '$ngaySinh', '$gioiTinh', '$diaChi', '$CCCD', '$ghiChu', '$soVeNguoiLon', '$soVeTreEm', '$soVeEmBe')";

$result_insert_customer = $connect->query($sql_insert_customer);

// Lấy ID của khách hàng vừa thêm vào
$id_khachhang = $connect->insert_id;

// Thêm thông tin hành khách vào bảng thongtinkhachhang
for ($i = 1; $i <= $soVeNguoiLon; $i++) {
    $doTuoiNguoiLon = $_POST['doTuoiNguoiLon' . $i];
    $hoTenNguoiLon = $_POST['hoTenNguoiLon' . $i];
    $ngaySinhNguoiLon = $_POST['ngaySinhNguoiLon' . $i];

    $sql_insert_hanh_khach = "INSERT INTO thongtinkhachhang (ID_KhachHang, DoTuoi, HoTen, NgaySinh)
    VALUES ('$id_khachhang', '$doTuoiNguoiLon', '$hoTenNguoiLon', '$ngaySinhNguoiLon')";

    $result_insert_hanh_khach = $connect->query($sql_insert_hanh_khach);
}

for ($i = 1; $i <= $soVeTreEm; $i++) {
    $doTuoiTreEm = $_POST['doTuoiTreEm' . $i];
    $hoTenTreEm = $_POST['hoTenTreEm' . $i];
    $ngaySinhTreEm = $_POST['ngaySinhTreEm' . $i];

    $sql_insert_hanh_khach = "INSERT INTO thongtinkhachhang (ID_KhachHang, DoTuoi, HoTen, NgaySinh)
    VALUES ('$id_khachhang', '$doTuoiTreEm', '$hoTenTreEm', '$ngaySinhTreEm')";

    $result_insert_hanh_khach = $connect->query($sql_insert_hanh_khach);
}

for ($i = 1; $i <= $soVeEmBe; $i++) {
    $doTuoiEmBe = $_POST['doTuoiEmBe' . $i];
    $hoTenEmBe = $_POST['hoTenEmBe' . $i];
    $ngaySinhEmBe = $_POST['ngaySinhEmBe' . $i];

    $sql_insert_hanh_khach = "INSERT INTO thongtinkhachhang (ID_KhachHang, DoTuoi, HoTen, NgaySinh)
    VALUES ('$id_khachhang', '$doTuoiEmBe', '$hoTenEmBe', '$ngaySinhEmBe')";

    $result_insert_hanh_khach = $connect->query($sql_insert_hanh_khach);
}

// Thêm thông tin đặt tour vào bảng bookings
$sql_insert_booking = "INSERT INTO bookings (ID_KhachHang, ID_Tour, NgayDat, TongTien, PhuongThucThanhToan)
VALUES ('$id_khachhang', '$tour_id', NOW(), '$tongTien', '$phuongThucThanhToan')";

$result_insert_booking = $connect->query($sql_insert_booking);

// Kiểm tra và thông báo kết quả
if ($result_insert_customer && $result_insert_booking) {
    $sql_get_tour_info = "SELECT TenTour FROM tours WHERE ID_Tour = '$tour_id'";
    $result_tour_info = $connect->query($sql_get_tour_info);
    $row_tour_info = $result_tour_info->fetch_assoc();
    $tenTour = $row_tour_info['TenTour'];
    // Gửi email thông báo cho khách hàng
    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        //Server settings
        $mail->SMTPDebug = 0; // Disable debugging for production
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ekko0903123@gmail.com'; // Thay bằng địa chỉ email của bạn
        $mail->Password = 'ugnz qqzt bddi dwka'; // Thay bằng mật khẩu ứng dụng của bạn
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('ekko0903123@gmail.com', 'BayWithVaa'); // Thay bằng địa chỉ email và tên của bạn
        $mail->addAddress($email, $hoTen); // Thêm địa chỉ email và tên của người nhận

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Xác nhận đặt tour';
        $mail->Body = "<h1>Chào bạn $hoTen,</h1><br><br><h2>Bạn đã đặt tour: - $tenTour - thành công.</h2><br><h3>Số lượng vé: $soVeNguoiLon người lớn, $soVeTreEm trẻ em, $soVeEmBe em bé.</h3><br><h3>Tổng tiền: $tongTien VND</h3><br><h3> Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</h3><br><br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://vaa.edu.vn/he-thong-hoc-truc-tuyen'>";

        $mail->send();    
        $success_msg = "Đặt tour thành công và email xác nhận đã được gửi đến $email!";
    } catch (Exception $e) {
        $success_msg = "Đặt tour thành công nhưng không gửi được email xác nhận!"; // Message in case of failure
    }
} else {
    $error_msg = "Đặt tour thất bại!";
}

// Đóng kết nối
$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kết quả đặt tour</title>
</head>
<body>
    <?php if (isset($success_msg)) { ?>
        <script>
            alert("<?php echo $success_msg; ?>");
            window.location.href = "home.php"; // Chuyển hướng sau khi nhấn OK
        </script>
    <?php } ?>

    <?php if (isset($error_msg)) { ?>
        <script>
            alert("<?php echo $error_msg; ?>");
            window.location.href = "home.php"; // Chuyển hướng sau khi nhấn OK
        </script>
    <?php } ?>

    <script>
        setTimeout(function() {
            window.location.href = "home.php";
        }, 5000);
    </script>
</body>
</html>
