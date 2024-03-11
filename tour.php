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
/* Thiết lập kiểu cho các tour wrapper */
.tour-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px; /* Khoảng cách giữa các hàng */
}

/* Thiết lập kiểu cho các tour item */
.tour-item {
    width: calc(25% - 20px); /* Đặt kích thước cho mỗi tour */
    background-color: #f9f9f9; /* Màu nền cho mỗi tour */
    padding: 20px; /* Khoảng cách nội dung và viền cho mỗi tour */
    border-radius: 8px; /* Bo tròn các cạnh */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng đổ */
    margin-bottom: 20px; /* Khoảng cách giữa các chuyến */
    box-sizing: border-box; /* Đảm bảo kích thước của khung tính cả viền */
}

/* Thiết lập kiểu cho hình ảnh thumbnail của tour */
.tour-thumbnail {
    margin-top: 5px;
    max-width: 100%; /* Đảm bảo hình ảnh không vượt quá kích thước của tour item */
    border-radius: 8px; /* Bo tròn các cạnh */
}

/* Thiết lập kiểu cho chi tiết tour */
.tour-details {
    margin-top: 15px; /* Khoảng cách giữa tiêu đề và giá tour */
}

/* Thiết lập kiểu cho tiêu đề tour */
.tour-title {
    font-size: 20px; /* Kích thước chữ cho tiêu đề tour */
    margin-bottom: 5px; /* Khoảng cách giữa tiêu đề và giá tour */
}

/* Thiết lập kiểu cho giá tour */
.tour-price {
    font-size: 16px; /* Kích thước chữ cho giá tour */
    font-weight: bold; /* In đậm */
    color: #ff5733; /* Màu chữ cho giá tour */
}

/* Thiết lập kiểu cho liên kết xem chi tiết tour */
.tour-link {
    display: inline-block; /* Hiển thị là một khối inline */
    background-color: #007bff; /* Màu nền cho liên kết */
    color: #fff; /* Màu chữ cho liên kết */
    padding: 5px 10px; /* Khoảng cách nội dung và viền cho liên kết */
    border-radius: 5px; /* Bo tròn các cạnh */
    text-decoration: none; /* Loại bỏ gạch chân */
    margin-top: 10px; /* Khoảng cách giữa giá tour và liên kết */
}

/* Thiết lập kiểu cho liên kết xem chi tiết tour khi rê chuột qua */
.tour-link:hover {
    background-color: #0056b3; /* Màu nền khi rê chuột qua */
}
/* Kiểu cho container chứa các nút phân trang */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Kiểu cho từng nút phân trang */
.pagination a {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 4px;
    text-decoration: none;
    color: #333;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

/* Kiểu khi di chuột qua nút phân trang */
.pagination a:hover {
    background-color: #ddd;
}

/* Kiểu cho nút phân trang đang được chọn */
.pagination a.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
.tour-rating {
    background-color: #FFD700; /* Màu nền màu vàng */
    color: #FFFFFF; /* Màu chữ màu trắng */
    font-size: 16px; /* Kích thước font */
    padding: 8px 12px; /* Khoảng cách lề bên trong của khung */
    border-radius: 5px; /* Bo tròn góc của khung */
    display: inline-block; /* Hiển thị là khối nội dung */
    margin-top: 5px; /* Khoảng cách từ phần đánh giá đến các phần khác */
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/SonDongimg.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Tìm kiếm Tour du lịch</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>

<div class="tour-container">
<?php
// Kết nối database
include 'db.php';

// Khai báo số lượng tour hiển thị trên mỗi trang
$toursPerPage = 6;

// Lấy trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán offset để lấy dữ liệu từ database
$offset = ($page - 1) * $toursPerPage;

// Kiểm tra xem form đã được gửi chưa
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $price = $_GET['price'];

    // Thêm điều kiện cho giá tour vào truy vấn SQL
    switch ($price) {
        case 1:
            $price_condition = "AND Gia < 500000";
            break;
        case 2:
            $price_condition = "AND Gia >= 500000 AND Gia < 1000000";
            break;
        case 3:
            $price_condition = "AND Gia >= 1000000 AND Gia < 3000000";
            break;
        case 4:
            $price_condition = "AND Gia >= 3000000 AND Gia < 5000000";
            break;
        case 5:
            $price_condition = "AND Gia > 5000000";
            break;
        default:
            $price_condition = ""; // Không có điều kiện giá
    }

    // Thực hiện truy vấn để lấy danh sách tour phù hợp với điều kiện tìm kiếm
    $sql_search = "SELECT ID_Tour, HinhAnh, TenTour, Gia, NgayDi, NgayVe, GioTapTrung FROM tours WHERE DiaDiemXuatPhat='$from' AND DiaDiemToi='$to' AND NgayDi='$date' $price_condition LIMIT $offset, $toursPerPage";
    $result_search = $connect->query($sql_search);

    // Kiểm tra xem có tour nào được tìm thấy không
    if ($result_search->num_rows > 0) {
        // Hiển thị các tour tìm thấy
		// Thêm vào vòng lặp while để lấy số sao trung bình cho mỗi tour
		while ($row = $result_search->fetch_assoc()) {
			echo '<div class="tour-item">';
			// Hiển thị hình ảnh, tên tour và giá
			echo '<img src="/BayWithVaa/img/' . $row['HinhAnh'] . '" alt="' . $row['TenTour'] . '" class="tour-thumbnail">';
			// Hiển thị số ngày
			echo '<p style="margin-top: 5px;"><i class="fas fa-calendar-alt" style="margin-right: 10px;"></i>Ngày đi: ' . date('d-m-Y', strtotime($row['NgayDi'])) . ' - ' . tinhSoNgay($row['NgayDi'], $row['NgayVe']) . ' Ngày' . ' - Giờ đi: ' .$row['GioTapTrung']. '</p>';
			echo '<div class="tour-details">';
			echo '<h3 class="tour-title"><i class="fas fa-map" style="margin-right: 10px;"></i>' . $row['TenTour'] . '</h3>';
			echo '<p class="tour-price"><i class="fas fa-money-bill" style="margin-right: 10px;"></i>' . number_format($row['Gia']) . ' VND</p>';

			// Tính số sao trung bình
			$tour_id = $row['ID_Tour'];
			// Tính số sao trung bình từ bảng phanhoi cho mỗi tour
			$sql_average_rating = "SELECT AVG(Sao) AS average_rating FROM phanhoi WHERE ID_Tour='$tour_id'";
			$result_average_rating = $connect->query($sql_average_rating);
			$row_average_rating = $result_average_rating->fetch_assoc();
			$average_rating = $row_average_rating['average_rating'];

			// Hiển thị số sao trung bình hoặc 0 nếu chưa có đánh giá
			if ($average_rating) {
				echo '<p class="tour-rating">Đánh giá: ' . number_format($average_rating, 1) . ' <i class="fas fa-star"></i></p>';
			} else {
				echo '<p class="tour-rating">Chưa có đánh giá</p>';
			}

			// Tạo liên kết để xem chi tiết tour
			echo '<a href="destinationDetails.php?id=' . $row['ID_Tour'] . '" class="tour-link" target="_blank">Xem chi tiết</a>';
			echo '</div>';
			echo '</div>';
		}

        // Tạo các liên kết phân trang
        // Đếm tổng số lượng tour
        $sql_count = "SELECT COUNT(*) AS total FROM tours WHERE DiaDiemXuatPhat='$from' AND DiaDiemToi='$to' AND NgayDi='$date' $price_condition";
        $result_count = $connect->query($sql_count);
        $row_count = $result_count->fetch_assoc();
        $totalTours = $row_count['total'];

        // Tính số trang
        $totalPages = ceil($totalTours / $toursPerPage);

        // Hiển thị các liên kết phân trang
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?from=' . $from . '&to=' . $to . '&date=' . $date . '&price=' . $price . '&page=' . $i . '">' . $i . '</a>';
        }
    } else {
        echo "Không tìm thấy tour phù hợp.";
    }
}

// Hàm tính số ngày từ Ngày Đi đến Ngày Về
function tinhSoNgay($ngayDi, $ngayVe) {
    $soNgay = (strtotime($ngayVe) - strtotime($ngayDi)) / (60 * 60 * 24); // Chuyển sang đơn vị ngày
    return $soNgay;
}
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

