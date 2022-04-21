<?php
if (session_status()!=2) session_start();
$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);

$sqlSelect = "SELECT * FROM task_9 WHERE text=:text LIMIT 1";
$statement = $pdo->prepare($sqlSelect);
$statement->bindParam('text', $_POST['text']);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if (is_array($result)) {	
	$_SESSION['error']['text'] = 'already exists';
	header('location: /task_10.php');
	exit;
}

$sql = "INSERT INTO task_9 (text) VALUE (:text)";
$statement = $pdo->prepare($sql);
$statement->bindParam('text', $_POST['text']);
$statement->execute();
header('location: /task_10.php');
exit;
