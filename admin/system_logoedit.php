<?php
include "includes/session.php";
$id = $_POST['id'];
$sql = "SELECT * FROM tblsettings WHERE tblsettings.id = '$id'";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
?>

	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
		  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
			<div class="form-group">
				<div class="col-sm-9">
				  <input type="file" id="photo" name="photo" required>
				</div>
			</div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>