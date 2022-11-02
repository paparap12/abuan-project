<?php 
include "includes/session.php";
		if(isset($_GET['update'])){
		$id = $_GET['update'];
		$sql = "SELECT * FROM tbladmin WHERE tbladmin.id = '$id'";
		$query = $conn->query($sql);
		$cresult = $query->fetch_assoc();
	}
 ?>
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
            <h1>Update member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Record</li>
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
		      <form role="form" id="quickForm" method="POST" action="members_update_sub.php">
				<div class="card card-default">
				<div class="card-header">
                <h3 class="card-title">
				      	<input type="hidden" name="memid" value="<?php echo $cresult['id'];?>">
                  <h3 class="card-title"><span class="fa fa-info-circle"></span> Information</small> </h3>
                </h3>
			        <div class="card-tools">
					  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
					  <a href="members.php" class="btn btn-default btn-sm"> <span class="fa fa-arrow-left"></span> Return</a>
                  </div>
                </div>
              </div>
                <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" name="firstname" value="<?php echo $cresult['firstname'];?>" placeholder="First Name" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                </div><!--col-md---->
        <div class="col-md-6">
	    	<div class="input-group mb-3">
          <input type="text" class="form-control" name="lastname" value="<?php echo $cresult['lastname'];?>" placeholder="Last Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
        <div class="col-md-6">
	    	<div class="input-group mb-3">
          <input type="text" class="form-control" name="age" value="<?php echo $cresult['age'];?>" placeholder="Age" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->

        <div class="col-md-6">
	    	<div class="input-group mb-3">
          <input type="number" class="form-control" name="phonenumber" value="<?php echo $cresult['phonenumber'];?>" placeholder="Phone Number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
        <div class="col-md-12">
	    	<div class="input-group mb-3">
          <input type="text" class="form-control" name="address" value="<?php echo $cresult['address'];?>" placeholder="Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
        <div class="col-md-12">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" value="<?php echo $cresult['email'];?>" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
		
		
		
		<div class="col-md-6">
	    <div class="input-group mb-3">
			<select class="form-control select2" Name="role" placeholder="" required>
				<option selected><?php echo $cresult['role'];?></option>
				<option>admin</option>
				<option>officer</option>
			  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
		
		 <div class="col-md-6">
	    <div class="input-group mb-3">
			<select class="form-control select2" Name="position" placeholder="" required>
				<option selected><?php echo $cresult['position'];?></option>
				<option>PNP Chief</option>
				<option>PO1</option>
				<option>PO2</option>
				<option>PO3</option>
				<option>SPO1</option>
				<option>SPO2</option>
				<option>SPO3</option>
				<option>SPO4</option>
			  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        </div><!--col-md---->
		
		
          </div><!--end row-md---->
          </div>
				<div class="card-footer">
                  <button type="submit" name="btnsubmit" class="btn btn-primary"><span class="fa fa-check"></span> Submit</button>
                </div>
				</div>
			  </form>
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
