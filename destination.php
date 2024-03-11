<?php
	include ('db.php');
	session_start();
?>
<?php
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email']; // Lấy email từ session
    $menu_content = '<li><a href="home.php">Trang chủ</a></li>
                     <li><a href="destination.php">Địa điểm</a></li>
                     <li class="has-dropdown">
                         <a href="#">Tìm vé máy bay</a>
                         <ul class="dropdown">
                             <li><a href="#">Hà Nội</a></li>
                             <li><a href="#">TP Hồ Chí Minh</a></li>
                             <li><a href="#">Đà Nẵng</a></li>
                             <li><a href="#">Nước ngoài</a></li>
                         </ul>
                     </li>
                     <li><a href="pricing.html">Giá vé</a></li>
                     <li><a href="contract.php">Liên hệ</a></li>
                     <li><a href="logout-main.php">Đăng xuất</a> <span id="email-display">' . $email . '</span></li>';
} else {
    $menu_content = '<li><a href="home.php">Trang chủ</a></li>
                     <li><a href="destination.php">Địa điểm</a></li>
                     <li class="has-dropdown">
                         <a href="#">Tìm vé máy bay</a>
                         <ul class="dropdown">
                             <li><a href="#">Hà Nội</a></li>
                             <li><a href="#">TP Hồ Chí Minh</a></li>
                             <li><a href="#">Đà Nẵng</a></li>
                             <li><a href="#">Nước ngoài</a></li>
                         </ul>
                     </li>
                     <li><a href="pricing.html">Giá vé</a></li>
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
		<style>
	    /* Kiểu cho form container */
    .form-container {
        border: 2px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        background-color: #f9f9f9;
        width: 100%;
        max-width: 800px;
        margin: 0 auto; /* Căn giữa khung */
    }

    /* Kiểu cho ô chọn và input */
    .form-group {
        margin-bottom: 20px;
    }

    /* Kiểu cho nút Tìm vé */
    .btn-search {
        width: 100%;
        padding: 10px 20px;
        background-color: #03BD4D;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    /* Kiểu hover cho nút Tìm vé */
    .btn-search:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 10px;
        }
    }
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
	<div class="gtco-container">
    <div class="row row-p b-md">
        <div class="col-md-12">
            <div class="gtco-widget">
                <h3 style="margin-top: 10px;">Chọn ngay một chuyến đi chơi nào!!!</h3>
                <form action="tour.php" method="POST" class="form-container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from">Nơi đi:</label>
                                 <?php
                                // Truy vấn cơ sở dữ liệu để lấy danh sách nơi đi từ bảng tours
                                $sql_from = "SELECT DISTINCT DiaDiemXuatPhat FROM tours";
                                $result_from = $connect->query($sql_from);

                                if ($result_from->num_rows > 0) {
                                    echo '<select class="form-control" id="from" name="from">';
                                    while ($row_from = $result_from->fetch_assoc()) {
                                        $destination_from = $row_from['DiaDiemXuatPhat'];
                                        echo "<option value='$destination_from'>$destination_from</option>";
                                    }
                                    echo '</select>';
                                } else {
                                    echo '<select class="form-control" id="from" name="from">
                                        <option value="">Không có dữ liệu</option>
                                    </select>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Nơi đến:</label>
                               <?php
                                // Truy vấn cơ sở dữ liệu để lấy danh sách nơi đến từ bảng tours
                                $sql_to = "SELECT DISTINCT DiaDiemToi FROM tours";
                                $result_to = $connect->query($sql_to);

                                if ($result_to->num_rows > 0) {
                                    echo '<select class="form-control" id="to" name="to">';
                                    while ($row_to = $result_to->fetch_assoc()) {
                                        $destination_to = $row_to['DiaDiemToi'];
                                        echo "<option value='$destination_to'>$destination_to</option>";
                                    }
                                    echo '</select>';
                                } else {
                                    echo '<select class="form-control" id="to" name="to">
                                        <option value="">Không có dữ liệu</option>
                                    </select>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Ngày đi:</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-search">Tìm tour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
							<p><span class="btn btn-primary" >Khám phá</span></p>
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
	
	<div class="gtco-container">
		<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Tour nước ngoài</h2>
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
							<p><span class="btn btn-primary" >Khám phá</span></p>
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
			</div>		

			<div class="gtco-container">
		<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Tour giá rẻ</h2>
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
							<p><span class="btn btn-primary" >Khám phá</span></p>
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

