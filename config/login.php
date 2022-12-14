<?php 
    session_start();
	if(!empty($_SESSION['id'])){
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { 
			window.location.href = "/thehelpdesk/dashboard/";';
		echo '}, 1 );</script>';
	}
	else{
    include_once('functions.php'); 
    
    $userdata = new DB_con();

    if (isset($_POST['login'])) {
        $uname = $_POST['username'];
        $password = md5($_POST['password']);

        $result = $userdata->signin($uname, $password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['fullname'];
            $_SESSION['role_id'] = $num['role_id'];
			$_SESSION['token_id'] = $num['token_id'];
			$_SESSION['uploadpic'] = $num['uploadpic'];
            //$_SESSION['userscoin'] = $num['userscoin'];
           
            echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal.fire({
				title: "สำเร็จ!",
				text: "เข้าสู่ระบบเรียบร้อย!",
				type: "success",
				showConfirmButton: false,
				icon: "success"
			});';
			echo '}, 500 );</script>';

			echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "/thehelpdesk/dashboard/";';
            echo '}, 3000 );</script>';
        } else {
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal.fire({
				title: "ผิดพลาด!",
				text: "กรุณาลองใหม่!",
				showConfirmButton: false,
				type: "warning",
				icon: "error"
			});';
			echo '}, 500 );</script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>เข้าสู่ระบบ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/thehelpdesk/config/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/thehelpdesk/config/assets/css/main.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
<!--===============================================================================================-->
</head>
<style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p,span {
      font-family: 'Kanit', sans-serif;
    }
  </style>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="/thehelpdesk/config/assets/images/nice443.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
				<center><h4>เข้าสู่ระบบ</h4></center><br><br>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" value="ล็อกอิน" name="login" class="login100-form-btn">
					</div>

					<div class="card mt-3">
					<div class="text-center p-t-10">
						<a class="">
							แจ้งซ่อม<br>
						หอพักสิต Rbac place<br>
							เวลาทำการ 8.00-20.00<br>
						</a><br>
						
					</div>
					</div>
					<div class="text-center p-t-36">
						<a class="txt2" href="/thehelpdesk/config/registor">
							สมัครสมาชิก
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="/thehelpdesk/config/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/thehelpdesk/config/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="/thehelpdesk/config/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/thehelpdesk/config/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/thehelpdesk/config/assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/thehelpdesk/config/assets/js/main.js"></script>

</body>
</html>
<?php } ?>