<section class="no-margin" id="section">
	<div class="row">
		<h2 align="center">Feedback</h2>
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form role="form">
				<div class="form-group">
					<label for="criteria1"> Creativity </label>
					<input type="range" name="points" min="0" max="10" class="form-control" id="orderliness" required>
				</div>
				<div class="form-group">
					<label for="criteria2"> Orderliness </label>
					<input type="range" name="points" min="0" max="10" class="form-control" id="orderliness" required>
				</div>
				<div class="form-group">
					<label for="criteria3"> Timeliness </label>
					<input type="range" name="points" min="0" max="10" class="form-control" id="orderliness" required>
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
			<button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#eventCode"><h4>Send Feedback</h4></button>
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