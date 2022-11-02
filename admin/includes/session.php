<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM tbladmin WHERE id = '".$_SESSION['userid']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	
?>