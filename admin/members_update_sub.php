<?php
include 'includes/session.php';
	
if (isset($_POST['btnsubmit'])) {	

		$memid = mysqli_real_escape_string($conn, $_POST['memid']);
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$age=$_POST['age'];
		$address=$_POST['address'];
		$phonenumber=$_POST['phonenumber'];
		$email=$_POST['email'];
		$role= $_POST['role'];
		$position= $_POST['position'];
		
		$sql = "UPDATE tbladmin
		SET firstname ='$firstname', 
		lastname ='$lastname', 
		age ='$age', 
		address ='$address', 
		phonenumber ='$phonenumber', 
		email ='$email',
		role ='$role',
		position ='$position'
		WHERE id = '$memid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Officer information updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select case to edit first';
	}
	header('location:members_update.php?update='.$memid.'','_self');
	?>	