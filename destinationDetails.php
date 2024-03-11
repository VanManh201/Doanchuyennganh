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
<html><head>
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
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
	<link rel="stylesheet" href="css/style3.css">
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
.comment-container {
    border: 1px solid #ccc;
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
}

.comment-container h2 {
    margin-bottom: 15px;
    color: #333;
}

.comment-container form {
    margin-top: 10px;
}

.comment-container form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.comment-container form select,
.comment-container form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.comment-container form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 3px;
}

.comment-container form input[type="submit"]:hover {
    background-color: #0056b3;
}

.comment-container p {
    margin-top: 10px;
}
.comment-list {
    margin-top: 20px;
}

.comment-container {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-top: 20px;
}

.comment-container h3 {
    margin-bottom: 10px;
}

.comment-list {
    margin-top: 10px;
}

.comment {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}

.comment p {
    margin: 5px 0;
}

.comment p strong {
    font-weight: bold;
}

.comment:last-child {
    border-bottom: none;
}

.comment-list p {
    margin-top: 10px;
    text-align: left;
}
/* Style for guide-info-container */
.guide-info-container {
    width: 50%;
    float: right;
    padding: 20px;
    box-sizing: border-box;
    background-color: ghostwhite;
    border-radius: 10px;
    margin-top: 20px;
    margin-left: 20px;
    position: relative;
    top: -40px;
    /* Thêm hiệu ứng bóng mờ */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

/* Style for guide-info-container p */
.guide-info-container p {
    margin: 0;
    font-size: 16px;
}

/* Style for guide-info-container p strong */
.guide-info-container p strong {
    margin-right: 10px;
}
.other-tour-rating {
    background-color: #FFD700; /* Màu nền màu vàng */
    color: #FFFFFF; /* Màu chữ màu trắng */
    font-size: 14px; /* Kích thước font */
    padding: 5px 10px; /* Khoảng cách lề bên trong của khung */
    border-radius: 5px; /* Bo tròn góc của khung */
    display: inline-block; /* Hiển thị là khối nội dung */
    margin-top: 5px; /* Khoảng cách từ phần đánh giá đến các phần khác */
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
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/SonDongimg.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Tour du lịch</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
		
<?php
// Kiểm tra xem ID Tour đã được truyền qua URL chưa
if (isset($_GET['id'])) {
    $tour_id = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin chi tiết của tour dựa trên ID
    $sql_tour_details = "SELECT tours.*, huongdanvien.*
                     FROM tours
                     LEFT JOIN huongdanvien ON tours.ID_HuongDanVien = huongdanvien.ID_HuongDanVien
                     WHERE tours.ID_Tour = '$tour_id'";
    $result_tour_details = $connect->query($sql_tour_details);

    if ($result_tour_details->num_rows > 0) {
        // Lặp qua kết quả và hiển thị thông tin chi tiết của tour
        while ($row = $result_tour_details->fetch_assoc()) {
			echo '<h2 style="float: right; color: red; margin-right: 20px;"><strong><i class="fas fa-money-bill" style="margin-right: 10px;"></i>Giá:</strong> ' . number_format($row['Gia'], 0, ',', '.') . ' VND/ Người</h2>';
			echo '<h1 style="margin-left: 30px;">' . $row['TenTour'] . '</h1>';
            echo '<div class="tour-details-container">'; // Khung chứa toàn bộ thông tin tour

            echo '<div class="tour-image-container">'; // Khung chứa hình ảnh
            // Hiển thị hình ảnh của tour trong một khung màu trắng
			echo '<div class="image-frame" style="border-radius: 10px;">';
			echo '<img src="/BayWithVaa/img/' . $row['HinhAnh'] . '" alt="' . $row['TenTour'] . '" class="tour-image">';
			// Hiển thị danh sách ảnh chi tiết
			echo '<div class="additional-images">';
			$sql_tour_images = "SELECT Images FROM tours_images WHERE ID_Tour = '$tour_id'";
			$result_tour_images = $connect->query($sql_tour_images);

			if ($result_tour_images->num_rows > 0) {
				while ($row_image = $result_tour_images->fetch_assoc()) {
					echo '<img src="/BayWithVaa/img/' . $row_image['Images'] . '" alt="Additional Image" class="additional-image">';
				}
			}
    		echo '</div>';
			echo '</div>';
            echo '</div>'; // Đóng div của hình ảnh

            echo '<div class="tour-info-container">'; // Khung chứa thông tin và mô tả
            echo '<div class="tour-info-right">'; // Khung chứa thông tin khác về tour, nằm bên phải hình
            // Hiển thị các thông tin khác về tour
			echo '<div class="info-columns">';
				echo '<h3 style="margin-left: 10px;">' . $row['TenTour'] . '</h3>';
			echo '<div class="left-column">';
				echo '<p><strong><i class="fas fa-arrow-left" style="margin-right: 10px;"></i>Điểm xuất phát:</strong> ' . $row['DiaDiemXuatPhat'] . '</p>';
				echo '<p><strong><i class="fas fa-arrow-right" style="margin-right: 10px;"></i>Điểm đến:</strong> ' . $row['DiaDiemToi'] . '</p>';
				echo '<p><strong><i class="far fa-calendar-alt" style="margin-right: 10px;"></i>Ngày khởi hành:</strong> ' . date('d-m-Y', strtotime($row['NgayDi'])) . '</p>';
			echo '</div>';
			echo '<div class="right-column">';
				echo '<p><strong><i class="fas fa-clock" style="margin-right: 10px;"></i>Giờ tập trung:</strong> ' . $row['GioTapTrung'] . '</p>';
				echo '<p><strong><i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i>Nơi tập trung:</strong> ' . $row['NoiTapTrung'] . '</p>';
				echo '<p><strong><i class="fas fa-ticket-alt" style="margin-right: 10px;"></i></i>Số vé:</strong> ' . $row['SoVe'] . '</p>';
			echo '</div>';
			echo '</div>';
            echo '</div>'; // Đóng div của thông tin
			
			echo '<div class="tour-info-left">';
			echo '<h4>Thông tin chuyến đi</h4>';
			echo '<div class="travel-info-container">';
			// Hiển thị thông tin chuyến đi
			echo '<div class="left-info">';
				echo '<p><strong><i class="fas fa-car" style="margin-right: 10px;"></i>Phương tiện di chuyển:</strong> ' . $row['PhuongTienDiChuyen'] . '</p>';
				echo '<p><strong><i class="fas fa-map-marked-alt" style="margin-right: 10px;"></i>Địa điểm tham quan:</strong> ' . $row['DiaDiemThamQuan'] . '</p>';
			echo '</div>';
			echo '<div class="right-info">';
				echo '<p><strong><i class="fas fa-hotel" style="margin-right: 10px;"></i>Khách sạn:</strong> ' . $row['KhachSan'] . '</p>';
				echo '<p><strong><i class="fas fa-utensils" style="margin-right: 10px;"></i></i>Ẩm thực:</strong> ' . $row['AmThuc'] . '</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>'; // Đóng div mới
			
			echo '<div class="additional-info-container">';
			echo '<div class="additional-content">'; // Mở div mới cho nội dung bổ sung
				echo '<h4>Hướng dẫn viên</h4>';
				echo '<p><strong><i class="fas fa-user" style="margin-right: 10px;"></i></i>HDV dẫn đoàn:</strong> ' . $row['TenHuongDanVien'] . '</p>';
				echo '<p><strong><i class="fas fa-phone-alt" style="margin-right: 10px;"></i></i>Số điện thoại HDV:</strong> ' . $row['SoDienThoai'] . '</p>';
				echo '<p><strong><i class="fas fa-envelope" style="margin-right: 10px;"></i></i>Email:</strong> ' . $row['Email'] . '</p>';
			echo '</div>';
            
			echo '<div class="guide-info-container">'; // Mở div mới chứa thông tin về hướng dẫn viên
			echo '<h4>Thông tin giá</h4>';
			// Hiển thị thông tin giá và vé trẻ em, em bé
			echo '<p><strong><i class="fas fa-male" style="margin-right: 10px;"></i>Giá:</strong>' . number_format($row['Gia'], 0, ',', '.') . ' VND/ Người</p>';
			echo '<p><strong><i class="fas fa-child" style="margin-right: 10px;"></i>Giá trẻ em:</strong>' . number_format($row['GiaTreEm'], 0, ',', '.') . ' VND/ Trẻ em</p>';
			echo '<p><strong><i class="fas fa-baby" style="margin-right: 10px;"></i>Giá em bé:</strong>' . number_format($row['GiaEmBe'], 0, ',', '.') . ' VND/ Em bé</p>';
			echo '</div>'; // Đóng div của thông tin về giá và vé trẻ em, em bé
			
			// Thêm nút đặt vé và liên hệ
			echo '<div class="contact-buttons">';
			echo '<button type="button" onclick="bookTicket(' . $tour_id . ')" style="background-color: red; margin-bottom: 20px; font-size: 30px;"><i class="fas fa-shopping-cart" style="margin-right: 10px;"></i>Đặt ngay</button>';
			echo '<a href="contract.php" onclick="contactNow()" class="contact-button" target="_blank"><i class="fas fa-phone-volume" style="margin-right: 10px; font-size: 30px;"></i>Liên hệ ngay</a>';
			echo '</div>';
			echo '</div>';
			
			echo '</div>'; // Đóng div của mô tả
            echo '</div>'; // Đóng div của toàn bộ thông tin tour
			
			echo '<div class="description-frame">'; // Khung trắng chứa mô tả
			echo '<h3 style="color: red; cursor: pointer;" onclick="toggleNoiDung()">Địa điểm</h3>';
			echo '<div id="noidung" class="tour-description" style="display: none;">' . $row['NoiDung'] . '</div>';
			echo '</div>';
			
			echo '<div class="description-frame">'; // Khung trắng chứa mô tả
			echo '<h3 style="color: red; cursor: pointer;" onclick="toggleMoTa()">Lịch Trình</h3>';
			echo '<div id="mota" class="tour-description" style="display: none;">' . $row['MoTa'] . '</div>';
			echo '</div>';

			
        }
    } else {
        echo "Không tìm thấy thông tin tour.";
    }
} else {
    echo "Không có ID tour được cung cấp.";
}
		
// Hiển thị danh sách 4 tour khác ngẫu nhiên
$sql_other_tours = "SELECT * FROM tours WHERE ID_Tour <> '$tour_id' ORDER BY RAND() LIMIT 4";
$result_other_tours = $connect->query($sql_other_tours);

if ($result_other_tours->num_rows > 0) {
    echo '<hr>'; // Dấu gạch ngang
	echo '<h2 style="text-align: center;">Có thể bạn sẽ thích</h2>';
    echo '<div class="other-tours-container">'; // Khung chứa danh sách các tour khác
	while ($row_other = $result_other_tours->fetch_assoc()) {
		// Hiển thị thông tin của các tour khác
		echo '<div class="other-tour">';
		echo '<h3>' . $row_other['TenTour'] . '</h3>';
		// Hiển thị hình ảnh của tour
		echo '<img src="/BayWithVaa/img/' . $row_other['HinhAnh'] . '" alt="' . $row_other['TenTour'] . '">';

		// Tính số sao trung bình
		$other_tour_id = $row_other['ID_Tour'];
		// Tính số sao trung bình từ bảng phanhoi cho mỗi tour
		$sql_other_average_rating = "SELECT AVG(Sao) AS average_rating FROM phanhoi WHERE ID_Tour='$other_tour_id'";
		$result_other_average_rating = $connect->query($sql_other_average_rating);
		$row_other_average_rating = $result_other_average_rating->fetch_assoc();
		$other_average_rating = $row_other_average_rating['average_rating'];

		// Hiển thị số sao trung bình hoặc thông báo nếu không có đánh giá
		if ($other_average_rating) {
			echo '<p class="other-tour-rating">Đánh giá: ' . number_format($other_average_rating, 1) . ' <i class="fas fa-star"></i></p>';
		} else {
			echo '<p class="other-tour-rating">Chưa có đánh giá</p>';
		}

		// Hiển thị giá cả của tour
		echo '<p style="color: red;"><strong>Giá:</strong> ' . number_format($row_other['Gia'], 0, ',', '.') . ' VND</p>';
		// Thêm liên kết đến trang destinationDetails.php với ID của tour
		echo '<a href="destinationDetails.php?id=' . $row_other['ID_Tour'] . '" target="_blank">Xem chi tiết</a>';
		echo '</div>';
	}

    echo '</div>'; // Đóng div của danh sách các tour khác
}

	echo '<hr>';
		
echo '<div class="comment-container">';
echo '<h3>Hãy cho chúng tôi biết suy nghĩ của bạn</h3>';

// Kiểm tra xem người dùng đã đăng nhập hay chưa bằng cách kiểm tra session 'email'
if (isset($_SESSION['email'])) {
    // Form bình luận
    echo '<form action="submit_comment.php" method="post">';
    echo '<input type="hidden" name="tour_id" value="' . $_GET['id'] . '">'; // Input trường ẩn lưu ID của tour
    echo '<label for="rating">Nhận xét: </label>';
    echo '<label for="rating"> </label>';
  echo '<select name="rating" id="rating">';
    echo '<option value="1">1 sao</option>';
    echo '<option value="2">2 sao</option>';
    echo '<option value="3">3 sao</option>';
    echo '<option value="4">4 sao</option>';
    echo '<option value="5">5 sao</option>';
    echo '</select>';
    echo '<textarea name="comment" id="comment" rows="4" placeholder="Viết bình luận của bạn..."></textarea>';
    echo '<input type="submit" value="Gửi">';
    echo '</form>';
} else {
    // Nếu người dùng chưa đăng nhập, hiển thị nút đăng nhập và chuyển hướng sang trang đăng nhập
    $current_url = $_SERVER['REQUEST_URI'];
    echo '<p>Vui lòng <a href="login.php?redirect=' . urlencode($current_url) . '">đăng nhập</a> để bình luận.</p>';
}

echo '</div>'; // Đóng div của khung bình luận

?>
<div class="comment-container">
    <h3>Đánh giá</h3>

    <div class="comment-list">
        <?php
        $query_comments = "SELECT phanhoi.*, user.email 
                           FROM phanhoi 
                           INNER JOIN user ON phanhoi.ID_User = user.ID_User 
                           WHERE phanhoi.ID_Tour = '$tour_id' AND phanhoi.AnHien = 1";

        $result_comments = $connect->query($query_comments);

        if ($result_comments->num_rows > 0) {
            while ($comment = $result_comments->fetch_assoc()) {
                echo '<div class="comment">';
                echo '<p><strong><i class="fas fa-user" style="margin-right: 10px;"></i></strong> ' . $comment['email'] . ' - '. date('d-m-Y', strtotime($comment['NgayPhanHoi'])) . ' - '. $comment['Sao'] . '<i class="fas fa-star"></i>'. '</p>';
                echo '<p><strong>Nội dung:</strong> ' . $comment['NoiDung'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Chưa có bình luận nào cho tour này.</p>';
        }
        ?>
    </div> <!-- Đóng div của danh sách bình luận -->
</div> <!-- Đóng div của comment-container -->

		
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
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các ảnh phụ
        var additionalImages = document.querySelectorAll('.additional-image');

        // Lặp qua từng ảnh và thêm sự kiện nhấp vào
        additionalImages.forEach(function(image) {
            image.addEventListener('click', function() {
                // Lấy đường dẫn của ảnh được nhấp vào
                var imagePath = this.getAttribute('src');

                // Thay đổi đường dẫn của hình ảnh chính
                var mainImage = document.querySelector('.tour-image');
                mainImage.setAttribute('src', imagePath);
            });
        });
    });
</script>
<script>
    function toggleMoTa() {
        var mota = document.getElementById('mota');
        if (mota.style.display === "none") {
            mota.style.display = "block";
        } else {
            mota.style.display = "none";
        }
    }

    function toggleNoiDung() {
        var noidung = document.getElementById('noidung');
        if (noidung.style.display === "none") {
            noidung.style.display = "block";
        } else {
            noidung.style.display = "none";
        }
    }
</script>
<script>
function bookTicket(tourId) {
    // Chuyển hướng đến trang CustomerTour và truyền thông tin tour qua URL
    window.location.href = "CartTour.php?id=" + tourId;
}
		
</script>
<script>
function bookTicket(tourId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save-tour-id.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Đặt vé thành công, chuyển hướng đến trang CartTour.php
                window.location.href = "CartTour.php";
            } else {
                // Xử lý lỗi nếu có
                alert("Đã xảy ra lỗi khi đặt vé.");
            }
        }
    };
    xhr.send("tour_id=" + tourId);
}		
</script>

	</body>
</html>

