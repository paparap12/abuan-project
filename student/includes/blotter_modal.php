<!---Blotter Information--->
	<div class="modal fade" id="blotterinfo">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-info"></i> Case Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="load_data"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="fa fa-window-close"></i> Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
	  
	  
	  <!---Blotter Delete--->
	<div class="modal fade" id="blotterdelete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-trash"></i> Please Confirm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form class="form-horizontal" method="POST" action="blotter_delete_sub.php">
            <div class="modal-body" id="blotter_data"></div>
			
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
	  
	   <!---Blotter Delete--->
	<div class="modal fade" id="blotterupdate">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
			<form role="form" id="quickForm" method="POST" action="blotter_update_sub.php">
            <div class="modal-body" id="blotter_update_data">
			
			</div>
			
           <div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancel</button>
			   <button type="submit" name="btnsubmit" class="btn btn-primary"><span class="fa fa-check"></span> Submit</button>
			</div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>