<?php
session_start();
$dir = "../upload";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="../asset/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>StreamFile.com</h1>
				<a href="account.php"><i class="null"></i>Account</a>
				<a href="disk.php"><i class="null"></i>Disk</a>
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
					<th>
						<?php
						function getDirectoryFiles($dir) {
							$files = array();
								if (is_dir($dir)) {
									if ($handle = opendir($dir)) {
										while (($file = readdir($handle)) !== false) {
											$files[] = $file;
										}
										closedir($handle);
									}
								}
							return $files;
						}
						function printDirectoryFiles($dir) {
							$files = getDirectoryFiles($dir);
								foreach ($files as $file) {
									if ($file != '.' && $file != '..') {
										print '» <a href="stream.php?dir=' . $dir . '&file=' . $file . '" target="_blank">' . ucwords($file) . '</a><br/>';
									}
								}
							}
						printDirectoryFiles($dir);
						?>
					</th>
				</thead>
			</table>
		</div>
	</body>
</html>