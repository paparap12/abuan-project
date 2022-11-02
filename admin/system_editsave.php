<?php
	include 'includes/session.php';

	if(isset($_POST['bupdate'])){
	$empid = $_POST['id'];
	$sys_name = $_POST['sys_name'];
	$sys_address = $_POST['sys_address'];
	$sys_phonenumber = $_POST['sys_phonenumber'];
	$sys_email = $_POST['sys_email'];


		$sql = "UPDATE tblsettings
		SET sys_name = '$sys_name',  
		sys_address ='$sys_address', 
		sys_phonenumber ='$sys_phonenumber',
		sys_email ='$sys_email'
		WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'System updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select System to edit first';
	}

	header('location: system.php');
?>