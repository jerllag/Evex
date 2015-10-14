
<section class="no-margin" id="section">
	<div class="row">
		<h2 align="center">Feedback</h2>
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form role="form">
				<div class="form-group">
					<label for="criteria1"> Relevance to the Theme </label>
					<div class="range range-success">
						<input type="range" name="relevance" min="1" max="100" value="1" onchange="rangeSuccess.value=value" id="orderliness" required>
						<output id="rangeSuccess">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria2"> Organization </label>
					<div class="range range-info">
						<input type="range" name="organization" min="1" max="100" value="1" onchange="rangeInfo.value=value" id="organization">
						<output id="rangeInfo">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria3"> Utilization of Devices or Visual Aids </label>
					<div class="range range-warning">
						<input type="range" name="utilization" min="1" max="100" value="1" onchange="rangeWarning.value=value" id="utilization">
						<output id="rangeWarning">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria4"> Reasonable Time Allotment</label>
					<div class="range range-danger">
						<input type="range" name="time" min="1" max="100" value="1" onchange="rangeDanger.value=value" id="time">
						<output id="rangeDanger">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria5"> Interaction or Audience Rapport</label>
					<div class="range range-primary">
						<input type="range" name="interaction" min="1" max="100" value="1" onchange="rangePrimary.value=value" id="interaction">
						<output id="rangePrimary">1</output>
					</div>
				</div>
				
					
				<div class="form-group">
					<label for="criteria6"> Venue</label>
					<div class="range range">
						<input type="range" name="venue" min="1" max="100" value="1" onchange="range.value=value" id="venue">
						<output id="range">1</output>
					</div>
				</div>
				
				<div class="form-group">
					<label for="criteria4"> Comments / Suggestions </label>
					<textarea rows="3" class="form-control"></textarea>
				</div>
			</form>
		</div>
		<div class="col-lg-3"></div>
</section>

<section class="no-margin" id="section">
	<div class="row">
		<div class="col-lg-12" align="center">
			<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#eventCode"><h4>Send Feedback</h4></button>
		</div>
	</div>
</section>

<!---modal for event code-->
	<div id="eventCode" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background: #1da9d3; color:white; width="">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center"> Event Code</h4>
				</div>
				<div class="modal-body" id="content">
					<form class="form">
						<div class="form group">
							<input type="text" class="form-control" id="code">						
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<center><button type="submit" class="btn btn-info" data-dismiss="modal"><h4>Save</h4></button></center>
				</div>
			</div>
		</div>
	</div>