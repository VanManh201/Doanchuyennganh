<?php
// Include file kết nối database
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idMatuyen'])) {
    $idMatuyen = $_POST['idMatuyen'];

    // Thực hiện truy vấn để lấy thông tin từ bảng chuyenbaydi dựa trên ID_MaTuyen
    $sqlDi = "SELECT * FROM chuyenbaydi WHERE ID_MaTuyen = '$idMatuyen'";
    $resultDi = $connect->query($sqlDi);

    // Thực hiện truy vấn để lấy thông tin từ bảng chuyenbayve dựa trên ID_MaTuyen
    $sqlVe = "SELECT * FROM chuyenbayve WHERE ID_MaTuyen = '$idMatuyen'";
    $resultVe = $connect->query($sqlVe);

    if ($resultDi->num_rows > 0 || $resultVe->num_rows > 0) {
        if ($resultDi->num_rows > 0) {
            echo "<h4><b>Thông tin chuyến bay:</b></h4>";
            echo "<div class='thong-tin-chuyen-bay'>";
            while ($row = $resultDi->fetch_assoc()) {
                echo "<div class='chuyen-bay-item'>";
                echo '<strong>ID Chuyến bay đi:</strong> ' . $row['ID_ChuyenBayDi'] . '<br>';
                echo '<strong>Số hiệu:</strong> ' . $row['SoHieu'] . '<br>';
                echo '<strong>Thời gian đi:</strong> ' . date('d-m-y | H:i:s', strtotime($row['ThoiGianDi'])) . '<br>';
                echo '<strong>Thời gian đến:</strong> ' . date('d-m-y | H:i:s', strtotime($row['ThoiGianDen'])) . '<br>';
                echo '<strong>Trạng thái:</strong> ' . $row['TrangThai'] . '<br>';
                echo '<strong>Số lượng vé:</strong> ' . $row['SoLuongVe'] . '<br>';
                echo '<strong>Giá vé:</strong> ' . number_format((float)$row['GiaVe'], 0, '', '.') . ' VND<br>';
                echo "</div>";
            }
            echo "</div>";
        } 
        if ($resultVe->num_rows > 0) {
            echo "<h4><b>Thông tin chuyến bay:</b></h4>";
            echo "<div class='thong-tin-chuyen-bay'>";
            while ($row = $resultVe->fetch_assoc()) {
                echo "<div class='chuyen-bay-item'>";
                echo '<strong>ID Chuyến bay về:</strong> ' . $row['ID_ChuyenBayVe'] . '<br>';
                echo '<strong>Số hiệu:</strong> ' . $row['SoHieu'] . '<br>';
                echo '<strong>Thời gian đi:</strong> ' . date('d-m-y | H:i:s', strtotime($row['ThoiGianDi'])) . '<br>';
                echo '<strong>Thời gian đến:</strong> ' . date('d-m-y | H:i:s', strtotime($row['ThoiGianDen'])) . '<br>';
                echo '<strong>Trạng thái:</strong> ' . $row['TrangThai'] . '<br>';
                echo '<strong>Số lượng vé:</strong> ' . $row['SoLuongVe'] . '<br>';
                echo '<strong>Giá vé:</strong> ' . number_format((float)$row['GiaVe'], 0, '', '.') . ' VND<br>';
                echo "</div>";
            }
            echo "</div>";
        } 
    } else {
        echo "Không có thông tin về chuyến bay này.";
    }
}
?>
