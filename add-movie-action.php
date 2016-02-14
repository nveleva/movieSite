<?php 

$title = trim($_POST['title']);
$type = trim($_POST['type']);
$description = trim($_POST['description']);
if(strlen($title) < 1 || strlen($type) < 1 || strlen($description) < 1 || strlen($_FILES['img']['name']) < 1 ){
	header('Location: add-movie.php?emptyFields');
	exit();
}

$imgName = $_FILES['img']['name'];
$imgPath = $_FILES['img']['tmp_name'];
$newPath = 'uploads'.DIRECTORY_SEPARATOR.$imgName;
move_uploaded_file($imgPath, $newPath);

include('includes/db-connection.php');

$stmt = $conn -> prepare("
	INSERT INTO movies(title, type, description, img_url)
	VALUES(:title, :type, :description, :url)
	");


$stmt -> bindParam(':title', $title);
$stmt -> bindParam(':type', $type);
$stmt -> bindParam(':description', $description);
$stmt -> bindParam(':url', $newPath);

$result = $stmt -> execute();
var_dump($result);


if($result){
	header('Location: index.php?saveMovie=true');
	exit();
}else{
	header('Location: index.php?saveMovie=false');
	exit();
}