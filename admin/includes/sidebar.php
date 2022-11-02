  
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
	   <?php
			$sql = "SELECT *, tblsettings.id AS sysID FROM tblsettings";
			$query = $conn->query($sql);
			$row = $query->fetch_assoc();
		?>
			<img  src="<?php echo (!empty($row['sys_logo']))? '../images/'.$row['sys_logo']:'../images/profile.jpg'; ?>"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8">
			<span class="brand-text font-weight-light sm"><?php echo substr($row['sys_name'],0,13);?></span>   
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border:none">
        <div class="image">
		  <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle elevation-2">
		 
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $user['firstname'].' '.$user['lastname']; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
          <li class="nav-header">DASHBOARD</li>
          <li class="nav-item">
            <a href="home.php" class="nav-link">
            <i class="fas fa-desktop nav-icon text-pink"></i>
              <p>Home</p>
            </a>
            </li>
		<li class="nav-item">
            <a href="myfiles.php" class="nav-link">
           <i class="fab fa-google-drive nav-icon text-green"></i>
              <p>My Drive 
              <span class="badge badge-primary right"></span>
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="files.php" class="nav-link">
            <i class="fa fa-file nav-icon text-warning"></i>
              <p>All Files 
              <span class="badge badge-primary right"></span>
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="myrecentfiles.php" class="nav-link">
          <i class="fa fa-clock nav-icon text-maroon"></i>
              <p>Recent  <span class="badge badge-danger right"></span></p>
            </a>
		       </li>

			<li class="nav-item">
            <a href="files_trash.php" class="nav-link">
            <i class="fa fa-archive nav-icon text-primary"></i>
              <p>Archive  <span class="badge badge-danger right"></span></p>
            </a>
		       </li>
          

          <li class="nav-header">MAINTENANCE</li>
         
         <li class="nav-item">
            <a href="members.php" class="nav-link">
             <i class="nav-icon fas fa-user-tie text-warning"></i>
              <p>
                Staff
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="users.php" class="nav-link">
           <i class="fa fa-users nav-icon text-danger"></i>
              <p>Student  <span class="badge badge-warning right"></span></p>
            </a>
		       </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
  <div class="modal fade" id="logout">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Please Confirm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-window-close"></i> No</button>
              <a type="submit" href="logout.php"  class="btn btn-primary"><i class="fa fa-arrow-left"></i> Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>