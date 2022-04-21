<?php
$pdo = new PDO("mysql:host=localhost; dbname=education", "root", null);
$sql = "INSERT INTO task_9 (text) VALUE (:text)";
$statement = $pdo->prepare($sql);
$statement->bindParam('text', $_POST['text']);
$statement->execute();
