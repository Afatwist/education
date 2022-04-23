<?php
if (session_status() != 2) session_start();

$_SESSION['text'] = $_POST['text'];

header('location: /task_12.php');
exit;
