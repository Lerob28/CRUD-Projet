<?php 
	session_start();
	$_SESSION['USER']='';
	$_SESSION['USE']='';
	session_destroy();
	header('location: ../index.php');
?>