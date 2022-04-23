<?php
if (session_status() != 2) session_start();

function getOneByEmail($table, $email)
{
	$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
	$sql = "SELECT * FROM $table WHERE email=:email LIMIT 1";
	$statement = $pdo->prepare($sql);
	$statement->bindParam('email', $email);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	return $result;
}

function errorMaker($desc)
{
	$_SESSION['error'] = $desc;
	header('location: /task_14.php');
	exit;
}

$result = getOneByEmail('users', $_POST['email']);

if (!is_array($result)) errorMaker('email not found');

if (!password_verify($_POST['password'], $result['password'])) {
	errorMaker('wrong password');
}

$_SESSION['user'] = $result;

errorMaker('complete');
