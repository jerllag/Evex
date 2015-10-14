<?php foreach($details as $detail) { ?>
<div class="row">
	<div class="col-lg-4">
		<?=$detail['venue']?>
	</div>
	<div class="col-lg-3">
		<?=date("g:i a", strtotime($detail['start_time']))?> to <?=date("g:i a", strtotime($detail['end_time']))?>
	</div>
	<div class="col-lg-3">
		<button class="btn btn-danger" data-toggle="modal" data-target="#registerForm">
			<span class="glyphicon glyphicon-calendar"></span> RSVP
		</button>
	</div>
</div>
<?php } ?>