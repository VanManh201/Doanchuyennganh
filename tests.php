<?php
    session_start();
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BayWithVAA--</title>
    <link rel="stylesheet" href="css/style4.css">
</head>
<body>

<div class="container">
    <?php
    // Lấy thông tin từ session
    $gioiTinh = $_SESSION['gioiTinh'];
    $hoTen = $_SESSION['hoTen'];
    $email = $_SESSION['email'];
    $soDienThoai = $_SESSION['soDienThoai'];
    $ngaySinh = $_SESSION['ngaySinh'];
    $diaChi = $_SESSION['diaChi'];
    $CCCD = $_SESSION['CCCD'];
    $soVeNguoiLon = $_SESSION['soVeNguoiLon'];
    $soVeTreEm = $_SESSION['soVeTreEm'];
    $soVeEmBe = $_SESSION['soVeEmBe'];
    $tour_id = $_SESSION['tour_id'];

    // Thực hiện truy vấn để lấy thông tin của tour từ bảng tours
    $sql_tour_details = "SELECT * FROM tours WHERE ID_Tour = '$tour_id'";
    $result_tour_details = $connect->query($sql_tour_details);

    // Kiểm tra kết quả trả về từ truy vấn
    if ($result_tour_details->num_rows > 0) {
        // Lấy thông tin chi tiết của tour từ kết quả truy vấn
        $row = $result_tour_details->fetch_assoc();
        // Hiển thị thông tin của tour
        echo "<h4>Thông tin chi tiết tour:</h4>";
        echo "<img src=\"/BayWithVaa/img/" . $row['HinhAnh'] . "\" alt=\"" . $row['TenTour'] . "\" width=\"200\" height=\"150\">";
        echo "<p><strong>ID Tour:</strong> " . $row['ID_Tour'] . "</p>";
        echo "<p><strong>Tên tour:</strong> " . $row['TenTour'] . "</p>";
        echo "<p><strong>Ngày khởi hành:</strong> " . date('d-m-Y', strtotime($row['NgayDi'])) . "</p>";
        echo "<p><strong>Giá:</strong> " . number_format($row['Gia'], 0, ',', '.') . " VND/ Khách</p>";
        // Các thông tin khác về tour
    } else {
        echo "Không tìm thấy thông tin tour.";
    }

    // Tính tổng tiền
    $giaNguoiLon = $row['Gia'];
    $giaTreEm = $row['GiaTreEm'];
    $giaEmBe = $row['GiaEmBe'];
    $tongTien = ($soVeNguoiLon * $giaNguoiLon) + ($soVeTreEm * $giaTreEm) + ($soVeEmBe * $giaEmBe);
    ?>
    
    <h4>Thông tin khách hàng:</h4>
    <table>
        <tr><td><strong>Giới tính:</strong></td><td><?php echo $gioiTinh; ?></td></tr>
        <tr><td><strong>Họ và tên:</strong></td><td><?php echo $hoTen; ?></td></tr>
        <tr><td><strong>Email:</strong></td><td><?php echo $email; ?></td></tr>
        <tr><td><strong>Số điện thoại:</strong></td><td><?php echo $soDienThoai; ?></td></tr>
        <tr><td><strong>Ngày sinh:</strong></td><td><?php echo date('d-m-Y', strtotime($ngaySinh)); ?></td></tr>
        <tr><td><strong>Địa chỉ:</strong></td><td><?php echo $diaChi; ?></td></tr>
        <tr><td><strong>CCCD:</strong></td><td><?php echo $CCCD; ?></td></tr>
        <tr><td><strong>Số vé người lớn:</strong></td><td><?php echo $soVeNguoiLon; ?></td></tr>
        <tr><td><strong>Số vé trẻ em:</strong></td><td><?php echo $soVeTreEm; ?></td></tr>
        <tr><td><strong>Số vé em bé:</strong></td><td><?php echo $soVeEmBe; ?></td></tr>
        <tr><td><strong>Tổng tiền thanh toán:</strong></td><td><?php echo number_format($tongTien, 0, ',', '.'); ?> VND</td></tr>
    </table>

    <!-- Form thanh toán -->
    <form method="post" action="xuly-thanhtoan.php">
        <input type="hidden" name="gioiTinh" value="<?php echo $gioiTinh; ?>">
        <input type="hidden" name="hoTen" value="<?php echo $hoTen; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="soDienThoai" value="<?php echo $soDienThoai; ?>">
        <input type="hidden" name="ngaySinh" value="<?php echo $ngaySinh; ?>">
        <input type="hidden" name="diaChi" value="<?php echo $diaChi; ?>">
        <input type="hidden" name="CCCD" value="<?php echo $CCCD; ?>">
        <input type="hidden" name="soVeNguoiLon" value="<?php echo $soVeNguoiLon; ?>">
        <input type="hidden" name="soVeTreEm" value="<?php echo $soVeTreEm; ?>">
        <input type="hidden" name="soVeEmBe" value="<?php echo $soVeEmBe; ?>">
        <input type="hidden" name="tongTien" value="<?php echo $tongTien; ?>">
        <input type="hidden" name="tour_id" value="<?php echo $tour_id; ?>">
        <label for="phuongThucThanhToan">Phương thức thanh toán:</label><br>
        <select name="phuongThucThanhToan" id="phuongThucThanhToan">
            <option value="momo">MoMo (01564894878)</option>
            <option value="mb">Ngân hàng MBBank (998945615)</option>
            <option value="vnpay">VNPAY (0298787975)</option>
            <!-- Thêm các phương thức thanh toán khác vào đây -->
        </select><br>
        <label for="ghiChu">Ghi chú:</label><br>
        <textarea name="ghiChu" id="ghiChu" rows="4" cols="50"></textarea><br>
        <button type="submit">Hoàn tất</button>
    </form>
</div>

</body>
</html>
