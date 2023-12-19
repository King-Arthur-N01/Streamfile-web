<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'streamingdb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="../asset/css/style.css" rel="stylesheet" type="text/css">
		<!-- <link href="admin/allmin.css" rel="stylesheet" type="text/css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>StreamFile.com</h1>
				<a href="home.php"><i class="fa-solid fa-arrow-left"></i>Back</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
		</div>
		<div class= "profile" box-shadow= "0 0 5px 0 rgba(0, 0, 0, 0.1)" margin= "25px 0" padding= "25px" background-color= "#fff">
			<p>Your account details are below:</p>
			<table>
				<tr>
                    <td>Username:</td>
					<td><?=$_SESSION['name']?></td>
				</tr>
				<tr>
                    <td>Password:</td>
					<td><?=$password?>  "MD5 Encryption"</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?=$email?></td>
				</tr>
			</table>
		</div>
	</body>
</html>