	<section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-12">
				<h2 align="center">Create Your Event</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-offset-2 col-lg-4 error_msg"></div>
		</div>
		<form class="form" id="createEventForm" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="row" id="content">
			<div class="col-lg-offset-2 col-lg-4">	
				<div class="form group">
					<center>
						<input type="file" id="eventPhoto" name="userfile" />
						<a onclick="openEventPhoto()" class="btn btn-default">
							<img src="/images/upload.png" class="img-responsive" size="100%">
						</a>
					</center>
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
						<div class="form-group">
							<input type="time" class="form-control" name="end_time" id="end_time">						
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>

		<div class="row" id="content">
			<div class="col-lg-offset-2 col-lg-8">
				<div class="form-group">
					<label for="topic">Topic / Theme</label>
					<input type="topic" class="form-control" name="topic" id="topic">						
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<select class="form-control" id="category">
						<option>Arts</option>
						<option>Culture</option>
						<option>Education</option>
						<option>Entertainment</option>
						<option>Food</option>
						<option>Health & Lifestyle</option>
						<option>Photography</option>
						<option>Sports</option>
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
					
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">
				<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#criteriaModal">
					<h4><span class="glyphicon glyphicon-pencil"></span> Create Criteria</h4>
				</button>
				<button onclick="formSubmit()" type="submit" class="btn btn-success btn-block">
					<h4><span class="glyphicon glyphicon-save"></span> Save</h4>
				</button>
			</div>
			<br>
		</div>	
		</div>
	
	<!-- modal code -->
	<div id="criteriaModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center"> Event Criteria</h4>
				</div>
				<div class="modal-body" id="criteria_modal">
					<div class="container-fluid">
					<div class="row" id="content">
						<div class="col-lg-11" id="content">
							<form id="criteriasForm">
								<div class="default_criterias"></div>
								<div id="added_criterias"></div>
								<div class="row form-group">
									<div class="col-lg-12">
									<a href="#" onclick="addCriteriaFields()" style="color: blue">Add Custom Criteria</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					</div>
				</div>
				<div class="modal-footer">
					<center><button onclick="submitCriterias()" class="btn btn-primary" data-dismiss="modal"><h4>Save Criteria</h4></button></center>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	var criterias_array = [];
	var ctr = 0;
	
	$(window).load(function() {
		getCriterias();
	});
	
	function openEventPhoto() {
		$('#eventPhoto').click();
	}
	
	function addCriteriaFields() {
		$('#added_criterias').append('<div class="row form-group"><div class="col-lg-11"><input name="criteria'+ctr+'" type="text" class="criteria form-control" /></div><div class="col-lg-1"><a onclick="removeCriteriaFields('+ctr+')" class="close"> &times; </a></div></div>')
		ctr++;
	}
	
	function removeCriteriaFields(index) {
		var list = document.getElementById("added_criterias");
		list.removeChild(list.childNodes[index]);
	}
	
	function submitCriterias() {
		var criterias = document.getElementsByClassName('criteria');
		for(var i = 0; i < criterias.length; i++) {
			criterias_array.push(criterias[i]);
		}
	}

	function getCriterias() {
		$.get("<?=base_url("/evex/default_criterias")?>", function($data) {
			$('.default_criterias').html($data);
		});
	}
	
	function removeCriteria(key) {
		$.post("<?=base_url("/evex/remove_criteria")?>", {'key': key, csrf_token_name: Cookies.get("csrf")}, function(data) {
			getCriterias();
		});
	}

	function formSubmit() {
		$("#createEventForm").submit();
	}
	
	$("#createEventForm").submit(function(e) {
		e.preventDefault();
		
		var datas = {
			'event_name': $("#event_name").val(),
			'date': $("#date").val(),
			'venue': $("#venue").val(),
			'start_time': $("#start_time").val(),
			'end_time': $("#end_time").val(),
			'description': $("#description").val(),
			'category': $("#category").val(),
			csrf_token_name: Cookies.get("csrf")
		};
		
		//$.post("<?=base_url("/evex/validate_create_event")?>", {'event_name': event_name, 'date': date, 'venue': venue, 'start_time': start_time, 'end_time': end_time, 'description': description, 'category': category, csrf_token_name: Cookies.get("csrf")}, function(data) {
		$.post("<?=base_url("/evex/validate_create_event")?>", datas, function(data) {
			if(data != "1") {
				$('.error_msg').html(data);
			} else {
				$.post("<?=base_url("/evex/create_event_f")?>", datas, function(data) {
					var criterias = $('#criteriasForm').serializeArray();
					datas = {'event_name': $("#event_name").val(), 'criterias': JSON.stringify(criterias), csrf_token_name: Cookies.get("csrf")};
					$.post("<?=base_url("/evex/event_criteria")?>", datas, function(data) {
						alert("Created an Event");
					});
				});
			}
		});
	});
</script>