<?php
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/login.css">
  <title>BayWithVAA</title>
</head>
<body>
    
    <section> 
        <div class="wrapper">
            <div class="form-box login">
				<form action="xulydangnhap.php" method="post">
					<h2>Login</h2>
					<div class="input-box">
						<ion-icon name="mail-outline"></ion-icon>
						<input type="email" name="email" required id="email">
						<label for="">Email</label>
					</div>
					<div class="input-box">
						<ion-icon name="lock-closed-outline"></ion-icon>
						<input type="password" name="loginpassword" required id="loginpassword">
						<label for="">Password</label>
					</div>
					<div class="forget">
						<label for=""><input type="checkbox" name="remember">Remember Me  <a href="#">Forget Password</a></label>
					</div>
					<button type="submit" name="submit" value="submit">Đăng nhập</button>
					<div class="login-register">
						<p>Don't have an account? <a href="#" class="register-link">Register</a></p>
					</div>
				</form>
            </div>
      
            <div class="form-box register">
                <form action="xulydangky.php" method="post">
                    <h2>Registration</h2>
                    <div class="input-box">
						<ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="SoDienThoai" required>
                        <label for="">Số điện thoại</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password"required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">I agree to the terms & conditions</label>
                      
                    </div>
                    <button>Register <a href="http://localhost/WEBNT/manh/"></a></button>
                    <div class="login-register"><p>Already have an account! <a href="#" class="login-link">Login</a></p>
                </div>
                    
                </form>
            </div>
        
            
            </div>
    </section>
    <script src="js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</body>
</html>