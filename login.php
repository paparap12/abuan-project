<?php
	session_start();
	include 'conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM tbladmin WHERE username = '$username' AND password='$password'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account in the databatase! ';
		}
		else{
			$row = $query->fetch_assoc();
			$_SESSION['userid'] = $row['id'];
			if($row['role'] == "ddmin")
				{	$_SESSION['userid'] = $row['id'];
					header('location: admin/dashboard.php');
				}
				else if($row['role'] == "Member")
				{	
					header("location:appclient/viewBill.php");
				}
				else
				{
					$_SESSION['error'] = 'Your account maybe not approved';
					
			  }

			
		}
		
	}
	else{
		$_SESSION['error'] = 'Incorrect username or password!';
	}

	header('location: index.php');

?>