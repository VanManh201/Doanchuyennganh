<?php
	include ('db.php');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fc657d6448.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Travel</title>
</head>
<body>
 <header>
    <div class="header-top">
        <i class="fas fa-bars"></i>
        <ul>
		<?php echo $menu_content; ?>   
        </ul>
    </div>
    <div class="video-container">
        <video src="video/saigon_-_15952 (540p).mp4" autoplay muted loop></video>
    </div>
<div class="header-content">
    <h1>Khám phá</h1>
    <h3>Xách ba lô lên và đi thôi nào</h3>
    <form action="tour.php" method="get" target="_blank">
        <h1>Bạn muốn đi đâu</h1>
        <p>Điểm đi</p>
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
        <p>Điểm đến</p>
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
        <p>Ngày đi</p>
        <input type="date" id="date" name="date">
        <p>Giá tour</p>
        <select id="price" name="price">
				<option value="1">Dưới 500.000</option>
				<option value="2">Từ 500.000 đến 1 triệu</option>
				<option value="3">Từ 1 triệu đến 3 triệu</option>
				<option value="4">Từ 3 triệu đến 5 triệu</option>
				<option value="5">5 triệu trở lên</option>
	    </select>
        <button>Tìm kiếm</button>
    </form>
</div>
 </header>    
<!---------------------------NICE PLACE------------------------->
<section class="nice-place">
    <div class="container">
        <h1 class="h1-style">Địa điểm nổi bật</h1>
        <div class="nice-place-content row">
            <div class="nice-place-item">
                <div class="nice-place-img">
                    <img src="image/np2.jpg" alt="">
            </div>
            <div class="nice-place-text">
                <h2>Tour Tây Bắc</h2>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <p>Hà Nội là thủ đô và là một trong hai đô thị loại đặc biệt của nước Cộng hòa xã hội chủ nghĩa Việt Nam.</p>
                <button class="btn">Mua tour</button>
            </div>
        </div>
        <div class="nice-place-item">
                <div class="nice-place-img">
                    <img src="image/np1.jpg" alt="">
                </div>
            <div class="nice-place-text">
                <h2>Tour Hồ Chí Minh</h2>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <p>Hà Nội là thủ đô và là một trong hai đô thị loại đặc biệt của nước Cộng hòa xã hội chủ nghĩa Việt Nam.</p>
                <button class="btn">Mua tour</button>
            </div>
        </div> 
        <div class="nice-place-item">
                <div class="nice-place-img">
                    <img src="image/np3.jpg" alt="">
                </div>
            <div class="nice-place-text">
                <h2>Tour Hà Nội</h2>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <p>Hà Nội là thủ đô và là một trong hai đô thị loại đặc biệt của nước Cộng hòa xã hội chủ nghĩa Việt Nam.</p>
                <button class="btn">Mua tour</button>
            </div>
        </div>    
    </div>
</div>
</section>
<!-----------------------About ---------------------->
<section class="about">
    <div class="container">
        <h1 class="h1-style">About us</h1>
        <div class="about-content row">
            <div class="about-content-left">
                <img src="image/aboutus.avif" alt="">
            </div>
            <div class="about-content-right">
                <h2>Tại sao lại chọn chúng tôi?</h2>
                <p>Chúng tôi là công ty hàng đầu về cung cấp dịch vụ chuyến đi cả trong và ngoài nước</p>
                <button class="btn">Tìm hiểu thêm</button>
            </div>
        </div>
    </div>
</section>
<!-----------------------Sign up-------------------->
<section class="signup">
    <h1 class="h1-style">Đăng kí</h1>
    <div class="signup-content">
        <input type="text" placeholder="Nhập Email của bạn">
        <button class="btn">Gửi</button>
    </div>
</section>

<!-----------------------Contact-------------------->
<section class="contact">
	<form method="post" action="xuly-contract.php" id="myform">
    <div class="container">
        <h1 class="h1-style">Liên hệ</h1>
        <div class="contact-content-top row">
            <div class="contact-content-item">
                <input type="text" id="name" placeholder="Nhập tên của bạn" name="name">
            </div>
            <div class="contact-content-item">
                <input type="email" id="email" placeholder="Nhập Email của bạn" name="email">
            </div>
            <div class="contact-content-item">
                <input type="text" id="subject" placeholder="Nhập số điện thoại của bạn" name="phone">
            </div>
        </div>
        <div class="contact-content-bottom">
           <textarea name="message" id="message" cols="30" rows="10" placeholder="Viết nội dung bạn cần hỗ trợ..." name="message"></textarea>
            <button class="btn" type="submit">Gửi yêu cầu</button>
        </div>
    </div>
	</form>
</section>

<script src="script.js"></script>
</body>
</html>