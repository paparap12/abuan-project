<?php 

require_once("includes/conn.php");

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['file_id']);

    // fetch file to download from database
    $sql = "SELECT * FROM  upload_files WHERE FILEID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/' . $file['FILENAME'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['FILENAME']));
        readfile('../uploads/' . $file['FILENAME']);

        // Now update downloads count
        $newCount = $file['DOWNLOAD'] + 1;
        $updateQuery = "UPDATE upload_files SET DOWNLOAD=$newCount WHERE FILEID=$id";
        mysqli_query($conn, $updateQuery);
		header('Location: files.php');
        exit;
    }

}


?>