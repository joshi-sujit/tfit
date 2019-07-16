<?php foreach($result as $row){
	$program_title = $row->program_title;
	$program_desc = $row->program_desc;
	$image = $row->image;
}
?>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span></button>
				<h4 class="modal-title"><?=$program_title?></h4>
			</div>
			<div class="modal-body">
				<div class="modal-img"><img src="<?=base_url()?>image/program/<?=$image?>"></div>
				<?=$program_desc?>
			</div>
			<div class="modal-footer">
				<a href="<?=base_url()?>home/online" class="signup-now">Sign up now</a>
				<h4>and begin the journey to better health and the body you always wanted!</h4>
			</div>