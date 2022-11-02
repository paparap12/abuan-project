<?php
	
	include 'includes/session.php';

	if(isset($_GET['confpending'])){
		$sql = "UPDATE tblcomplain SET cstatus='Pending' WHERE caseid=".$_GET['confpending'];
		if($conn->query($sql)){
			$_SESSION['success'] = 'Successfully Updated!';
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: complaint.php');
?>