<?php
if (session_status() != 2) session_start();

function store($table, $imageName)
{
	$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
	$sql = "INSERT INTO $table (image) VALUE (:image)";
	$statement = $pdo->prepare($sql);
	$statement->bindParam('image', $imageName);
	$statement->execute();
	return $statement->errorInfo();
}

// можно ли делать так?
// или обязательно использовать uniqid() ?
// на php.net сказано, что uniqid тоже не дает гарантии 100% уникальности
function renameFile($path, $fileName)
{
	$ext = pathinfo($fileName);
	$ext = $ext['extension'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	do {
		$name = substr(str_shuffle($permitted_chars), 0, 5);
		$name = $name . '.' . $ext;
	} while (file_exists($path . $name));

	return $name;
}

function errorMaker($desc)
{
	$_SESSION['error'] = $desc;
	header('location: /task_15_2.php');
	exit;
}

$path = "img/demo/mygallery/";

$count = count($_FILES['images']['name']);
for ($i = 0; $i < $count; $i++) {

	$test = explode('/', $_FILES['images']['type'][$i]);
	if ($test[0] != 'image') errorMaker('no image');

	$imageName = renameFile($path, $_FILES['images']['name'][$i]);

	if (!move_uploaded_file($_FILES['images']['tmp_name'][$i], $path . $imageName)) {
		errorMaker('cant upload');
	}

	$result = store('images', $imageName);
	if ($result[0] != '00000') errorMaker('database error');
}
errorMaker('complete');
