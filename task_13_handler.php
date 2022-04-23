<?php
if (session_status() != 2) session_start();

$_SESSION['buttonCount'] = $_SESSION['buttonCount'] + 1;

header('location: /task_13.php');
exit;
