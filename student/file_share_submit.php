<?php
	include 'includes/session.php';
	if(isset($_POST['btnshare'])){
		
		$FROM_USERID =$_POST['FROM_USERID'];
		$FILE_SHAREID =$_POST['FILE_SHAREID'];
		$TO_USERID =$_POST['TO_USERID'];

		$sql="INSERT INTO tblfileshare(FROM_USERID,FILE_SHAREID,TO_USERID)VALUES('$FROM_USERID','$FILE_SHAREID','$TO_USERID')";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'File successfully shared!!';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
		
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: myfiles.php');
?>