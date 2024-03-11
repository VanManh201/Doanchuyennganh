<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chọn Chuyến Bay</title>
<style>
  /* CSS để ẩn form nhập thông tin khách hàng ban đầu */
  #customerInfo {
    display: none;
  }
</style>
</head>
<body>

<!-- Danh sách các chuyến bay -->
<div id="flightButtons">
  <button class="flightButton">Chuyến bay 1</button>
  <button class="flightButton">Chuyến bay 2</button>
  <button class="flightButton">Chuyến bay 3</button>
</div>
<div>
<select id="genderSelect">
  <option value="male">Nam</option>
  <option value="female">Nữ</option>
</select>
</div>

<!-- Thông tin chuyến bay và form nhập thông tin khách hàng -->
<div id="flightInfo">
  <!-- Thông tin chuyến bay sẽ được hiển thị ở đây -->
</div>

<div id="customerInfo">
  <!-- Form nhập thông tin khách hàng sẽ được hiển thị ở đây -->
  <h2>Nhập thông tin khách hàng:</h2>
  <form action="process.php" method="post">
    <label for="name">Tên:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Gửi">
  </form>
  <!-- Nút Quay lại -->
  <button id="backButton">Quay lại</button>
</div>

<script>
// Lắng nghe sự kiện khi người dùng chọn chuyến bay
document.querySelectorAll('.flightButton').forEach(function(button) {
  button.addEventListener('click', function() {
    // Lấy thông tin chuyến bay từ nút đã được nhấn
    var flight = this.textContent;
    // Hiển thị thông tin chuyến bay và form nhập thông tin khách hàng
    showFlightInfo(flight);
  });
});

// Hàm hiển thị thông tin chuyến bay và form nhập thông tin khách hàng
function showFlightInfo(flight) {
  document.getElementById('flightInfo').innerHTML = 'Thông tin chuyến bay ' + flight;
  document.getElementById('customerInfo').style.display = 'block';
}

// Lắng nghe sự kiện khi người dùng nhấn nút Quay lại
document.getElementById('backButton').addEventListener('click', function() {
  // Ẩn form nhập thông tin khách hàng
  document.getElementById('customerInfo').style.display = 'none';
});
</script>

</body>
</html>
