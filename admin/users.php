<?php include "includes/session.php";?>
<?php include "includes/header.php";?>
<?php

if(isset($_GET['del'])){
	$uid =$_GET['del'];
	$sql ="DELETE FROM tbladmin WHERE id='$uid'";
	$query=$conn->query($sql);
	if($conn->query($sql)){
			$_SESSION['success'] = 'User deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
	}
	echo "<script>window.location.href='users.php'</script>";
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
            <h1>Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
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
                <i class="fas fa-th-list"></i>
                  List of Student
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
			
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>Photo</th>
                  <th>Username</th>
                  <th>Password </th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Age</th>
                  <th>created_on</th>
                  <th>Tools</th>
                </tr>
                </thead>
                <tbody>
				        <?php
                    $sql = "SELECT * FROM tbladmin WHERE role='user'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
						  <td>
						  <img src="<?php echo (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg'; ?>" class="img-size-50 mr-3 img-circle">
						  </td>
						  <td><?php echo $row['username']; ?></td>
						   <td><?php echo $row['password']; ?>
                           <a href="users_reset_password.php?resetpass=<?php echo $row['id'];?>" style="float:right" class="btn bg-gradient-danger btn-xs">
                           <span class="fa fa-recycle" aria-hidden="true"></span> reset</a>
                          </td>
                          <td><?php echo $row['firstname']; ?></td>
                          <td><?php echo $row['lastname']; ?></td>
                          <td><?php echo $row['age']; ?>
                          <td><?php echo $row['created_on']; ?>
						
						          </td>
                          <td>
                            <a href='javascript:void(0)' class="btn btn-primary btn-sm get_id" data-id='<?php echo $row['id']; ?>' data-toggle="modal" data-target="#blotterinfo"><span class="fa fa-eye"></span> </a>
						              	<a href='users_update.php?update=<?php echo $row['id'];?>' class="btn btn-success btn-sm update"><span class="fa fa-edit"></span> </a>
							              <a href="users.php?del=<?php echo htmlentities($row['id']);?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete?')"><span class="fa fa-trash"></span></a>
                          </td>
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
include 'includes/member_modal.php'; 
?>
<?php include"includes/scripts.php";?>

<script>
$(document).ready(function(){
  $(".get_id").click(function(){
	  var ids = $(this).data('id');
	   $.ajax({
		   url:"members_info.php",
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
