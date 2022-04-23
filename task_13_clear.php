<?php
if (session_status() != 2) session_start();

unset($_SESSION['buttonCount']);

header('location: /task_13.php');
exit;
