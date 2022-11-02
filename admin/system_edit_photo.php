<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$empid = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE tblsettings SET sys_logo = '$filename' WHERE tblsettings.id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'System logo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select System name to update photo first';
	}

	header('location: system.php');
?>