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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

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
.product-container {
    flex-wrap: wrap; /* Cho phép các khung chuyển dòng khi không đủ chỗ */
    justify-content: space-between; /* Canh chỉnh các khung để chúng lấp đầy không gian */
}

.product {
    width: calc(25% - 20px); /* Chiếm 1/4 phần tử cha và trừ đi khoảng cách giữa các khung */
    border: 1px solid #ccc; /* Đường viền 1px với màu xám */
    border-radius: 10px; /* Độ cong góc 10px */
    padding: 10px; /* Khoảng cách nội dung với viền */
    margin-bottom: 20px; /* Khoảng cách giữa các khung */
	margin-top: 20px;
}

.product img {
    max-width: 100%; /* Ảnh sẽ không vượt quá chiều rộng của phần tử cha */
    border-radius: 10px; /* Độ cong góc 10px cho ảnh */
    margin-top: 10px; /* Khoảng cách giữa ảnh và các phần tử khác */
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/Hueimg.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Tin tức</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
<div class="news-container">    
    <?php
    // Truy vấn dữ liệu từ bảng baiviet
    $sql = "SELECT * FROM baiviet WHERE AnHien = 1";
    $result = $connect->query($sql);

    // Kiểm tra xem có dữ liệu trả về không
    if ($result->num_rows > 0) {
        // Bắt đầu phần tử product-container
        echo "<div class='product-container'>";
        // Hiển thị dữ liệu mỗi hàng trong bảng
        while($row = $result->fetch_assoc()) {
            // Lấy email của tác giả từ bảng user
            $sql_user = "SELECT Email FROM user WHERE ID_User = '" . $row['ID_User'] . "'";
            $result_user = $connect->query($sql_user);
            // Kiểm tra xem có dữ liệu trả về từ truy vấn SQL không
            if($result_user->num_rows > 0) {
                $user_row = $result_user->fetch_assoc();
                $author_email = $user_row['Email'];
            } else {
                $author_email = "Không có tác giả";
            }

            // Mô tả bài viết (giới hạn tối đa 100 ký tự)
            $description = substr($row['MoTa'], 0, 100);
            // Nếu mô tả cắt ngắn, thêm dấu "..."
            if(strlen($row['MoTa']) > 100) {
                $description .= "...";
            }

            // In ra các trường dữ liệu trong bảng và chèn ảnh
            echo "<div class='product'>";
            echo "<h2>" . $row['TieuDe'] . "</h2>";
            echo "<p><strong>Người viết:</strong> " . $author_email . "</p>";
            echo "<p><strong>Mô tả:</strong> " . $description . "</p>";
            echo "<img src='/BayWithVaa/img/" . $row['AnhBaiViet'] . "' alt='Ảnh bài viết'>";
            echo "<p><strong>Ngày đăng:</strong> " . date('d-m-Y', strtotime($row['NgayDang'])) . "</p>";
            // Sử dụng thẻ a để chuyển hướng đến trang chi tiết
            echo "<a href='newsdetail.php?id=" . $row['ID_News'] . "' target='_blank'>Xem chi tiết</a>";
            echo "</div>";
        }
        // Kết thúc phần tử product-container
        echo "</div>";
    } else {
        echo "Không có bài viết nào được hiển thị.";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $connect->close();
    ?>
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

