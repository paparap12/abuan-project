<?php include "includes/session.php";?>
<?php include "includes/header.php";?>
<?php

if(isset($_GET['del'])){
	$uid =$_GET['del'];
	$sql ="UPDATE upload_files SET FILESTATUS='0' WHERE upload_files.FILEID='$uid'";
	$query=$conn->query($sql);
	if($conn->query($sql)){

			$sql ="DELETE FROM tbldeleted WHERE FILE_ID='$uid'";
			$conn->query($sql);
		}
		else{
			$_SESSION['error'] = $conn->error;
	}

	header("location:files_trash.php");
 }
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
	<?php include "includes/navbar.php";?>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
	<?php include "includes/sidebar.php";?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Archive Files</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Archive List</li>
            </ol>
          </div>
        </div>
			<?php
        if(isset($_SESSION['error'])){
          echo "
            <div id='alert' class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div id='alert' class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
			<div class="card">
            <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-th-list"></i>
                  List of Deleted Files
                </h3>

               <!-- <div class="card-tools">
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
					<a type="button" href="files_upload.php" class="btn btn-default btn-sm"><i class="fa fa-upload" aria-hidden="true"></i> Upload File</a>
                  </div>
                </div>--->
              </div>
            <!-- /.card-header -->
            <div class="card-body">
			
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>

                   <th>File Type</th>
                    <th>Filename</th>
					<th>FileSize</th>
					 <th>Owner</th>  
					<th>Delete date</th>
                </tr>
                </thead>
                <tbody>
				  <?php
                    $sql = "SELECT * FROM upload_files u 
					INNER JOIN tbladmin a ON u.UPLOADER=a.id 
					INNER JOIN tbldeleted d ON u.UPLOADER=a.id 
					WHERE u.FILESTATUS='1' AND d.FILE_ID=u.FILEID";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
						
						 $ID =  $row['FILEID'];
						 $FILENAME =  $row['FILENAME'];
						 $FILESIZE =  $row['FILESIZE'];
						 $EMAIL =  $row['EMAIL'];
						 $ADMIN_STATUS =  $row['ADMIN_STATUS'];
						 $TIMERS =  $row['TIMERS'];
						 $DOWNLOAD =  $row['DOWNLOAD'];
						 $FILESTATUS =  $row['FILESTATUS'];
						 $UNAME = $row['firstname'].' '.$row['lastname'];
						 $uploaddate =$row['DATE_TIME'];
						
                      ?>
                        <tr>
   
							<td>
						  <?php 
							$path = $FILENAME;
							$extension = pathinfo($path, PATHINFO_EXTENSION);
							
							if($extension =="pdf"){
								echo("<span class='fa fa-file-pdf text-danger'></span> $extension");
							}
							
							else if($extension =="pptx"){
								echo("<span class='fa fa-file-powerpoint text-warning'></span> $extension");
							}
							else if($extension =="docx"){
								echo("<span class='fa fa-file-word text-primary'></span> $extension");
							}
							else if($extension =="doc"){
								echo("<span class='fa fa-file-word text-info'></span> $extension");
							}
							else if($extension =="ppt"){
								echo("<span class='fa fa-file-powerpoint text-warning'></span> $extension");
							}
							else if($extension =="xlsx"){
								echo("<span class='fa fa-file-excel text-success'></span> $extension");
							}
							else if($extension =="xls"){
								echo("<span class='fa fa-file-excel text-success'></span> $extension");
							}
							else if($extension =="png"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="jpeg"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="jpg"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="gif"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else{
								echo("<span class='fa fa-file-minus'></span> $extension");
							}
							?> 
						  </td>
                 
						  <td><?php echo $FILENAME; ?>
						  <span  data-toggle="dropdown" class="pull-right text-primary" style="float:right">
							  <span class="sr-only">Toggle Dropdown</span>
							  <i class="fas fa-ellipsis-v"></i>
							</span>
						  <div class="dropdown-menu" role="menu">
				
							  <a href="files_trash.php?del=<?php echo $ID;?>" class="dropdown-item" onClick="return confirm('Do you really want to Restore this file?')"><i class="fas fa-trash-restore text-warning"></i> Restore</a> 
							  
							</div>
						  </td>
						  
						  <td><?php echo floor($FILESIZE / 1000) . ' KB'; ?></td>
                          <td><?php echo $UNAME; ?>
                         
                          <td><?php echo $uploaddate; ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 
include 'includes/blotter_modal.php'; 
?>
<?php include"includes/scripts.php";?>

</body>
</html>
