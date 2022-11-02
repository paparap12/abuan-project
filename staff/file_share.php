<?php include "includes/session.php";?>
 <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
<?php include "includes/header.php";?>


<body class="hold-transition sidebar-mini layout-fixed" onLoad="document.getElementById('country').focus();">
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
            <h1>Share your file</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Share file</li>
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

     <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
		  <form role="form" id="quickForm" method="POST" action="file_share_submit.php">
		<?php
				if(isset($_GET['file_id'])){
					$fileid =$_GET['file_id'];
					$sql ="SELECT * FROM upload_files WHERE FILEID='$fileid'";
					$query = $conn->query($sql);
					$crow = $query->fetch_assoc();
					 $ID =  $crow['FILEID'];
					 $FILENAME =  $crow['FILENAME'];
					 $FILESIZE =  $crow['FILESIZE'];
					 $EMAIL =  $crow['EMAIL'];
					 $ADMIN_STATUS =  $crow['ADMIN_STATUS'];
					 $TIMERS =  $crow['TIMERS'];
					 $DOWNLOAD =  $crow['DOWNLOAD'];
					 $FILESTATUS =  $crow['FILESTATUS'];
					 $uploaddate =$crow['DATETIME'];
					 $YEAR =$crow['YEAR'];
				}
				?>
		   <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">File Description <i class="text-red">.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</i></h3>
              </div>
                <div class="card-body">
			      	<div class="row">
			      	  <div class="col-md-12">
					  <!--<label for="exampleInputEmail1">Choose File</label>-->
					  <input type="hidden" name="FROM_USERID" value="<?php echo $_SESSION['userid'];?>">
					  <input type="hidden" name="FILE_SHAREID" value="<?php echo $ID;?>">
						<div>
						<div class="timeline-item">
						  <p class="timeline-header">File Name: <?php echo $crow['FILENAME'];?></p>
						  <div class="timeline-body">
						  <p>File Type:
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
						   </p>
							<p>File size: <?php echo floor($FILESIZE / 1000) . ' KB'; ?></p>
							<p>Downloads: <?php
									
									if ($DOWNLOAD > 999999) {
										$DOWNLOAD = number_format(($DOWNLOAD / 1000),1) . ' M';
									}
									elseif ($DOWNLOAD > 999) {
										$DOWNLOAD = number_format(($DOWNLOAD / 1000),1) . ' K';
									}

									echo $DOWNLOAD, " Times";

									?></p>
							<p>Year uploaded: <?php echo date('d F Y',strtotime($uploaddate)); ?></p>
		 
						  </div>
						</div>
					  </div>
					  
					 
						<div class="form-group">
						<label for="exampleInputEmail1">Share to User</label>
						<select class="form-control select2" name="TO_USERID" placeholder="" required>
						<option disabled selected>Select user</option>
						 <?php	
							$tbluser = mysqli_query($conn, "SELECT id as TO_USERID, CONCAT(firstname,' ', lastname) as fullname FROM tbladmin WHERE id !='".$_SESSION['userid']."' AND role !='admin'");  
							while($userdata = mysqli_fetch_array($tbluser))
							{
								echo "<option value='".$userdata['TO_USERID']."'>".$userdata['fullname']."</option>";
							}	
						?>  
						</select>
						</div> 
					  </div>
				     </div>
                   </div>
			       <div class="card-footer">
                  <button type="submit" name="btnshare" class="btn btn-primary"><span class="fa fa-share"></span> Share</button>
                </div>
				</div>
			  </form>
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
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

<?php include"includes/scripts.php";?>
 <script type="text/javascript" src="../dist/blotteradd.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
