 <nav class="main-header navbar navbar-expand navbar-green navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>

   	<?php
	$sql = "SELECT * FROM upload_files WHERE DATE(DATETIME)=CURDATE()";
	$query = $conn->query($sql);
	?>
    <ul class="navbar-nav ml-auto">
	<!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
           <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?php echo "".$query->num_rows.""; ?></span>
		 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		 <a href="#" class="dropdown-item">Notifications</a>
		 <div class="dropdown-divider"></div>
		<?php
			 $sql = "SELECT * FROM upload_files u 
					INNER JOIN tbladmin a ON u.UPLOADER=a.id
					INNER JOIN tblfileshare f ON u.FILEID=f.FILE_SHAREID 
					WHERE DATE(u.DATETIME)=CURDATE() LIMIT 5";
			$query = $conn->query($sql);
			while($row = $query->fetch_assoc()){
			?>
          <a href="../uploads/<?php echo $row['FILENAME']; ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg'; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $row['firstname']. ' ' .$row['lastname'];?>
                  <span class="float-right text-sm text-primary"><i class="fas fa-bell"></i></span>
                </h3>
                <p class="text-sm"><?php 
					$file = $row['FILENAME'];
					$leftstring = substr($file, 0, 10);
					$rightstring = substr($file, -10, 10);
					echo $marge= $leftstring.'...'.$rightstring;
					
				  ?>
				  </p>
               <p class="text-sm text-muted"><i class="far fa-calendar mr-1"></i> 
				<?php echo date('Y-m-d',strtotime($row['SHARE_DATETIME']));?> 
				<i class="far fa-clock mr-1"></i> 
				<?php echo date('h:i:s A',strtotime($row['SHARE_DATETIME']));?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
			<?php }?>
          <div class="dropdown-divider"></div>
          <a href="files.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
	  
	  
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="hidden-xs">  <i class="fas fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
			  <img src="<?php echo (!empty($sysinrow['sys_logo'])) ? '../images/'.$sysinrow['sys_logo'] : '../images/profile.jpg'; ?>" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <?php echo substr($sysinrow['sys_name'],0,13); ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-info"></i></span>
                </h3>
                <p class="text-sm">Member since</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo date('F d, Y', strtotime($sysinrow['sys_created'])); ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="System.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              Settings
              <div class="media-body">
                <h3 class="dropdown-item-title">  
                  <span class="float-right text-sm text-info"><i class="fas fa-cogs"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
	  

	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="hidden-xs"> <?php echo $user['firstname'].' '.$user['lastname']; ?></span> <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
			  <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <?php echo $user['firstname'].' '.$user['lastname']; ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-user-circle"></i></span>
                </h3>
                <p class="text-sm">Member since</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo date('M. Y', strtotime($user['created_on'])); ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#profile" data-toggle="modal"  class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              Update
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  
                  <span class="float-right text-sm text-info"><i class="fas fa-user-cog"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
		  <div class="dropdown-divider"></div>
          <a href="#logout" class="dropdown-item" data-toggle="modal">
            <!-- Message Start -->
            <div class="media">
              Sign Out
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <span class="float-right text-sm text-muted"><i class="fas fa-sign-out-alt"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
    </ul>
  </nav>
   <?php include 'includes/profile_modal.php'; ?>