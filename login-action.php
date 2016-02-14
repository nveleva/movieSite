<?php
session_start();
$_SESSION['islogged'] = false;

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$hashed_password = sha1($password);

include('includes/db-connection.php');

$stmt = $conn  -> prepare('
	SELECT users_email, users_pass FROM users
	WHERE users_email = ? AND users_pass = ?
	');
$stmt -> execute(array($email, $hashed_password));
$result = $stmt -> fetchAll();
if(count($result) > 0){
	$_SESSION['islogged'] = true;
	header('Location: index.php');
	exit();
}else{
	header('Location: login.php?invalidLogin');
	exit();
}