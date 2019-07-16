<?php
	@$flag = $this->uri->segment(3);
	if(@$flag == "editsuccess"){
?>
	<div class="alert alert-success alert-dismissable">
    	<i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!!</b> Changes have been successfully saved.
    </div>
<?php
	}elseif(@$flag == "success"){
?>
	<div class="alert alert-success alert-dismissable">
    	<i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!!</b> New record has been successfully added.
    </div>
<?php
	}elseif(@$flag == "delsuccess"){
?>
	<div class="alert alert-info alert-dismissable">
    	<i class="fa fa-info"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!!</b> Record has been successfully deleted.
    </div>
<?php
	}elseif(@$flag == "imageedit"){
?>
	<div class="alert alert-success alert-dismissable">
    	<i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <b>Success!!</b> New image has been added to album.
    </div>
<?php
	}
?>