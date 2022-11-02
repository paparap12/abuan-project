<?php
		session_start();
    include 'conn.php';
  
  $sql = "SELECT * FROM tblsettings";
  $query = $conn->query($sql);
  $sysresult = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="10;url=success_logout.php">
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
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="#" class="h4">SUCCESS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Your password has been successfully reset, Please wait.. you will redirect to login page. 
        
      Thank you for your patient!</p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
	window.setTimeout(function() {
		$("#alert").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 10000);

	});
</script>
</body>
</html>
