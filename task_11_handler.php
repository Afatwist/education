<?php
if (session_status() != 2) session_start();
$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
function getByEmail($pdo, $table, $email)
{
	$sql = "SELECT * FROM $table WHERE email=:email LIMIT 1";
	$statement = $pdo->prepare($sql);
	$statement->bindParam('email', $email);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	return $result;
}

function store($pdo, $table, $data)
{
	$sql = "INSERT INTO $table (email, password) VALUE (:email, :password)";
	$statement = $pdo->prepare($sql);
	$statement->execute($data);
	$result = $statement->errorInfo();
	if($result[0]=='00000') return true;
	return false;
}

function errorMaker($desc)
{
	$_SESSION['error'] = $desc;
	header('location: /task_11.php');
	exit;
}

$data = [
	'email' => $_POST['email'],
	'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
];


$result = getByEmail($pdo, 'users', $data['email']);
if (is_array($result)) errorMaker('email already use');

if (store($pdo, 'users', $data)) errorMaker('complete');

errorMaker('not registration');
