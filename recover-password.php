<?php
	session_start();
	include 'conn.php';

$sql = "SELECT * FROM tblsettings";
$query = $conn->query($sql);
$sysresult = $query->fetch_assoc();

	if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM tbladmin WHERE id = '".$_SESSION['userid']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $sysresult['sys_name'];?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h4">RECOVER NOW</a>
    </div>
    <div class="card-body">
      
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <p class="login-box-msg"><b><?php echo $user['firstname'].' '.$user['lastname'];?></b></p>
      <form action="recover_pass_submit.php" method="post" autocomplete="off">
        <div class="input-group mb-3">
        <input type="hidden" name="id" class="form-control" value="<?php echo $user['id'];?>">
          <input type="password" name="newpassword" class="form-control" placeholder="New password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="btnrecover" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
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
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php include "admin/includes/scripts.php";?>
</body>
</html>
