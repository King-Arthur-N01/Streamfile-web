<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'streamingdb';
$path = "D:/";
$get_tgl = date('l d-m-Y H:i:s');
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_errno()){
	exit('Failed to connect to MySQL: '.mysqli_connect_error());
}
if(!isset($_POST['username'], $_POST['password'])){
	exit('Please fill both the username and password fields!');
}
if($stmt = $con->prepare("SELECT id, password FROM accounts WHERE username = ?")){
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id,$password);
		$stmt->fetch();
		if (md5($_POST['password']) === $password){
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
			header('Location: admin/home.php');
			echo 'Welcome ' . $_SESSION['name'] . '!';
		}else{
			header("location:index.php?pesan=gagal");
		}
	}else{
		header("location:index.php?pesan=gagal");
	}
	$stmt->close();
}
?>
