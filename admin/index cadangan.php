<?php
session_start();
// include "main.php";
$dir = "../asset";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<!-- <button type="submit" onClick="refreshPage()"> StreamFile.com </button> -->
				<h1>StreamFile.com</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
		<div class="content_stream1">
			<table class="table">
				<thead> 
					<th>Name File</th>
					<th>DateCreate</th>
					<th>File Type</th>
					<th>Size</th>
				</thead>
			</table>
		</div>
		<div class="content_stream1">
			<table class="table">
				<thead>
					<th><?php
						if (is_dir($dir)){
							if ($x = opendir($dir) or die ('Folder tidak ditemukan!')){
								while (($file = readdir($x)) !== false){
									print '» <a href=stream.html"'.$dir.' "target="_blank">'.ucwords($file).'</a><br/>';
								}
							closedir($x);
							}
						}
					?>
					</th>
				</thead>
			</table>
		</div>
	</body>
</html>