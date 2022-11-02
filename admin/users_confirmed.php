<?php
	
	include 'includes/session.php';

	if(isset($_GET['confirmed'])){
		$sql = "UPDATE tblcomplain SET cstatus='Confirmed' WHERE caseid=".$_GET['confirmed'];
		if($conn->query($sql)){
			$_SESSION['success'] = 'Successfully Confirmed!';
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: users.php');
?>