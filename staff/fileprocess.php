<?php
session_start();
require_once("includes/conn.php");
if (isset($_POST['upload'])) {

    $user = $_POST['userid'];

    $filename = $_FILES['myfile']['name'];
	//$rd2 = mt_rand(100000,999999)."_File"; 
    $destination = '../uploads/' . $filename;
   // $destination = "../uploads/".$rd2."_".$filename;   
	
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];


    if (!in_array($extension, ['pdf','pptx','docx','doc','ppt','xlsx','xls','odt','jpg','png','gif','png','jpeg'])) {
		
		$_SESSION['error'] = "You file extension must be: .docx .doc .pptx .ppt .xlsx .xls .pdf .odt";
		header("location:files_upload.php");
               
    } elseif ($_FILES['myfile']['size'] > 20000000000) { // file shouldn't be larger than 1Megabyte
      
		//$_SESSION['error'] = "File to larger than 2000000 to upload!!!";
	   
		header("location:files_upload.php");
    } else{

	   $sql = "SELECT * FROM upload_files WHERE FILENAME = '$filename'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
		 $_SESSION['error'] = "File already exist!! please rename if you want to upload!";
		header("location:files_upload.php");
		}else{
      
        date_default_timezone_set("asia/manila");
         $time = date("M-d-Y h:i A",strtotime("+0 HOURS"));
		 $year = date("Y");
		 //$fstatus ="Confirmed";
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO upload_files (FILENAME, FILESIZE, DOWNLOAD, TIMERS, UPLOADER, YEAR) VALUES ('$filename', $size, 0, '$time', '$user', '$year')";
            if (mysqli_query($conn, $sql)) {
               $_SESSION['success'] = "File successfully uploaded!!";
				 header("location:myfiles.php");
            }
        } else {
			  $_SESSION['success'] = "Failed Upload files!";
			  header("location:files_upload.php");
        }
	  }
    // $_SESSION['error'] = "File to larger than 2000000 to upload!!!";
  }
 //header("location:myfiles.php");
}

?>
