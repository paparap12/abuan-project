<?php
	include 'admin/includes/session.php';

	if(isset($_POST['btnrecover'])){
		$userid = $_POST['id'];
		$newpassword = $_POST['newpassword'];
		
		$sql = "UPDATE tbladmin SET password = '$newpassword' WHERE id = '$userid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Password successfully changed!';
			header('location:success.php');
		}
		else{
			$_SESSION['error'] = $conn->error;
			header('location:recover-password.php');
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
		header('location:recover-password.php');
	}
?>