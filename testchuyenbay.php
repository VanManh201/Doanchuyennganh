<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt vé</title>
</head>
<body>
    <h2>Xác nhận đặt vé</h2>
    <form method="post" action="xuly-chuyenbay.php">
        <table border="1">
            <tr>
                <th colspan="2">Thông tin liên hệ</th>
            </tr>
            <?php
            session_start(); // Bắt đầu session
            include ('db.php');
            // Khởi tạo biến tổng tiền và tổng số vé
            $tongTien = 0;
            $tongSoVe = 0;

            // Kiểm tra nếu có dữ liệu trong session
            if (!empty($_SESSION)) {
                echo "<tr><td>Giới tính:</td><td>" . $_SESSION['gioiTinh'] . "</td></tr>";
                echo "<tr><td>Họ và tên:</td><td>" . $_SESSION['hoTen'] . "</td></tr>";
                echo "<tr><td>Email:</td><td>" . $_SESSION['email'] . "</td></tr>";
                echo "<tr><td>Số điện thoại:</td><td>" . $_SESSION['soDienThoai'] . "</td></tr>";
                echo "<tr><td>Ngày sinh:</td><td>" . $_SESSION['ngaySinh'] . "</td></tr>";
                echo "<tr><td>Địa chỉ:</td><td>" . $_SESSION['diaChi'] . "</td></tr>";
                echo "<tr><td>Căn cước/CMND:</td><td>" . $_SESSION['CCCD'] . "</td></tr>";

                // Hiển thị thông tin về vé đã chọn và tính tổng giá vé
                foreach ($_SESSION['selectedFlights'] as $matuyen) {
                    $sql = "SELECT COALESCE(cbdi.GiaVe, cbve.GiaVe) AS GiaVe
                            FROM matuyen mt
                            LEFT JOIN chuyenbaydi cbdi ON mt.ID_MaTuyen = cbdi.ID_MaTuyen
                            LEFT JOIN chuyenbayve cbve ON mt.ID_MaTuyen = cbve.ID_MaTuyen
                            WHERE mt.ID_MaTuyen = '$matuyen'";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>Mã tuyến:</td><td>$matuyen</td></tr>";
                            echo "<tr><td>Giá vé:</td><td>" . number_format($row['GiaVe'], 0, ',', '.') . " VND</td></tr>";
                            // Tính tổng giá vé và tổng số vé
                            $tongTien += $row['GiaVe'];
                            $tongSoVe += ($_SESSION['soVeNguoiLon'] + $_SESSION['soVeTreEm'] + $_SESSION['soVeEmBe']);
                        }
                    } else {
                        echo "<tr><td colspan='2'>Không tìm thấy thông tin cho mã tuyến: $matuyen</td></tr>";
                    }
                }
                echo "<tr><th colspan='2'>Tổng số vé và tổng tiền vé</th></tr>";
                echo "<tr><td>Tổng số vé:</td><td>$tongSoVe</td></tr>";
                echo "<tr><td>Tổng tiền vé:</td><td>" . number_format($tongTien * $tongSoVe, 0, ',', '.') . " VND</td></tr>";

            } else {
                echo "<tr><td colspan='2'>Không có thông tin được lưu trong session.</td></tr>";
            }
            ?>
        </table>
        <br>
        <label for="payment">Lựa chọn thanh toán:</label>
        <select name="payment" id="payment">
            <option value="momo">MoMo</option>
            <option value="mbbank">MB Bank</option>
            <option value="vnpay">VNPAY</option>
            <!-- Thêm các phương thức thanh toán khác nếu cần -->
        </select>
        <br>
        <label for="note">Ghi chú:</label>
        <textarea name="note" id="note" rows="4" cols="50" placeholder="Nhập ghi chú nếu có..."></textarea>
        <br>
        <button type="submit">Thanh toán</button>
    </form>
</body>
</html>
