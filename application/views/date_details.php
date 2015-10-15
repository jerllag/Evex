<div class="row" id="content">
	<div class="col-lg-4">
		<strong>Venue</strong>
	</div>
	<div class="col-lg-3">
		<strong>Time</strong>
	</div>
</div>
<?php foreach($details as $detail) { ?>
<div class="row" id="content">
	<div class="col-lg-4">
		<?=$detail['venue']?>
	</div>
	<div class="col-lg-3">
		<?=date("g:i a", strtotime($detail['start_time']))?> to <?=date("g:i a", strtotime($detail['end_time']))?>
	</div>
	<div class="col-lg-3">
		<button onclick="registerAttendee('<?=$detail['event_code']?>')" class="btn btn-danger" data-toggle="modal" data-target="#registerForm">
			<span class="glyphicon glyphicon-calendar"></span> RSVP
		</button>
	</div>
</div>
<?php } ?>