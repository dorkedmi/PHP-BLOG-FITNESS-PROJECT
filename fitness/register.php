
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="register/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="register/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="register/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="register/css/util.css">
	<link rel="stylesheet" type="text/css" href="register/css/main.css?v=<?=time();?>">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
		<form class="login100-form validate-form" method="post" action="userSignup.php" name="registerForm" enctype="multipart/form-data">
			<div class="login100-more" style="background-image: url('images/signin.jpg');">
			    <p>
<?php  
            
if($login->messages){
    foreach ($login->messages as $message){
        echo "<script>alert('$message')</script>";
    }
}

?>
</p>
			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-25 p-b-50">
				
					<span class="login100-form-title p-b-25">
						Sign Up
					</span>
					
					

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Email</span>
						<input class="input100" id="email" type="text" name="email" required placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Password</span>
						<input class="input100" id="password" type="password" name="password" required placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">First name</span>
						<input class="input100" id="first_name" type="text" name="first_name" required placeholder="First name...">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Last name</span>
						<input class="input100" id="last_name" type="text" name="last_name" required placeholder="Last name...">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Gender</span><br>
						<input type="radio" name="gender" value="male" checked > Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other  
						<span class="focus-input100"></span>
					</div>
					
					   <div class="wrap-input100 validate-input">
						<span class="label-input100">Profile pic</span>
						<input class="input100" type="file" name="profile_picture" required>
						<span class="focus-input100"></span>
				</div>
                    <div class="wrap-input100 validate-input">
						<span class="label-input100">Choose A Plan:</span>
						<input type="radio" name="plan" value=1 checked >starter
						<input type="radio" name="plan" value=2 >basic
						<input type="radio" name="plan" value=3 >pro
						<input type="radio" name="plan" value=4 >unlimited
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="register" value="register">
								Sign Up
							</button>
						</div>

						<a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				
			    </div>
			    </form>
		</div>
		
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

