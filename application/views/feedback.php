
<section class="no-margin" id="section">
	<div class="row">
		<h2 align="center">Feedback</h2>
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form role="form" id="feedbackForm">
				<?php foreach($criterias as $i=>$criteria) { 
					$ctr = $i%5;
				?>
				<div class="form-group">
					<label for="criteria1"> <?=$criteria['criteria']?> </label>
					<div class="range range<?=$color[$ctr]?>">
						<input type="range" name="input<?=$i?>" min="1" max="10" value="1" onchange="range<?=$i?>.value=value" id="orderliness" required>
						<output id="range<?=$i?>">1</output>
					</div>
				</div>
				<?php } ?>
				
				<!--<div class="form-group">
					<label for="criteria2"> Organization </label>
					<div class="range range-info">
						<input type="range" name="organization" min="1" max="10" value="1" onchange="rangeInfo.value=value" id="organization">
						<output id="rangeInfo">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria3"> Utilization of Devices or Visual Aids </label>
					<div class="range range-warning">
						<input type="range" name="utilization" min="1" max="10" value="1" onchange="rangeWarning.value=value" id="utilization">
						<output id="rangeWarning">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria4"> Reasonable Time Allotment</label>
					<div class="range range-danger">
						<input type="range" name="time" min="1" max="10" value="1" onchange="rangeDanger.value=value" id="time">
						<output id="rangeDanger">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria5"> Interaction or Audience Rapport</label>
					<div class="range range-primary">
						<input type="range" name="interaction" min="1" max="10" value="1" onchange="rangePrimary.value=value" id="interaction">
						<output id="rangePrimary">1</output>
					</div>
				</div>
				
					
				<div class="form-group">
					<label for="criteria6"> Venue</label>
					<div class="range range">
						<input type="range" name="venue" min="1" max="10" value="1" onchange="range.value=value" id="venue">
						<output id="range">1</output>
					</div>
				</div>-->
				
				<div class="form-group">
					<label for="criteria4"> Comments / Suggestions </label>
					<textarea rows="3" class="form-control" name="comments"></textarea>
				</div>
			</form>
		</div>
		<div class="col-lg-3"></div>
</section>

<section class="no-margin" id="section">
	<div class="row">
		<div class="col-lg-12" align="center">
			<button onclick="javascript: $('#feedbackForm').submit()" class="btn btn-primary btn-lg">Send Feedback</button>
		</div>
	</div>
</section>

<script>
	$('#feedbackForm').submit(function(e) {
		e.preventDefault();
		$.post("<?=base_url('/evex/user_feedback')?>", {data: JSON.stringify($('#feedbackForm').serializeArray()), criteria: (<?=json_encode($criterias)?>), csrf_token_name: Cookies.get("csrf")},function(data) {
			if(data == "1") {
				alert("Your feedback has been sent!! Thank you!!!");
				window.location = "<?=base_url('/evex/event')?>";
			}
		});
	});
</script>