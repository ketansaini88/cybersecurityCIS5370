<?php

session_start();

if (!$_SESSION['USERNAME'] || !strlen($_SESSION['USERNAME']) || !$_SESSION['ROLE'] || !strlen($_SESSION['ROLE'])){
	header ("Location: login.php");
	exit;
}
?>