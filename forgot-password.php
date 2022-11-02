      <?php 
            session_start();
            require_once("conn.php");
           if(isset($_POST['login'])){ 
            $phonenumber = $_POST['phonenumber'];     
            $email = $_POST['email'];

            $sql = mysqli_query($conn, "SELECT * FROM tbladmin WHERE phonenumber = '$phonenumber' and email = '$email'");
            $result = mysqli_num_rows($sql);

            if($result > 0)
            {
              while($row = mysqli_fetch_array($sql)){

                $_SESSION['userid']=$row['id'];
                $_SESSION['logged']="true";
                $session = "1"; 
                header('location: recover-password.php');
              }    

            }else
            {
            $_SESSION['error']='incorrect username and password';
               
            }
             
          }

          ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRIME REPORTING SYSTEM</title>

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
      <a href="#" class="h4">FORGOT PASSWORD</a>
    </div>
    <div class="card-body">
      
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="#" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="number" name="phonenumber" class="form-control" placeholder="Phone number" required>
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-phone"></span>        
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>

      </form>
      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>

    <br>
    <!-- /.login-card-body -->
  
    <!-- /.login-card-body -->
  </div>
  <?php
      if(isset($_SESSION['error'])){
        echo "
          <div id='alert' class='callout callout-danger text-center mt20'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
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
