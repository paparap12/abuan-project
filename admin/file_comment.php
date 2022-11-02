<?php include "includes/session.php";?>
<?php include "includes/header.php";?>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
 <?php include "includes/navbar.php";?>
<?php include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>File Comment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
			<?php
			if(isset($_GET['file_id'])){
				$fileid =$_GET['file_id'];
				$sql ="SELECT * FROM upload_files WHERE FILEID='$fileid'";
				$query = $conn->query($sql);
				$crow = $query->fetch_assoc();
				 $ID =  $crow['FILEID'];
				 $FILENAME =  $crow['FILENAME'];
				 $FILESIZE =  $crow['FILESIZE'];
				 $EMAIL =  $crow['EMAIL'];
				 $ADMIN_STATUS =  $crow['ADMIN_STATUS'];
				 $TIMERS =  $crow['TIMERS'];
				 $DOWNLOAD =  $crow['DOWNLOAD'];
				 $FILESTATUS =  $crow['FILESTATUS'];
				 $uploaddate =$crow['DATETIME'];
				 $YEAR =$crow['YEAR'];
			}
			?>
			
			<div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red"> Uploaded on <?php echo date('d M. Y', strtotime($crow['DATETIME']));?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo date('h:i A', strtotime($crow['DATETIME']));?></span>
                  <h3 class="timeline-header">File Name: <?php echo $crow['FILENAME'];?></h3>
                  <div class="timeline-body">
				  <p>File Type:
					<?php 
							$path = $FILENAME;
							$extension = pathinfo($path, PATHINFO_EXTENSION);
							
							if($extension =="pdf"){
								echo("<span class='fa fa-file-pdf text-danger'></span> $extension");
							}
							
							else if($extension =="pptx"){
								echo("<span class='fa fa-file-powerpoint text-warning'></span> $extension");
							}
							else if($extension =="docx"){
								echo("<span class='fa fa-file-word text-primary'></span> $extension");
							}
							else if($extension =="doc"){
								echo("<span class='fa fa-file-word text-info'></span> $extension");
							}
							else if($extension =="ppt"){
								echo("<span class='fa fa-file-powerpoint text-warning'></span> $extension");
							}
							else if($extension =="xlsx"){
								echo("<span class='fa fa-file-excel text-success'></span> $extension");
							}
							else if($extension =="xls"){
								echo("<span class='fa fa-file-excel text-success'></span> $extension");
							}
							else if($extension =="png"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="jpeg"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="jpg"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else if($extension =="gif"){
								echo("<span class='fa fa-file-image text-maroon'></span> $extension");
							}
							else{
								echo("<span class='fa fa-file-minus'></span> $extension");
							}
							?> 
                   </p>
                    <p>File size: <?php echo floor($FILESIZE / 1000) . ' KB'; ?></p>
                    <p>Downloads: <?php
							
							if ($DOWNLOAD > 999999) {
								$DOWNLOAD = number_format(($DOWNLOAD / 1000),1) . ' M';
							}
							elseif ($DOWNLOAD > 999) {
								$DOWNLOAD = number_format(($DOWNLOAD / 1000),1) . ' K';
							}

							echo $DOWNLOAD, " Times";

							?></p>
                    <p>Year uploaded: <?php echo date('d F Y',strtotime($uploaddate)); ?></p>
 
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-green"></i>
                <div class="timeline-item">
				<form role="form" id="quickForm" method="POST" action="comment.php">
                  <div class="card-body">
				   <div class="form-group ">
                   <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border:none">
					<div class="image">
					  <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle">
					 
					</div>
					<div class="info">
					  <a href="#" class="d-block"><?php echo $user['firstname'].' '.$user['lastname']; ?></a>
					</div>
				  </div>
                   
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputPassword1">Write comment</label>
                    <div class="mb-3">
					<input type="hidden" name="fileid" value="<?php echo $fileid;?>" required>
					<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>" required>
					
					<textarea  class="textarea" name="content" placeholder="Place some text here"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
					</div>
                  </div>
				   <div class="timeline-footer">
                    <button type="submit" name="postcomment" class="btn btn-primary btn-sm">Post Comment</button>
                  </div>
                </div>
				  </form>
				  
				  
			<div class="card-footer card-comments">
			 <?php
				 require_once "includes/conn.php";
				if(isset($_GET['page_no']) && $_GET['page_no']!=""){
					$page_no = $_GET['page_no'];
				}else{
					$page_no =1;
					
				}

				$total_records_per_page = 10;
				$offset = ($page_no-1) * $total_records_per_page;
				$previous_page =$page_no - 1;
				$next_page = $page_no + 1;
				$adjacents = "1";

				$result_count=mysqli_query($conn,"SELECT COUNT(*) as total_records FROM tblcomment c INNER JOIN tbladmin a ON c.userid = a.id WHERE cfileid='$fileid'");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1;


				 $sql = mysqli_query($conn,"SELECT * FROM tblcomment c INNER JOIN tbladmin a ON c.userid = a.id WHERE cfileid='$fileid' ORDER by submit_date DESC LIMIT $offset,$total_records_per_page");
				
				 $row = mysqli_num_rows($sql);
				 if($row > 0 ){
					 while($row =mysqli_fetch_array($sql)){
						 
					?>		
			
					<div class="card-comment">
					  <img class="img-circle img-sm" src="<?php echo (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg'; ?>" alt="User Image">
					
					  <div class="comment-text">
						<span class="username">
						 <?php echo $row['firstname'].' '.$row['lastname']; ?>
						  <span class="text-muted float-right"><?php 
								echo $row['submit_date'];
						  ?></span>
						</span><!-- /.username -->
					   <?php echo $row['content'];?>
					  </div>
					  
					</div>	
					
					<?php
					  
						 }}  
					?>
					 <div class="timeline-footer">
                    <a href="file_viewallcoment.php?file_id=<?php echo $fileid;?>">  <i class="fas fa-eye"></i> See all comment</a>
                  </div>
				</div>
			
                </div>
              </div>
			  <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-danger"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

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
<script>
 $(document).ready(function(){	
	
	$(document).on('click', '.more', function(){
		var id = $(this).data('target');
		var target = $(this).attr('name');
		
		if(target == "more"){
			$('#user_id'+id+'').show();
			$(this).text('Hide');
			$(this).attr('name', 'hide');
		}else{
			$('#user_id'+id+'').hide();
			$(this).text('More...');
			$(this).attr('name', 'more');
		}
		
	});
	
});
</script>
<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>
</body>
</html>
