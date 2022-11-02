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
            <h1>Upload files</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Record</li>
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
		  <form role="form" id="quickForm" method="POST" action="fileprocess.php" enctype="multipart/form-data" >
 
		   <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">File Type: <i class="text-red">.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</i></h3>
              </div>
                <div class="card-body">
			      	<div class="row">

				
			      	  <div class="col-md-12">
					  <label for="exampleInputEmail1">Choose File</label>
					  <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>">
						<div class="form-group">
							<div class="col-sm-9">
							  <input type="file" id="photo" name="myfile" required>
							</div>
						</div>
					  </div>
					  
				      </div>
                </div>
			       <div class="card-footer">
                  <button type="submit" name="upload" class="btn btn-primary"><span class="fa fa-check"></span> Submit</button>
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
