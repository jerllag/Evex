	<section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-12">
				<h2 align="center">Create Your Event
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-offset-2 col-lg-4 error_msg"></div>
		</div>
		<form class="form" id="createEventForm">
		<div class="row" id="content">
			<div class="col-lg-2"></div>
			<div class="col-lg-4">	
				<div class="form group">
					<center><button class="btn btn-default">
					<img src="/images/upload.png" class="img-responsive" size="50%	"></button></center>
					<br>				
				</div>
			</div>
			
			<div class="col-lg-4">
				<div class="form-group">
					<label for="name">Name of Event</label>
					<input type="name" class="form-control" name="event_name" id="event_name">						
				</div>
				<div class="form-group">
					<label for="date">Date</label>
					<input type="date" class="form-control" name="date" id="date">	
				</div>
				<div class="form-group">
					<label for="venue">Venue</label>
					<input type="text" class="form-control" name="venue" id="venue">						
				</div>
				
				<label for="time">Time</label>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">	
							<input type="time" class="form-control" name="start_time" id="start_time">						
						</div>
					</div>
					<div class="col-lg-6">
						<form class="form">
							<div class="form-group">
								<input type="time" class="form-control" name="end_time" id="end_time">						
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>

		<div class="row" id="content">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" id="category">
							<option id="category">
							Academic
							</option>
							<option id="category">
							Health
							</option>
						</select>
					</div>
					<div class="form group">
						<label for="desc">Description</label>
						<textarea class="form-control" rows="3" id="description"></textarea>					
					</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
		</form>
					
		<div class="row" id="content" align="right">
			<div class="col-lg-6"></div>
			<div class="col-lg-4">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertRow">
					<h4><span class="glyphicon glyphicon-pencil"></span> Create Criteria</h4>
				</button>
			
				<button onclick="formSubmit()" type="submit" class="btn btn-success">
					<h4><span class="glyphicon glyphicon-save"></span> Save</h4>
				</button>
			</div>
			<div class="col-lg-2"></div>		
		</div>
	
	<!-- modal code -->
	<div id="insertRow" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background: #1da9d3; color:white;">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center"> Add Custom Criteria</h4>
				</div>
				<div class="modal-body">
					<div class="row" id="content">
						<div class="col-lg-12" id="content">
							<form class="form">
								<div class="form group">
									<label for="criteria">Criteria #1:</label>
									<input type="text" class="form-control" id="criteria">						
								</div>
								
								<br><br><a href="()addCriteria" style="color: blue">Add Another Criteria</a>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<center><button type="submit" class="btn btn-primary" data-dismiss="modal"><h4>Save Criteria</h4></button></center>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	function formSubmit() {
		$("#createEventForm").submit();
	}
	
	$("#createEventForm").submit(function(e) {
		e.preventDefault();
	
		var event_name = $("#event_name").val();
		var date = $("#date").val();
		var venue = $("#venue").val();
		var start_time = $("#start_time").val();
		var end_time = $("#end_time").val();
		var description = $("#description").val();
		var category = $("#category").val();
		
		$.post("<?=base_url("/evex/validate_create_event")?>", {'event_name': event_name, 'date': date, 'venue': venue, 'start_time': start_time, 'end_time': end_time, 'description': description, 'category': category, csrf_token_name: Cookies.get("csrf")}, function(data) {
			if(data != "1") {
				$('.error_msg').html(data);
			} else {
				$.post("<?=base_url("/evex/create_event")?>", {'event_name': event_name, 'date': date, 'venue': venue, 'start_time': start_time, 'end_time': end_time, 'description': description, 'category': category, csrf_token_name: Cookies.get("csrf")}, function(data) {
					alert("Created an Event");
				});
			}
		});
	});
</script>