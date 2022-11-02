<?php
session_start();
include 'conn.php';
$sql = "SELECT * FROM tblsettings";
$query = $conn->query($sql);
$sysresult = $query->fetch_assoc();

if(isset($_POST['login'])){ 
	$username = $_POST['adminEmail'];			
	$password = $_POST['adminPassword'];

	$sql = mysqli_query($conn, "SELECT * FROM tbladmin WHERE username = '$username' and password = '$password'");
	$result = mysqli_num_rows($sql);

	if($result > 0)
	{
		while($row = mysqli_fetch_array($sql)){

			$_SESSION['userid']=$row['id'];
			$_SESSION['logged']="true";
			$session = "1";	
		  if($row['role'] == "admin")
			{	
				header('location: admin/home.php');
			}
			else if($row['role'] == "user")
			{	
				header("location:student/myfiles.php");
			}else if($row['role'] == "staff")
			{	
				header("location:staff/myfiles.php");
			}
			else
			{
				$_SESSION['error'] = 'Your account maybe not approved';
				
			}
		}    

	}else
	{
	$_SESSION['error']='incorrect username and password';
	   
	}
	 
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title><?php echo $sysresult['sys_name'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" src="<?php echo (!empty($row['sys_logo']))? 'images/'.$row['sys_logo']:'../images/profile.jpg'; ?>"> 
        <link rel="stylesheet" type="text/css" href="slider/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="slider/css/style2.css" />
		
		 <!-- Font Awesome -->
		  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		  <!-- Ionicons -->
		  <!-- Theme style -->
		  <link rel="stylesheet" href="dist/css/adminlte.minLOGIN.css">
			
		<script type="text/javascript" src="slider/js/modernizr.custom.86080.js"></script>
		
		<style>
			#loginme{
				background: rgba(0, 0, 0, 0.40);
				border-top-right-radius: 5px;
				border-top-left-radius: 5px;
				border-bottom-left-radius: 5px;
				border-bottom-right-radius: 5px;
			}

		</style>
    </head>
<body id="page">

        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
           
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h2></h2>
				<p class="codrops-demos">
					<div class="login-box">
				 
				  <!-- /.login-logo -->
				  
					<div class="card-body login-card-body" id="loginme">
					 <div class="login-logo">
						<a href="#" style="color:#fff"><h1>LOGIN</h1></a>
					 </div>
					 <h2> <p class="login-box-msg">Sign in to start your session</p></h2>
					  <form method="post" autocomplete="off">
						<div class="input-group input-group-sm mb-3">
						  <input type="text" name="adminEmail" class="form-control" placeholder="Username" required>
						  <div class="input-group-append">
							<div class="input-group-text">
							  <span class="fas fa-user" style="color:#fff"></span>
							</div>
						  </div>
						</div>
						<div class="input-group input-group-sm mb-3">
						  <input type="password" name="adminPassword" class="form-control sm" placeholder="Password" required>
						  <div class="input-group-append">
							<div class="input-group-text">
							  <span class="fas fa-lock" style="color:#fff"></span>
							</div>
						  </div>
						</div>
						<div class="row">
						  <!-- /.col -->
						  <div class="col-3">
							<button type="submit" name="login" class="btn btn-primary"> <span class="fas fa-sign-in-alt"></span> Sign In</button> 
							<a href="register.php" class="text-center btn btn-info">Create Account</a>
						  </div>
						  <!-- /.col -->
						</div>
						<div class="row">
						  <!-- /.col -->
						  <br>
						  <div class="col-3">
							 <p class="mb-1">
							<a href="forgot-password.php" style="color:#fff">I forgot my password</a>
							</p>
						  </div>
						  <!-- /.col -->
						</div>
								
					  </form>
					</div>
					<br>
					<!-- /.login-card-body -->
					<?php
						if(isset($_SESSION['error'])){
							echo "
								<div class='callout callout-danger text-center mt20'>
									<p>".$_SESSION['error']."</p> 
								</div>
							";
							unset($_SESSION['error']);
						}
					?>
				</p>
				</div>
            </header>
        </div>
    </body>
</html>