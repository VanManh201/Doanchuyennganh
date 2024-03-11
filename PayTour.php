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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/SonDongimg.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Thanh toán Tour</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
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

// Khởi tạo biến tổng tiền trước khi sử dụng
$tongTien = 0;

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

    // Tính tổng tiền chỉ khi giá không null
    if ($row['Gia'] !== null && $row['GiaTreEm'] !== null && $row['GiaEmBe'] !== null) {
        $giaNguoiLon = $row['Gia'];
        $giaTreEm = $row['GiaTreEm'];
        $giaEmBe = $row['GiaEmBe'];
        $tongTien = ($soVeNguoiLon * $giaNguoiLon) + ($soVeTreEm * $giaTreEm) + ($soVeEmBe * $giaEmBe);
    } else {
        echo "Không thể tính tổng tiền do dữ liệu giá tour không hợp lệ.";
    }
} else {
    echo "Không tìm thấy thông tin tour.";
}
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
		<div id="formNhapThongTin">
			<h4>Nhập thông tin:</h4>
			<?php
			// Form nhập thông tin hành khách người lớn
			for ($i = 1; $i <= $soVeNguoiLon; $i++) {
				echo "<h5>Người lớn:</h5>";
				echo '<label for="doTuoiNguoiLon' . $i . '">Độ tuổi:</label>';
				echo '<select id="doTuoiNguoiLon' . $i . '" name="doTuoiNguoiLon' . $i . '">';
				echo '<option value="Người lớn">Người lớn</option>';
				echo '<option value="Trẻ em">Trẻ em</option>';
				echo '<option value="Em bé">Em bé</option>';
				echo '</select><br>';
				echo '<label for="hoTenNguoiLon' . $i . '">Họ và tên:</label>';
				echo '<input type="text" id="hoTenNguoiLon' . $i . '" name="hoTenNguoiLon' . $i . '"><br>';
				echo '<label for="ngaySinhNguoiLon' . $i . '">Ngày sinh:</label>';
				echo '<input type="date" id="ngaySinhNguoiLon' . $i . '" name="ngaySinhNguoiLon' . $i . '"><br>';
			}

			// Form nhập thông tin hành khách trẻ em
			for ($i = 1; $i <= $soVeTreEm; $i++) {
				echo "<h5>Trẻ em:</h5>";
				echo '<label for="doTuoiTreEm' . $i . '">Độ tuổi:</label>';
				echo '<select id="doTuoiTreEm' . $i . '" name="doTuoiTreEm' . $i . '">';
				echo '<option value="Người lớn">Người lớn</option>';
				echo '<option value="Trẻ em">Trẻ em</option>';
				echo '<option value="Em bé">Em bé</option>';
				echo '</select><br>';
				echo '<label for="hoTenTreEm' . $i . '">Họ và tên:</label>';
				echo '<input type="text" id="hoTenTreEm' . $i . '" name="hoTenTreEm' . $i . '"><br>';
				echo '<label for="ngaySinhTreEm' . $i . '">Ngày sinh:</label>';
				echo '<input type="date" id="ngaySinhTreEm' . $i . '" name="ngaySinhTreEm' . $i . '"><br>';
			}

			// Form nhập thông tin hành khách em bé
			for ($i = 1; $i <= $soVeEmBe; $i++) {
				echo "<h5>Em bé:</h5>";
				echo '<label for="doTuoiEmBe' . $i . '">Độ tuổi:</label>';
				echo '<select id="doTuoiEmBe' . $i . '" name="doTuoiEmBe' . $i . '">';
				echo '<option value="Người lớn">Người lớn</option>';
				echo '<option value="Trẻ em">Trẻ em</option>';
				echo '<option value="Em bé">Em bé</option>';
				echo '</select><br>';
				echo '<label for="hoTenEmBe' . $i . '">Họ và tên:</label>';
				echo '<input type="text" id="hoTenEmBe' . $i . '" name="hoTenEmBe' . $i . '"><br>';
				echo '<label for="ngaySinhEmBe' . $i . '">Ngày sinh:</label>';
				echo '<input type="date" id="ngaySinhEmBe' . $i . '" name="ngaySinhEmBe' . $i . '"><br>';
			}
			?>
		</div>
 		<label for="phuongThucThanhToan">Phương thức thanh toán:</label><br>
        <select name="phuongThucThanhToan" id="phuongThucThanhToan">
            <option value="MoMo">MoMo (01564894878)</option>
            <option value="MB-Bank">Ngân hàng MBBank (998945615)</option>
            <option value="VnPay">VNPAY (0298787975)</option>
            <!-- Thêm các phương thức thanh toán khác vào đây -->
        </select><br>
        <label for="ghiChu">Ghi chú:</label><br>
        <textarea name="ghiChu" id="ghiChu" rows="4" cols="50"></textarea><br>
        <button type="submit">Hoàn tất</button>
    </form>
</div>

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

	</body>
</html>

