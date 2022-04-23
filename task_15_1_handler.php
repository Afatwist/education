<?php
function getOne($table, $id)
{
	$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
	$sql = "SELECT * FROM $table WHERE id=:id LIMIT 1";
	$statement = $pdo->prepare($sql);
	$statement->bindParam('id', $id);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	return $result;
}

function delete($table, $id)
{
	$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
	$sql = "DELETE FROM $table WHERE id=:id";
	$statement = $pdo->prepare($sql);
	$statement->bindParam('id', $id);
	$statement->execute();
}

$image = getOne('images', $_GET['id']);

unlink('img/demo/mygallery/' . $image['image']);

delete('images', $_GET['id']);

header('location: /task_15_1.php');
exit;