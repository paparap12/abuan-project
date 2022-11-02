<?php
require_once("includes/session.php");
if(isset($_GET['del'])){
	$uid =$_GET['del'];
	$sql ="UPDATE upload_files SET FILESTATUS='1' WHERE FILEID='$uid'";
	$query=$conn->query($sql);
	if($conn->query($sql)){
			$_SESSION['success'] = 'File successfully deleted!';
			$sql= "INSERT INTO tbldeleted(FILE_ID, USERID)VALUES('$uid','".$_SESSION['userid']."')";
			$conn->query($sql);
		}
		else{
			$_SESSION['error'] = $conn->error;
	}
 }
header("location:myfiles.php");
?>