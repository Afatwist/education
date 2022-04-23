<?php
if(session_status()!=2) session_start();
unset($_SESSION['user']);

header('location: /task_14_1.php');
exit;