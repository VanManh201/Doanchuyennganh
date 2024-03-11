<?php
	include ('db.php');
?>
<?php
session_start(); // Bắt đầu phiên mới hoặc tiếp tục phiên hiện có

// Kiểm tra nếu có dữ liệu được gửi từ form POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lưu thông tin điểm đi và điểm đến vào session
    $noidi = $_POST['noidi'];
    $noiden = $_POST['noiden'];
    
    // Lưu dữ liệu vào session
    $_SESSION['noidi'] = $noidi;
    $_SESSION['noiden'] = $noiden;
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
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="./css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="./css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

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
		
	<div class="gtco-loader"></div>
	
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="	background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Đi đu đưa đi cùng VAA</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Mở cánh cửa khám phá cùng BayWithVAA</h3>
											<form method="POST" action="FlightSchedule.php">
											<!--<div class="row form-group">
													<div class="col-md-12">
														<label for="fullname">Your Name</label>
														<input type="text" id="fullname" class="form-control">
													</div>
												</div> -->	
												<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">Điểm đi</label>
														<select name="noidi" id="activities" class="form-control">
													<?php
														include 'db.php';
														$sql = "SELECT ID_CHK, TenSanBay FROM sanbay";
														$result = $connect->query($sql);
														if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																echo "<option value='" . $row['ID_CHK'] . "'>" . $row['TenSanBay'] . "</option>";
															}
														} else {
															echo "<option value=''>Không có sân bay</option>";
														}
													?>
														</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="destination">Điểm đến</label>
														<select name="noiden" id="destination" class="form-control">
													<?php
														include 'db.php';
														$sql = "SELECT ID_CHK, TenSanBay FROM sanbay";
														$result = $connect->query($sql);
														if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																echo "<option value='" . $row['ID_CHK'] . "'>" . $row['TenSanBay'] . "</option>";
															}
														} else {
															echo "<option value=''>Không có sân bay</option>";
														}
													?>
														</select>
													</div>
												</div>
												
												<div class="row form-group">
													<div class="col-md-12">
														<label for="trip-type">Loại vé</label>
														<div>
															<label>
																<input type="radio" name="trip-type" value="1" checked> Một chiều
															</label>
															<label>
																<input type="radio" name="trip-type" value="2"> Khứ hồi
															</label>
														</div>
													</div>
												</div>
												
												<div class="row form-group" id="departure-date">
													<div class="col-md-12">
														
														<input type="hidden" id="date-start" class="form-control">
													</div>
												</div>
												<div class="row form-group" id="departure-date">
													<div class="col-md-12">
														<label for="date-start">Ngày đi</label>
														<input type="date" id="date-start" class="form-control" value="" name="ngay">
													</div>
												</div>
												<div class="row form-group" id="return-date" class="hidden">
													<div class="col-md-12">
														<label for="date-end">Ngày về</label>
														<input type="date" id="date-end" class="form-control" name="ngayve">
													</div>
												</div>
												
												<script>
													// Hàm này sẽ được gọi khi trang web được tải để kiểm tra trạng thái mặc định của radio button
													window.onload = function () {
														toggleDateFields();
													};
												
													document.querySelectorAll('input[name="trip-type"]').forEach(function (elem) {
														elem.addEventListener("change", function () {
															toggleDateFields();
														});
													});
												
													function toggleDateFields() {
														var returnDate = document.getElementById("return-date");
														var roundTripRadio = document.querySelector('input[name="trip-type"][value="2"]');
												
														if (roundTripRadio.checked) {
															returnDate.classList.remove("hidden");
														} else {
															returnDate.classList.add("hidden");
														}
													}
												</script>

												<div class="row form-group">
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary btn-block" value="Tìm chuyến bay">Tìm chuyến bay</button>
													</div>
												</div>
											</form>	
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Những địa điểm nổi tiếng</h2>
					<p>Cùng chiêm ngưỡng những danh lam thắng cảnh tuyệt đẹp ở Việt Nam</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/PhuQuocimg1.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/PhuQuocimg1.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Phú Quốc - Hòn ngọc quý
								
							</h2>
							<p>Nằm ở phía Tây Nam Việt Nam, trong vùng vịnh Thái Lan, đảo Phú Quốc được mệnh ....</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/Dalatimg.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/Dalatimg.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Đà lạt - Một Paris thu nhỏ</h2>
							<p>Nằm trên cao nguyên Lâm Viên ở độ cao 1.500m so với mực nước biển, thành phố Đà Lạt ...</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/SonDongimg.png" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/SonDongimg.png" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Đồng Hới – Thiên nhiên kỳ vĩ</h2>
							<p>Nằm ở vùng duyên hải Bắc Trung Bộ, nơi có dòng sông Nhật Lệ hiền hòa chảy qua, Đồng Hới....</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/Hueimg.png" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/Hueimg.png" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Huế - Cố đô thơ mộng</h2>
							<p>Thừa Thiên Huế thuộc vùng Duyên hải Bắc Trung Bộ, từng là kinh ...</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/Nhatrangimg.png" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/Nhatrangimg.png" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Nha Trang – Rừng Trầm, biển Yến</h2>
							<p>Nha Trang là thành phố biển đẹp với những bãi cát trải dài, những....</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/Condaoimg.png" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="images/Condaoimg.png" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Côn Đảo – Vẻ đẹp hoang sơ kỳ bí</h2>
							<p>Côn Đảo là một quần đảo hoang sơ được bao bọc bởi những dãy núi đá..</p>
							<p><span class="btn btn-primary">Khám phá</span></p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Đối tác Cùng các
						Hãng máy bay lớn</h2>
					<p>Đối tác hàng đầu với các hãng máy bay lớn: Ưu đãi độc quyền dành riêng cho bạn</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<img src="images/flight-partner-0.png" >
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<img src="images/flight-partner-1.png" >
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<img src="images/flight-partner-2.png" >
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<img src="images/flight-partner-3.png" >
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<img src="images/flight-partner-4.png" >
					</div>
				</div>
				
			</div>
		</div>
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

