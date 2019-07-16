<style>

	.footer{
		width:100%;
		height:20px;
	}
</style>

<div class="footer">
	<div class="col-md-12">

	</div>
</div>
		<script src="<?=base_url()?>admin_files/js/jquery.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <!--<script src="<?=base_url()?>admin_files/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script> -->
		
		<script type="text/javascript" src="<?=base_url()?>admin_files/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?=base_url()?>admin_files/js/jquery-ui.js"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url()?>admin_files/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
        <script src="<?=base_url()?>admin_files/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=base_url()?>admin_files/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		 <!-- AdminLTE App -->
        <script src="<?=base_url()?>admin_files/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?=base_url()?>admin_files/js/AdminLTE/dashboard.js" type="text/javascript"></script>
		<!-- Bootstrap WYSIHTML5 -->
        <script src="<?=base_url()?>admin_files/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
		
		<script src="<?=base_url()?>admin_files/js/dropdown/jquery.chained.js" type="text/javascript"></script>
		 <script type="text/javascript" 
		 src="<?=base_url()?>admin_files/js/bootstrap-timepicker-gh-pages/js/bootstrap-timepicker.js"></script>
		 <script type="text/javascript" src="<?=base_url()?>admin_files/js/chosen.jquery.min.js"></script>
 		<script type="text/javascript" src="<?=base_url()?>plugin/nailthumb/jquery.nailthumb.1.1.js"></script>

		<script type="text/javascript">
        
            $('#example1').dataTable();
			$('#example2').dataTable();
			
			function confirmDelete(){
				if (confirm("Are you sure you want to delete?")){
   				return true;
				}
				else{
					return false;	
				}
			}
			
		
    	$("#series").chained("#mark"); 
			$('.submit').click(function(e){
				e.preventDefault();
					if($('.prod-cat option:selected').val() == 'null'){
					alert('Please select a valid category');
				}else{
					$('form').submit();
				}
				
			});
        </script>

<!--Video Modal-->
<?php
	$query = $this->db->get('tbl_video');
	foreach($query->result() as $video_record){
		$link = $video_record->video_link;
	}
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="video-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Video Link</h4>
	    </div>

	    <div class="modal-body">
	    	<form role="form" method="post">
      			<div class="form-group">
      				<input type="url" name="link" required="required" class="form-control" id="video-link" value="<?=$link?>">
      			</div>
      		</form>
      	</div>

      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary btn-video">Save changes</button>
      	</div>

    </div>
  </div>
</div>
<!--END VIDEO MODAL-->

 <script>
			

			$(document).on('click','.btn-video',function(e){
				e.preventDefault();
					var link = $('#video-link').val();
					$.ajax({
						type: "POST",
						url: "<?=base_url()?>admin/editVideo",
						data: { 
							video_link : link
						},
						success: function(data) {
							$('#video-modal').modal('hide');
							alert("Video link updated successfully!!");
						}
					});
			
			});
		 </script>  
		
		