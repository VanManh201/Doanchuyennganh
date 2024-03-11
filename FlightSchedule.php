<?php
// Bắt đầu phiên làm việc
session_start();

// Xử lý khi người dùng nhấp vào nút "Chọn"
if(isset($_POST['selected_flight'])) {
    // Lưu thông tin chuyến bay vào session
    $_SESSION['selected_flights'][] = $_POST['selected_flight'];
	
    echo 'success';
    exit;
}
?>
<?php
// Include file kết nối database
include 'db.php';

// Biến lưu trữ ID của sân bay đi và sân bay đến từ form tìm kiếm
$noidi = isset($_POST['noidi']) ? $_POST['noidi'] : '';
$noiden = isset($_POST['noiden']) ? $_POST['noiden'] : '';

// Thực hiện truy vấn để lấy tên của sân bay Tân Sơn Nhất và Nội Bài dựa trên ID của chúng
$sqlNoidi = "SELECT TenSanBay FROM sanbay WHERE ID_CHK = '$noidi'";
$sqlNoiden = "SELECT TenSanBay FROM sanbay WHERE ID_CHK = '$noiden'";

$resultNoidi = $connect->query($sqlNoidi);
$resultNoiden = $connect->query($sqlNoiden);

// Biến lưu trữ tên của sân bay đi và sân bay đến
$tenNoidi = '';
$tenNoiden = '';

if ($resultNoidi->num_rows > 0) {
    $row = $resultNoidi->fetch_assoc();
    $tenNoidi = $row['TenSanBay'];
}

if ($resultNoiden->num_rows > 0) {
    $row = $resultNoiden->fetch_assoc();
    $tenNoiden = $row['TenSanBay'];
}
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
	<style>
		
	</style>
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
	<link rel="stylesheet" href="./css/calenderFlight.css">

	<style>
	#email-display {
    font-size: 20px; /* Cỡ chữ */
    margin-left: 10px; /* Khoảng cách với liên kết "Đăng xuất" */
    font-weight: bold; /* In đậm */
	}		
	</style>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Lịch bay</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	<div class="gtco-section align-center" >
		<div class="">
			<div class="flex-grow flex flex-col gap-16  calendarFlight">
				<div class="Card-card">
					<div class="FlightsCardHeader">
						<div class="FlightsCardHeader-details flex flex-col gap-8">
							<div class="flex gap-8 align-center">
								<label><?php echo $tenNoidi; ?></label>
								<label> -> </label>
								<label><?php echo $tenNoiden; ?></label>
							</div>
						</div>
					</div>

					<div class="FlightsCalendar-calender">
						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 2</div>
							<div class="subheading md">08</div>
						</div>

						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 3</div>
							<div class="subheading md">09</div>
						</div>

						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 4</div>
							<div class="subheading md">10</div>
						</div>

						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 5</div>
							<div class="subheading md">11</div>
						</div>

						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 6</div>
							<div class="subheading md">12</div>
						</div>

						<div class="FlightsCalendar-calender-item" style="cursor: pointer;">
							<div class="detail sm text-center">Thứ 7</div>
							<div class="subheading md">13</div>
						</div>
					</div>
				<!-- Một Chuyến bay -->
<div id="flightList" class="flex flex-col gap-16 flightList">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu form
    $noidi = $_POST['noidi'];
    $noiden = $_POST['noiden'];
    $ngay = $_POST['ngay'];
    $loaibay = $_POST['trip-type'];
    $ngayve = $_POST['ngayve'];

    // Khởi tạo câu lệnh SQL mặc định
		$sqlNgayDi = "SELECT mt.*, sbdi.TenSanBay AS TenSanBayDi, sbden.TenSanBay AS TenSanBayDen, mt.HangBay, cb.GiaVe
					  FROM matuyen mt 
					  INNER JOIN sanbay sbdi ON mt.ID_SanBayDi = sbdi.ID_CHK 
					  INNER JOIN sanbay sbden ON mt.ID_SanBayDen = sbden.ID_CHK 
					  LEFT JOIN chuyenbaydi cb ON mt.ID_MaTuyen = cb.ID_MaTuyen 
					  WHERE mt.ID_SanBayDi = '$noidi' AND mt.ID_SanBayDen = '$noiden' AND mt.ThoiGian = '$ngay' AND mt.ID_LoaiBay = '$loaibay'";

		// Kiểm tra nếu là loại bay 2 và có ngày về được chọn
		if ($loaibay == '2' && !empty($ngayve)) {
			// Thêm điều kiện cho ngày về
			$sqlNgayVe = "SELECT mt.*, sbdi.TenSanBay AS TenSanBayDi, sbden.TenSanBay AS TenSanBayDen, mt.HangBay, cb.GiaVe
						  FROM matuyen mt 
						  INNER JOIN sanbay sbdi ON mt.ID_SanBayDi = sbdi.ID_CHK 
						  INNER JOIN sanbay sbden ON mt.ID_SanBayDen = sbden.ID_CHK 
						  LEFT JOIN chuyenbayve cb ON mt.ID_MaTuyen = cb.ID_MaTuyen 
						  WHERE mt.ID_SanBayDi = '$noiden' AND mt.ID_SanBayDen = '$noidi' AND mt.ThoiGian = '$ngayve' AND mt.ID_LoaiBay = '$loaibay'";
		}

    // Thực hiện truy vấn để lấy số lượng chuyến bay
    $resultNgayDi = $connect->query($sqlNgayDi);
    $resultNgayVe = isset($sqlNgayVe) ? $connect->query($sqlNgayVe) : null;
	
	// Khai báo biến để định dạng ngày
	$ngaydi_formatted = date("d-m-Y", strtotime($ngay));
	$ngayve_formatted = date("d-m-Y	", strtotime($ngayve));
	
	
	echo "<div id='chuyenbay_results_ngaydi'>";
    if ($resultNgayDi->num_rows > 0) {
        echo "<h3 style='margin-left: 20px; color: blue;'>Chuyến đi của ngày $ngaydi_formatted</h3>";
        // Hiển thị thông tin các chuyến bay tìm được từ bảng matuyen cho ngày đi
        while ($row = $resultNgayDi->fetch_assoc()) {
			$giaVeDi = number_format($row['GiaVe'], 0, ',', '.') . " VND";
			$hangBayLogo = strtolower(str_replace(' ', '', $row['HangBay'])) . '.png';
			echo "<div style='border: 1px solid #000; padding: 10px; margin-bottom: 10px;'>";
			echo '<img src="images/' . $hangBayLogo . '" alt="' . $row['HangBay'] . '" class="logo"  style="max-width: 100px; max-height: 100px;">';
			echo "<div>";
			echo "<strong>Mã tuyến:</strong> " . $row['ID_MaTuyen'] . "<br>";
			echo "<strong>Sân bay đi:</strong> (" . $row['ID_SanBayDi'] . ") " . $row['TenSanBayDi'] . "<br>";
			echo "<strong>Sân bay đến:</strong> (" . $row['ID_SanBayDen'] . ") " . $row['TenSanBayDen'] . "<br>";
			echo "<strong>Khoảng cách:</strong> " . $row['KhoangCach'] . "<br>";
			echo "<strong>Thời gian:</strong> " . date('d-m-Y', strtotime($row['ThoiGian'])) . "<br>";
			echo "</div>";
			echo "<button class='select-button' data-matuyen='" . $row['ID_MaTuyen'] . "'>Chọn</button>";
			echo "<button class='btnXemThem' data-idmatuyen='" . $row['ID_MaTuyen'] . "'>Xem thêm</button>";
			echo "<div class='divThongTin'></div>";
			echo "</div>";
        }
        // Hiển thị nút phân trang cho chuyến bay đi
        echo "<div id='pagination'>";
        echo "</div>";
    } else {
        echo "Không có chuyến bay phù hợp cho ngày đi.";
    }
    echo "</div>";
	
	if ($loaibay == '2' && !empty($ngayve)) {
    // Hiển thị kết quả của chuyến bay đi
    echo "<div id='chuyenbay_results_ngaydi'>";
    if ($resultNgayDi->num_rows > 0) {
        // Hiển thị thông tin các chuyến bay tìm được từ bảng matuyen cho ngày đi
        while ($row = $resultNgayDi->fetch_assoc()) {
			$hangBayLogo = strtolower(str_replace(' ', '', $row['HangBay'])) . '.png';
			echo "<div style='border: 1px solid #000; padding: 10px; margin-bottom: 10px;'>";
			echo '<img src="images/' . $hangBayLogo . '" alt="' . $row['HangBay'] . '" class="logo"  style="max-width: 100px; max-height: 100px;">';
			echo "<div>";
			echo "<strong>Mã tuyến:</strong> " . $row['ID_MaTuyen'] . "<br>";
			echo "<strong>Sân bay đi:</strong> (" . $row['ID_SanBayDi'] . ") " . $row['TenSanBayDi'] . "<br>";
			echo "<strong>Sân bay đến:</strong> (" . $row['ID_SanBayDen'] . ") " . $row['TenSanBayDen'] . "<br>";
			echo "<strong>Khoảng cách:</strong> " . $row['KhoangCach'] . "<br>";
			echo "<strong>Thời gian:</strong> " . date('d-m-Y', strtotime($row['ThoiGian'])) . "<br>";
			echo "</div>";
			echo "<button class='select-button' data-matuyen='" . $row['ID_MaTuyen'] . "'>Chọn</button>";
			echo "<button class='btnXemThem' data-idmatuyen='" . $row['ID_MaTuyen'] . "'>Xem thêm</button>";
			echo "<div class='divThongTin'></div>";
			echo "</div>";
        }
        // Hiển thị nút phân trang cho chuyến bay đi
        echo "<div id='pagination'>";
        echo "</div>";
    } else {
        echo "Không có chuyến bay phù hợp cho ngày đi.";
    }
    echo "</div>";

    // Hiển thị kết quả của chuyến bay về nếu có
    echo "<div id='chuyenbay_results_ngayve'>";
    if ($resultNgayVe && $resultNgayVe->num_rows > 0) {
        echo "<h3 style='margin-left: 20px; color: blue;'>Chuyến về của ngày $ngayve_formatted</h3>";

        // Hiển thị thông tin các chuyến bay tìm được từ bảng matuyen cho ngày về
        while ($row = $resultNgayVe->fetch_assoc()) {
			$hangBayLogo = strtolower(str_replace(' ', '', $row['HangBay'])) . '.png';
			echo "<div style='border: 1px solid #000; padding: 10px; margin-bottom: 10px;'>";
			echo '<img src="images/' . $hangBayLogo . '" alt="' . $row['HangBay'] . '" class="logo"  style="max-width: 100px; max-height: 100px;">';
			echo "<div>";
			echo "<strong>Mã tuyến:</strong> " . $row['ID_MaTuyen'] . "<br>";
			echo "<strong>Sân bay đi:</strong> (" . $row['ID_SanBayDi'] . ") " . $row['TenSanBayDi'] . "<br>";
			echo "<strong>Sân bay đến:</strong> (" . $row['ID_SanBayDen'] . ") " . $row['TenSanBayDen'] . "<br>";
			echo "<strong>Khoảng cách:</strong> " . $row['KhoangCach'] . "<br>";
			echo "<strong>Thời gian:</strong> " . date('d-m-Y', strtotime($row['ThoiGian'])) . "<br>";
			echo "</div>";
			echo "<button class='select-button' data-matuyen='" . $row['ID_MaTuyen'] . "'>Chọn</button>";
			echo "<button class='btnXemThem' data-idmatuyen='" . $row['ID_MaTuyen'] . "'>Xem thêm</button>";
			echo "<div class='divThongTin'></div>";	
			echo "</div>";
        }
        // Hiển thị nút phân trang cho chuyến bay về
        echo "<div id='pagination2'>";
        echo "</div>";
	}else{
		echo "Không có chuyến bay phù hợp cho ngày về.";
	}
    echo "</div>";
}}
?>
</div>	


				</div>
			</div>
			<!--
			<div class="Card-card-customer" id="customerId1">
					<div class="Customer-info-header" id="eventDiv">
						<div class="subheading md">Thông tin khách hàng</div>
					</div>	
					<div class="Customer-info-content">

						<div class="flex flex-col gap-24">
							<div class="flex gap-16 align">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 20C5.33579 17.5226 8.50702 16 12 16C15.493 16 18.6642 17.5226 21 20M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
								<div class="flex flex-col gap-4">
									<label class="sm"> Người lớn </label>
									<p class="md">
										Khách hàng
										1
									</p>
								</div>
							</div>
						</div>

						<div class="grid grid-cols-3 gap-16 ">
							<div class="Customer-info-select-input">
								<div class="relative">
									<div class="Customer-info-input">
										<select class="Customer-info-select">
											<option value="">Nam</option>
											<option value="">Nữ</option>
										</select>
									</div>
								</div>
							</div>
							<div class="">							
								<input type="text" class="Customer-info-input-text" placeholder="Nhập họ" >
							</div>
							<div class="">
								<input  type="text"class="Customer-info-input-text" placeholder="Nhập tên đệm và tên">
							</div>
						</div>
					</div>
					<div class="Customer-info-footer">
						<div class="grid grid-cols-2 gap-24">
							<div class="flex flex-col gap-4">
								<label class="sm">
									SGN  →  HAN
								</label>
								<p class="sm">
									23:40, 17/02/2024
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="Card-card-customer" id="customerId2">
				<div class="Customer-info-header" id="eventDiv">
						<div class="subheading md">Thông tin liên hệ</div>
				</div>
				<div class="grid grid-cols-2 gap-24">		
					<div class="Customer-info-content">
						<div class="Customer-info-input">
							<select class="Customer-info-select">
								<option value="">Ông</option>
								<option value="">Bà</option>
							</select>
						</div>
						
					</div>
					<div class="">							
								<input type="text" class="Customer-info-input-text" placeholder="Nhập họ" >
						</div>
						<div class="">							
								<input type="text" class="Customer-info-input-text" placeholder="Nhập tên đệm và tên" >
						</div>
						<div class="">							
								<input type="text" class="Customer-info-input-text" placeholder="Nhập số điện thoại" >
						</div>
					</div>
				</div>	
		</div>
	<div id="customerId3" style="display: none;">
		<div class="flex justify-between">
			<button type="button" class="Customer-info-button Button_button Button-button-normal" id="backButton" style="border-radius: 100px; box-shadow: var(--shadow-xs); gap:8px;">Quay lại</button>
			<button type="button" class="Customer-info-button Button_button Button-button-normal" style="border-radius: 100px; box-shadow: var(--shadow-xs); gap:8px;" value="s.php">Tiếp</button>
		</div>
	</div>
	-->
	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Đối tác</h2>
					<p>Cùng các hãng bay lớn</p>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Destination</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Europe</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Canada</a></li>
							<li><a href="#">Dubai</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Hotels</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Luxe Hotel</a></li>
							<li><a href="#">Italy 5 Star hotel</a></li>
							<li><a href="#">Dubai Hotel</a></li>
							<li><a href="#">Deluxe Hotel</a></li>
							<li><a href="#">BoraBora Hotel</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">freehtml5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
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
	
	<!-- Chọn vé -->
	<script> 

	/*	document.getElementById('chooseButton').addEventListener('click', function() {
		// Hiển thị div khi nút được nhấn
		document.getElementById('customerId').style.display = 'block';
		document.getElementById('eventDiv').scrollIntoView({ behavior: 'smooth' });
		}); 
	*/
	/*
		document.addEventListener('DOMContentLoaded', function () {

			
		// Lắng nghe sự kiện click trên nút "Chọn"
		document.getElementById('chooseButton').addEventListener('click', function () {
			// Hiển thị Card-card-customer khi nút "Chọn" được nhấn
			document.getElementById('customerId').style.display = 'block';
			
			// Ẩn Card-card sau khi đã chọn
			document.querySelector('.Card-card').style.display = 'none';
		});
	});
	*/
		document.addEventListener('DOMContentLoaded', function () {
		const chooseButtons = document.querySelectorAll('.chooseButton');
		let selectedCardIndex = -1;

		chooseButtons.forEach(function (button, index) {
			button.addEventListener('click', function () {
				// Lưu index của Card-card được chọn
				selectedCardIndex = index;

				// Ẩn tất cả các Card-card ngoại trừ Card-card được chọn
				const cardCards = document.querySelectorAll('.Card-card');
				cardCards.forEach(function (card, cardIndex) {
					if (cardIndex !== selectedCardIndex) {
						card.style.display = 'none';
					}
				});

				// Hiển thị Card-card-customer
				document.getElementById('customerId1').style.display = 'block';
				document.getElementById('customerId2').style.display = 'block';
				document.getElementById('customerId3').style.display = 'block';

				//Ẩn
				document.getElementById('backButton').addEventListener('click', function() {
				// Ẩn form nhập thông tin khách hàng
				document.getElementById('customerId1').style.display = 'none';
				document.getElementById('customerId2').style.display = 'none';
				document.getElementById('customerId3').style.display = 'none';
				const cardCards = document.querySelectorAll('.Card-card');
				//Hiện lại lịch bay
				cardCards.forEach(function (card, cardIndex) {
					if (cardIndex !== selectedCardIndex) {
						card.style.display = 'block';
					}
				});
				});
			});
		});
	});


	</script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
    // Biến toàn cục
    let currentPage = 1;
    let resultsPerPage = 6;
    let resultElements;

    // Hàm hiển thị kết quả theo trang
    function displayResults(page) {
        resultElements = document.querySelectorAll("#chuyenbay_results_ngaydi div");
        // Ẩn tất cả các mục đầu tiên
        resultElements.forEach(item => item.style.display = "none");
        // Hiển thị các mục trên trang hiện tại
        let startIndex = (page - 1) * resultsPerPage;
        let endIndex = page * resultsPerPage;
        for(let i = startIndex; i < endIndex && i < resultElements.length; i++) {
            resultElements[i].style.display = "block";
        }
        // Cập nhật phân trang sau khi hiển thị kết quả
        updatePagination();
    }

    // Hàm cập nhật nội dung của phân trang
    function updatePagination() {
        // Xóa nội dung cũ đi
        document.getElementById("pagination").innerHTML = "";  
        // Tính tổng số trang
        let numPages = Math.ceil(resultElements.length / resultsPerPage);
        // Tạo các nút cho từng trang
        for(let i = 1; i < numPages; i++) {
            let btn = document.createElement("button");
            btn.innerText = i;
            btn.onclick = function() {
                currentPage = i;
                displayResults(i);  
            }
            document.getElementById("pagination").appendChild(btn);
        }
        // Hiển thị phân trang
        document.getElementById("pagination").style.display = "block";
    }

    // Gọi các hàm ban đầu  
    displayResults(1);
</script>

<script>
    // Biến toàn cục
    let currentPage2 = 1;
    let resultsPerPage2 = 6;
    let resultElements2;

    // Hàm hiển thị kết quả theo trang
    function displayResults2(page) {
        resultElements2 = document.querySelectorAll("#chuyenbay_results_ngayve div");
        // Ẩn tất cả các mục đầu tiên
        resultElements2.forEach(item => item.style.display = "none");
        // Hiển thị các mục trên trang hiện tại
        let startIndex2 = (page - 1) * resultsPerPage2;
        let endIndex2 = page * resultsPerPage2;
        for(let i = startIndex2; i < endIndex2 && i < resultElements2.length; i++) {
            resultElements2[i].style.display = "block";
        }
        // Cập nhật phân trang sau khi hiển thị kết quả
        updatePagination2();
    }

    // Hàm cập nhật phân trang
    function updatePagination2() {
        // Xóa phân trang cũ 
        let pagination2 = document.getElementById("pagination2");
        if (!pagination2) return; // Đảm bảo phân trang tồn tại trước khi tiếp tục
        pagination2.innerHTML = "";
        let numPages2 = Math.ceil(resultElements2.length / resultsPerPage2);
        // Tạo các nút phân trang
        for(let i = 1; i < numPages2; i++) {
            let btn = document.createElement("button");
            btn.innerText = i;
            btn.onclick = function() {
                currentPage2 = i;
                displayResults2(i);    
            }
            pagination2.appendChild(btn);
        }
        // Hiển thị phân trang
        pagination2.style.display = "block";
    }

    // Gọi các hàm
    displayResults2(1);
</script>

	<script>
	document.addEventListener("DOMContentLoaded", function () {
    // Bắt sự kiện click cho tất cả các nút "Xem thêm"
    var btnXemThem = document.querySelectorAll('.btnXemThem');

    btnXemThem.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var idMatuyen = this.getAttribute('data-idmatuyen');

            // Lưu giữ giá trị của 'this'
            var currentButton = this;

            // Lấy divThongTin tương ứng
            var divThongTin = currentButton.parentElement.querySelector('.divThongTin');

            // Kiểm tra nếu đã hiển thị thông tin thì ẩn nó đi, ngược lại hiển thị
            if ($(divThongTin).is(':visible')) {
                $(divThongTin).slideUp("slow");
            } else {
                // Ẩn tất cả các divThongTin khác
                $('.divThongTin').not(divThongTin).slideUp("slow");

                // Gửi yêu cầu AJAX đến thongtin.php
                sendAjaxRequest();
            }

            // Hàm gửi yêu cầu AJAX
            function sendAjaxRequest() {
                // Gửi yêu cầu AJAX đến thongtin.php
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'thongtin.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
                // Gửi dữ liệu ID_MaTuyen
                var data = 'idMatuyen=' + encodeURIComponent(idMatuyen);
                
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Sử dụng giá trị 'currentButton' thay vì 'this'
                        divThongTin.innerHTML = xhr.responseText;
                        // Hiển thị thông tin với hiệu ứng slide
                        $(divThongTin).slideDown("slow");
                    }
                };

                xhr.send(data);
            }
        });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var selectedFlights = []; // Mảng lưu thông tin chuyến bay đã chọn

    $('.select-button').click(function() {
        var matuyen = $(this).data('matuyen');
        var loaibay = '<?php echo $loaibay; ?>';

        // Lưu chuyến bay đã chọn vào mảng selectedFlights
        selectedFlights.push(matuyen);

        // Kiểm tra loại bay
        if (loaibay === '1') {
            // Nếu là loại bay một chiều, gửi yêu cầu AJAX để lưu thông tin chuyến bay và chuyển hướng đến trang customer.php
            saveSelectedFlights(selectedFlights);
        } else if (loaibay === '2' && selectedFlights.length === 2) {
            // Nếu là loại bay hai chiều và đã chọn cả chuyến bay đi và về, gửi yêu cầu AJAX để lưu thông tin chuyến bay và chuyển hướng đến trang customer.php
            saveSelectedFlights(selectedFlights);
        }
    });

    function saveSelectedFlights(selectedFlights) {
        // Gửi yêu cầu AJAX để lưu thông tin chuyến bay vào session
        $.ajax({
            type: 'POST',
            url: 'save_selected_flight.php',
            data: { selectedFlights: selectedFlights },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Chuyển hướng đến trang customer.php sau khi lưu thông tin chuyến bay thành công
                    window.location.href = 'CustomerInfo.php';
                } else {
                    // Hiển thị thông báo lỗi nếu có lỗi xảy ra
                    alert('Đã có lỗi xảy ra khi lưu thông tin chuyến bay.');
                }
            },
            error: function(xhr, status, error) {
                // Hiển thị thông báo lỗi nếu yêu cầu AJAX không thành công
                alert('Đã có lỗi xảy ra khi gửi yêu cầu.');
            }
        });
    }
});
</script>

	</body>
</html>

