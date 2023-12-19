<?php
if(isset($_GET['pesan'])){
	if($_GET['pesan']=="gagal"){
		echo "Login gagal! silahkan login kembali.";
		header("Refresh:1; url=index.php");
	}elseif($_GET['pesan']=="belum_login"){
		echo "Silahkan login dulu";
		header("Refresh:1; url=index.php");
	}elseif($_GET['pesan']=="logout"){
		echo "Anda berhasil logout";
		header("Refresh:1; url=index.php");
	}
}
?>
<!DOCTYPE html>
<link href="admin/style.css" rel="stylesheet" type="text/css">
<!-- <link href="admin/allmin.css" rel="stylesheet" type="text/css"> -->
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
					<label for="password">
						<i class="fas fa-lock"></i>
					</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>