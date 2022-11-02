<?php include "includes/session.php";?>
<?php include "includes/header.php";?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
            <h1>System Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">System Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
			   <?php
                    $sql = "SELECT *, tblsettings.id AS sysID FROM tblsettings";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
				?>
                <div class="text-center">
                  <?php 
					$count = strlen($row['sys_logo']);
					if ($count < 100) {?>
					<img  src="<?php echo (!empty($row['sys_logo']))? '../images/'.$row['sys_logo']:'../images/profile.jpg'; ?>"  class="img-circle"  height="150" width="150">
				  <?php
					}else{?>
					<img  src="<?php echo $row['sys_logo'] ?>" class="img-circle" height="150" width="150">
					
				  <?php
					}
					
				  ?>
				 
                </div>

                <p class="text-center">
				<a href="javascript:void(0)" data-toggle="modal" class="pull-right get_id" data-id="<?php echo $row['id']; ?>" data-target="#barangay_photo">
				<span class="fa fa-edit"></span> Change Logo
				</a>
				</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    Name <a class="float-right"><?php echo $row['sys_name']; ?></a>
                  </li>
                  <li class="list-group-item">
                    Address <a class="float-right"><?php echo $row['sys_address']; ?></a>
                  </li>
				  <li class="list-group-item">
                    Phone Number <a class="float-right"><?php echo $row['sys_phonenumber']; ?></a>
                  </li>
				  <li class="list-group-item">
                    Email <a class="float-right"><?php echo $row['sys_email']; ?></a>
                  </li>
                </ul>
				<?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                 <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><span class="fa fa-cog"></span> Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
				  <?php
                    $sql = "SELECT *, tblsettings.id AS sysID FROM tblsettings";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
				?>
                    <form class="form-horizontal" action="system_editsave.php" method="POST">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">System Name</label>
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $row["id"];?>" required>
                          <input type="text" class="form-control" name="sys_name" value="<?php echo $row["sys_name"];?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="sys_address" value="<?php echo $row["sys_address"];?>"  required>
                        </div>
                      </div>
  
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">PhoneNumber</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="sys_phonenumber" value="<?php echo $row["sys_phonenumber"];?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">EmailAddress</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="sys_email" value="<?php echo $row["sys_email"];?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="bupdate"><i class="fa fa-save"></i> Update</button>
                        </div>
                      </div>
                    </form>
					<?php } ?>
                  </div>
                  <!-- /.tab-pane -->
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
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
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
<?php include 'includes/system_modal.php'; ?>
<?php include"includes/scripts.php";?>
<script>
$(document).ready(function(){
  $(".get_id").click(function(){
	  var ids = $(this).data('id');
	   $.ajax({
		   url:"system_logoedit.php",
		   method:'POST',
		   data:{id:ids},
		   success:function(data){
			   
			   $('#load_data').html(data);
		   
		   }
		   
	   })
  })
  
})
</script>
</body>
</html>
