<?php

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmPassword']);
if($password !== $confirmPassword){
	echo 'Password does not match!';
	exit();
}
$hashed_password = sha1($password);

include('includes/db-connection.php');

$stmt = $conn -> prepare("
	INSERT INTO users(users_email, users_pass)
	VALUES(:email, :pass)
	");

$stmt -> bindParam(':email', $email);
$stmt -> bindParam(':pass', $hashed_password);

$result = $stmt -> execute();
if($result){
	header('Location: login.php');
	exit();
}else{
	echo 'Please try again!';
}