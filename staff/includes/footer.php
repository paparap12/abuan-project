  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php $date= date('Y'); echo '2020', '-'.$date;?> <a href="#">Source Code Ph</a>.</strong> All rights
    reserved.
  </footer>
  
<script>
$(document).ready(function(){
  $(".get_id").click(function(){
	  var ids = $(this).data('id');
	   $.ajax({
		   url:"barangay_logoedit.php",
		   method:'POST',
		   data:{id:ids},
		   success:function(data){
			   
			   $('#load_data').html(data);
		   
		   }
		   
	   })
  })
  
})
</script>


