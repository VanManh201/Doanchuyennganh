<?php
session_start();
include('db.php'); // Kết nối đến cơ sở dữ liệu

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\BayWithVaa\PHPMailer-master\src\SMTP.php';

// Kiểm tra nếu có dữ liệu trong session và dữ liệu POST được gửi đi từ form
if (!empty($_SESSION) && !empty($_POST)) {
    // Lấy dữ liệu từ form
    $gioiTinh = $_SESSION['gioiTinh'];
    $hoTen = $_SESSION['hoTen'];
    $email = $_SESSION['email'];
    $soDienThoai = $_SESSION['soDienThoai'];
    $ngaySinh = $_SESSION['ngaySinh'];
    $diaChi = $_SESSION['diaChi'];
    $CCCD = $_SESSION['CCCD'];
    $ghiChu = $_POST['note'];
    $soVeNguoiLon = intval($_SESSION['soVeNguoiLon']);
    $soVeTreEm = intval($_SESSION['soVeTreEm']);
    $soVeEmBe = intval($_SESSION['soVeEmBe']);
    $tongTien = $_SESSION['tongTien'];
    $dichVu = $_POST['dichVu']; // Lấy dịch vụ từ form
    $phuongThucThanhToan = $_POST['payment']; // Lấy phương thức thanh toán từ form

    // Xử lý lưu thông tin cá nhân vào bảng thongtincanhan
    $insertPersonalInfoQuery = "INSERT INTO thongtincanhan (GioiTinh, HoTen, NgaySinh, SoDienThoai, Email) 
                                VALUES ('$gioiTinh', '$hoTen', '$ngaySinh', '$soDienThoai', '$email')";
    $connect->query($insertPersonalInfoQuery);
    $thongTinCanhanID = $connect->insert_id; // Lấy ID mới được sinh tự động

    // Xử lý lưu thông tin vé vào bảng datve hoặc datvekhuhoi tùy thuộc vào số lượng mã tuyến
    if (count($_SESSION['selectedFlights']) == 1) {
        // Nếu chỉ có 1 mã tuyến
        $maTuyen = $_SESSION['selectedFlights'][0];
        $insertTicketQuery = "INSERT INTO datve (ID_MaTuyen, ID_ThongTin, DiaChi, CCCD, GhiChu, SoVeNguoiLon, SoVeTreEm, SoVeEmBe) 
                            VALUES ('$maTuyen', '$thongTinCanhanID', '$diaChi', '$CCCD', '$ghiChu', '$soVeNguoiLon', '$soVeTreEm', '$soVeEmBe')";
        $connect->query($insertTicketQuery);

        // Lấy ID của vé mới được tạo
        $veID = $connect->insert_id;

        // Thêm dữ liệu vào bảng chitietdatve
        $insertDetailQuery = "INSERT INTO chitietdatve (ID_DatVe, ID_DichVu, TongTien, PhuongThucThanhToan) 
                            VALUES ('$veID', '$dichVu', '$tongTien', '$phuongThucThanhToan')";
        $connect->query($insertDetailQuery);
    } elseif (count($_SESSION['selectedFlights']) == 2) {
        // Nếu có 2 mã tuyến
        $maTuyen1 = $_SESSION['selectedFlights'][0];
        $maTuyen2 = $_SESSION['selectedFlights'][1];
		
		// Lưu cả hai mã tuyến vào cột ID_MaTuyen, phân cách bằng dấu phẩy
    	$maTuyenBoth = "$maTuyen1, $maTuyen2";
		
         $insertReturnTicketQuery = "INSERT INTO datvekhuhoi (ID_MaTuyen, ID_ThongTin, DiaChi, CCCD, GhiChu, SoVeNguoiLon, SoVeTreEm, SoVeEmBe) 
                                VALUES ('$maTuyenBoth', '$thongTinCanhanID', '$diaChi', '$CCCD', '$ghiChu', '$soVeNguoiLon', '$soVeTreEm', '$soVeEmBe')";
    	$connect->query($insertReturnTicketQuery);

        // Lấy ID của vé khu hồi mới được tạo
        $veKhuHoiID = $connect->insert_id;

        // Thêm dữ liệu vào bảng chitietdatvekhuhoi
        $insertReturnDetailQuery = "INSERT INTO chitietdatvekhuhoi (ID_DatVeKhuHoi, ID_DichVu, TongTien, PhuongThucThanhToan) 
                                    VALUES ('$veKhuHoiID', '$dichVu', '$tongTien', '$phuongThucThanhToan')";
        $connect->query($insertReturnDetailQuery);
    }

    // Xử lý lưu thông tin khách hàng chuyến bay vào bảng thongtinkhachhangchuyenbay
    for ($i = 1; $i <= $soVeNguoiLon; $i++) {
        $hoTen = $_POST['hoTenNguoiLon'][$i];
        $ngaySinh = $_POST['ngaySinhNguoiLon'][$i];
        $doTuoi = $_POST['doTuoiNguoiLon'][$i];
        $soGhe = $_POST['soGheNguoiLon'][$i];

        $insertPassengerQuery = "INSERT INTO thongtinkhachhangchuyenbay (ID_ThongTin, DoTuoi, HoTen, NgaySinh, ID_Ghe) 
                                VALUES ('$thongTinCanhanID', '$doTuoi', '$hoTen', '$ngaySinh', '$soGhe')";
        $connect->query($insertPassengerQuery);
    }

    for ($i = 1; $i <= $soVeTreEm; $i++) {
        $hoTen = $_POST['hoTenTreEm'][$i];
        $ngaySinh = $_POST['ngaySinhTreEm'][$i];
        $doTuoi = $_POST['doTuoiTreEm'][$i];
        $soGhe = $_POST['soGheTreEm'][$i];

        $insertPassengerQuery = "INSERT INTO thongtinkhachhangchuyenbay (ID_ThongTin, DoTuoi, HoTen, NgaySinh, ID_Ghe) 
                                VALUES ('$thongTinCanhanID', '$doTuoi', '$hoTen', '$ngaySinh', '$soGhe')";
        $connect->query($insertPassengerQuery);
    }

    for ($i = 1; $i <= $soVeEmBe; $i++) {
        $hoTen = $_POST['hoTenEmBe'][$i];
        $ngaySinh = $_POST['ngaySinhEmBe'][$i];
        $doTuoi = $_POST['doTuoiEmBe'][$i];
        $soGhe = $_POST['soGheEmBe'][$i];

        $insertPassengerQuery = "INSERT INTO thongtinkhachhangchuyenbay (ID_ThongTin, DoTuoi, HoTen, NgaySinh, ID_Ghe) 
                                VALUES ('$thongTinCanhanID', '$doTuoi', '$hoTen', '$ngaySinh', '$soGhe')";
        $connect->query($insertPassengerQuery);
    }

    // Xóa dữ liệu trong session sau khi đã lưu vào cơ sở dữ liệu thành công
    session_destroy();

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
        $mail->Body = "<h1>Chào bạn $hoTen,</h1><br><br><h2>Bạn đã đặt chuyến bay với mã tuyến ($maTuyenBoth) thành công.</h2><br><h3>Số lượng vé: $soVeNguoiLon người lớn, $soVeTreEm trẻ em, $soVeEmBe em bé.</h3><br><h3>Tổng tiền: $tongTien VND</h3><br><h3> Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</h3><br><br><img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://vaa.edu.vn/he-thong-hoc-truc-tuyen'>";

        $mail->send();    
        $success_msg = "Đặt tour thành công và email xác nhận đã được gửi đến $email!";
    } catch (Exception $e) {
        $error_msg = "Đặt tour thành công nhưng không gửi được email xác nhận!"; // Message in case of failure
    }

    // Chuyển hướng người dùng đến trang cảm ơn
    header('Location: home.php');
    exit();
} else {
    // Nếu không có dữ liệu trong session hoặc dữ liệu POST không được gửi đi từ form, chuyển hướng người dùng đến trang lỗi
    echo "False";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kết quả đặt chuyến bay</title>
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
