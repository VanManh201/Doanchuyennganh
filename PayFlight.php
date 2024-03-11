<?php
	include ('db.php');
	session_start();
?>
<?php
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Lấy email từ session
    $menu_content = '<li><a href="home.php">Trang chủ</a></li>
                     <li><a href="travel.php">Địa điểm</a></li>
                     <li><a href="News.php">Tin tức</a></li>
                     <li><a href="contract.php">Liên hệ</a></li>
                     <li><a href="logout-main.php">Đăng xuất</a> <span id="email-display">' . $email . '</span></li>';
} else {
    $menu_content = '<li><a href="home.php">Trang chủ</a></li>
                     <li><a href="travel.php">Địa điểm</a></li>
                     <li><a href="News.php">Tin tức</a></li>
                     <li><a href="contract.php">Liên hệ</a></li>
                     <li><a href="login.php">Đăng nhập</a></li>';
}
?>
<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BayWithVAA &mdash; </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/calenderFlight.css">

	    <link rel="stylesheet" href="css/style4.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		#thumbnail {
  display: block;
  clear: both;
  margin-top: 10px; /* Khoảng cách giữa ô nhập số ghế và hình ảnh */
}

#thumbnail img {
    width: 150px;
    cursor: pointer;
    float: right;
	position:relative;
	top: -200px;
	margin-right: 10px;
	
}
.Chu{
	float: right;
	position: relative;
	top: -130px;
	margin-right: 20px;
}
	#email-display {
    font-size: 20px; /* Cỡ chữ */
    margin-left: 10px; /* Khoảng cách với liên kết "Đăng xuất" */
    font-weight: bold; /* In đậm */
	}			
	</style>
	</head>
	<body>
		
	<!-- <div class="gtco-loader"></div> -->
		
	<div id="page">

	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">BayWithVAA <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<?php echo $menu_content; ?>
						</ul>	
					</div>
				</div>
				
			</div>
		</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/maybaymoi.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Thanh toán Chuyến bay</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
    <form method="post" action="xuly-chuyenbay.php">
        <table border="1">
            <tr>
                <th colspan="2">Thông tin liên hệ</th>
            </tr>
            <?php
            include ('db.php');
			
			// Khởi tạo biến tổng tiền và tổng số vé
            $tongSoVe = 0;
			$tongTien = 0;
			$tongSoVeNguoiLon = intval($_SESSION['soVeNguoiLon']);
			$tongSoVeTreEm = intval($_SESSION['soVeTreEm']);
			$tongSoVeEmBe = intval($_SESSION['soVeEmBe']);

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

							// Tính tổng giá vé
							$giaVe = $row['GiaVe'];
							$tongTien += $giaVe;
						}
					} else {
						echo "<tr><td colspan='2'>Không tìm thấy thông tin cho mã tuyến: $matuyen</td></tr>";
					}
				}

				// Tính tổng số vé và áp dụng giảm giá cho vé trẻ em và em bé
				$tongSoVe = $tongSoVeNguoiLon + $tongSoVeTreEm + $tongSoVeEmBe;
				$tongTien = $tongTien * $tongSoVe;

				// Áp dụng giảm giá cho vé trẻ em (20%) và em bé (50%)
				$tongTien -= $giaVe * $tongSoVeTreEm * 0.2; // Giảm 20% cho vé trẻ em
				$tongTien -= $giaVe * $tongSoVeEmBe * 0.5; // Giảm 50% cho vé em bé
				
				$_SESSION['tongTien'] = $tongTien;
				
				echo "<tr><th colspan='2'>Tổng số vé và tổng tiền vé</th></tr>";
				echo "<tr><td>Tổng số vé:</td><td>$tongSoVe</td></tr>";
				echo "<tr><td>Tổng tiền vé:</td><td>" . number_format($tongTien, 0, ',', '.') . " VND</td></tr>";

			} else {
				echo "<tr><td colspan='2'>Không có thông tin được lưu trong session.</td></tr>";
			}
            ?>
        </table>
		<hr>
		
<table border="1">
    <tr>
        <th>Thông tin khách hàng</th>
        <th>Họ và tên</th>
        <th>Ngày sinh</th>
        <th>Độ tuổi</th>
        <th>Số ghế</th>
    </tr>

    <?php
    // Số lượng người lớn, trẻ em và em bé từ session
    $soVeNguoiLon = intval($_SESSION['soVeNguoiLon']);
    $soVeTreEm = intval($_SESSION['soVeTreEm']);
    $soVeEmBe = intval($_SESSION['soVeEmBe']);

    // Hiển thị form cho người lớn
    for ($i = 1; $i <= $soVeNguoiLon; $i++) {
        echo "<tr>";
        echo "<td>Người lớn</td>";
        echo "<td><input type='text' name='hoTenNguoiLon[$i]' required></td>";
        echo "<td><input type='date' name='ngaySinhNguoiLon[$i]' required></td>";
        echo "<td><select name='doTuoiNguoiLon[$i]'>";
        echo "<option value='Người lớn'>Người lớn</option>";
        echo "<option value='Trẻ em'>Trẻ em</option>";
        echo "<option value='Em bé'>Em bé</option>";
        echo "</select></td>";
        echo "<td><input type='text' name='soGheNguoiLon[$i]' required></td>";
        echo "</tr>";
    }

    // Hiển thị form cho trẻ em
    for ($i = 1; $i <= $soVeTreEm; $i++) {
        echo "<tr>";
        echo "<td>Trẻ em</td>";
        echo "<td><input type='text' name='hoTenTreEm[$i]' required></td>";
        echo "<td><input type='date' name='ngaySinhTreEm[$i]' required></td>";
        echo "<td><select name='doTuoiTreEm[$i]'>";
        echo "<option value='Người lớn'>Người lớn</option>";
        echo "<option value='Trẻ em' selected>Trẻ em</option>";
        echo "<option value='Em bé'>Em bé</option>";
        echo "</select></td>";
        echo "<td><input type='text' name='soGheTreEm[$i]' required></td>";
        echo "</tr>";
    }

    // Hiển thị form cho em bé
    for ($i = 1; $i <= $soVeEmBe; $i++) {
        echo "<tr>";
        echo "<td>Em bé</td>";
        echo "<td><input type='text' name='hoTenEmBe[$i]' required></td>";
        echo "<td><input type='date' name='ngaySinhEmBe[$i]' required></td>";
        echo "<td><select name='doTuoiEmBe[$i]'>";
        echo "<option value='Người lớn'>Người lớn</option>";
        echo "<option value='Trẻ em'>Trẻ em</option>";
        echo "<option value='Em bé' selected>Em bé</option>";
        echo "</select></td>";
        echo "<td><input type='text' name='soGheEmBe[$i]' required></td>";
        echo "</tr>";
    }
    ?>
</table>
        <br>
<div id="dichVuList">
    <label for="dichVu">Dịch vụ (nếu muốn):</label>
    <select name="dichVu" id="dichVu" onchange="showDescription()">
        <?php
        include('db.php');

        // Truy vấn để lấy toàn bộ dịch vụ từ bảng dichvu
        $sql = "SELECT * FROM dichvu";
        $result = $connect->query($sql);

        // Kiểm tra nếu có ít nhất một dịch vụ
        if ($result->num_rows > 0) {
            // Hiển thị danh sách dịch vụ trong dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['TenDichVu'] . "'>" . $row['TenDichVu'] . "</option>";
            }
        } else {
            echo "<option value=''>Không có dịch vụ nào</option>";
        }
        ?>
    </select>
</div>
		 <div id="moTaDichVu"></div>
		<br>
        <label for="payment">Lựa chọn thanh toán:</label>
        <select name="payment" id="payment">
            <option value="MoMo">MoMo(015648945)</option>
            <option value="MB-Bank">MB Bank(99162456)</option>
            <option value="VnPay">VNPAY(026459488)</option>
            <!-- Thêm các phương thức thanh toán khác nếu cần -->
        </select>
        <br>
        <label for="note">Ghi chú:</label>
        <textarea name="note" id="note" rows="4" cols="50" placeholder="Nhập ghi chú nếu có..."></textarea>
        <br>
        <button type="submit">Hoàn tất</button>
    </form>	
		
	<div id="thumbnail" style="margin-left: 150px;">
	  <img src="image/khoangtau.jpg" onclick="expandImage(this)" style="width: 150px; cursor: pointer;">
	</div>

	<div id="expandedImage" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 9999; text-align: center;">
	  <img id="expandedImg" style="max-width: 90%; max-height: 90%; margin-top: 2%;">
	  <span id="closeBtn" style="position: absolute; top: 10px; right: 30px; color: white; font-size: 40px; font-weight: bold; cursor: pointer;">&times;</span>
	</div>
	<h6 class="Chu">Nhấp vào hình để xem số ghế</h6>
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>BayWithVAA</h3>
						<p>Công ty TNHH Du Lịch và Dịch Vụ BayWithVAA</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Giới thiệu</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Về chúng tôi</a></li>
							<li><a href="#">Hỗ trợ</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Điểm điến</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Miền Bắc</a></li>
							<li><a href="#">Miền Nam</a></li>
							<li><a href="#">Miền Trung</a></li>
							<li><a href="#">Nước ngoài</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Liên hệ</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> BWV@gmail.com</a></li>
							<li><a href="#"><i class="icon-chat"></i> Nhắn tin trực tuyến</a></li>
						</ul>
					</div>
				</div>

			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
	function expandImage(img) {
  var expandedImage = document.getElementById("expandedImage");
  var expandedImg = document.getElementById("expandedImg");
  expandedImg.src = img.src;
  expandedImage.style.display = "block";

  var closeBtn = document.getElementById("closeBtn");
  closeBtn.onclick = function() {
    expandedImage.style.display = "none";
  }
}	
	</script>
	</body>
</html>

