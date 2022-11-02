<?php
	include 'includes/session.php';
	if(isset($_POST['postcomment'])){			
		$fileid=$_POST['fileid'];
		$userid=$_POST['userid'];
		$content=$_POST['content'];

		$sql= "INSERT INTO tblcomment(cfileid, userid, content)VALUES('$fileid','$userid','$content')";
		if($conn->query($sql)){
			
			$result = mysqli_query($conn,"SELECT * FROM tblcomment WHERE cfileid = '".$fileid."'");
			$urow = mysqli_fetch_array($result);
			header('location: file_viewallcoment.php?file_id='.$urow['cfileid']);
			
		}
		else{
			//$_SESSION['error'] = $conn->error;
		}

	}	
	else{
		//$_SESSION['error'] = 'Fill up add form first';
		
	}
	
header('location: file_viewallcoment.php?file_id='.$urow['cfileid']);
?>