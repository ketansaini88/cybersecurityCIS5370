<?php

session_start();

if (!$_SESSION['USERNAME'] || !$_SESSION['ROLE']){
	header ("Location: login.php");
	exit;
}
?>