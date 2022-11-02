
<!-- Delete -->

	<div class="modal fade" id="delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Please confirm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form class="form-horizontal" method="POST" action="official_delete.php">
			<input type="hidden" class="empid" name="id">
             <p>Are you sure you want to delete this Resident from your record?	</p>
			 ID: <span class="OFFID"></span><br/>
	         Name: <span class="del_employee_name"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-window-close"></i> No</button>
              <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Yes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			 <h4 class="modal-title"><span class="del_employee_name"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
			</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="official_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
              <button type="submit" class="btn btn-success " name="upload"><i class="fa fa-check-square"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    


<!---Residence Information--->
	<div class="modal fade" id="residentinfo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Resident Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="load_data">
				
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="fa fa-window-close"></i> Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  
	  
	  
	  