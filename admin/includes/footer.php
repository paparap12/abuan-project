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


