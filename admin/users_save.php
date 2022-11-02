<?php
	include 'includes/session.php';
	if(isset($_POST['btnsubmit'])){			
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$age=$_POST['age'];
		$address=$_POST['address'];
		$phonenumber=$_POST['phonenumber'];
		$email=$_POST['email'];
		$role= $_POST['role'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		

		$sql = "SELECT * FROM tbladmin WHERE username = '$username' OR password='$password' OR email='$email'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$_SESSION['error'] = "Users, password  or email is already exist!!";
		
		}
		else{
			$sql= "INSERT INTO tbladmin(firstname, lastname, age, address, phonenumber, email, username,password,role,created_on)VALUES('$firstname','$lastname','$age','$address','$phonenumber','$email','$username','$password','$role',NOW())";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Account have been created.';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:users.php');
?>