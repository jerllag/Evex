	<section class="no-margin" id="section">
		<?php if(isset($_SESSION['register_success'])) { ?>
		<div class="row">
			<div class="col-lg-12 text-center">
				Succesfully registered!!
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-12" align="center">
				<img src="/images/Senpai.jpg" class="img-responsive" width="500px" height="500px">
				<h2 align="center"> <?=$event_name?> </h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" align="center">
				<h4><?=$description[0]['description']?></h4>
			</div>
		</div>
		<div class="container" align="center">
			<div class="row" id="content">
				<div class="col-lg-offset-1 col-lg-2">
					<div class="row" id="content">
						<strong>Date</strong>
					</div>
					<div class="row" id="content">
						<select onchange="getDateDetails()" id="date" class="form-control">
							<?php foreach($details as $date) { ?>
							<option><?=$date['date']?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-lg-9" id="dateDetails"></div>
			</div>
		</div>
	</section>
	
	<!---modal for register-->
	<div id="registerForm" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center"> Register for this Event</h4>
				</div>
				<div class="modal-body" id="content">
					<div class="error_msg"></div>
					<form role="form" id="registerForm">
						<label for="start_date">Full Name: </label>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text"  class="form-control" id="fname" name="fname" placeholder="Firstname">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text"  class="form-control" id="lname" name="lname" placeholder="Lastname">
								</div>
							</div>
						</div>
					
						<div class="form-group">
							<label for="birthday"> Birthday: </label>
							<input type="date" class="form-control" id="birthday" name="birthday" required>
						</div>
						<div class="form-group">
							<label for="contactno"> Contact No.: </label>
							<input type="number" class="form-control" id="contactno" name="contactno" required>
						</div>
						<div class="form-group">
							<label for="email"> Email Address: </label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<center>
						<button onclick="javascript: $('#registerForm').submit()" class="btn btn-info" role="button">
							<h4>I am an Attendee.</h4>
						</button>
					</center>
				</div>
			</div>
		</div>
	</div>
	
	<script>	
		$(window).load(function() {
			getDateDetails();
		});
		
		function registerAttendee($event_code) {
			$.post("<?=base_url("/evex/add_event_code/")?>", {'event_code': $event_code, csrf_token_name: Cookies.get("csrf")}, function() {});
		}
	
		function getDateDetails() {
			$.post("<?=base_url("/evex/get_date_details_f/")?>", {'date': $('#date').val(), 'username': "<?=$username?>", 'event_name': "<?=$event_name?>", csrf_token_name: Cookies.get("csrf")}, function(data) {
				$('#dateDetails').html(data);
			});
		}
	
		$("#registerForm").submit(function(e) {
			e.preventDefault();
			
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var birthday = $("#birthday").val();
			var contactNo = $("#contactno").val();
			var email = $("#email").val();
			
			$.post("<?=base_url("/evex/validate_register")?>", {'fname': fname, 'lname': lname, 'birthday': birthday, 'contactNo': contactNo, 'email': email, csrf_token_name: Cookies.get("csrf")}, function(data) {
				if(data != "1") {
					$('.error_msg').attr("class", "col-lg-12 error_msg alert alert-danger" );
					$('.error_msg').html(data);
				} else {
					$.post("<?=base_url("/evex/register")?>", {'fname': fname, 'lname': lname, 'birthday': birthday, 'contactNo': contactNo, 'email': email, csrf_token_name: Cookies.get("csrf")}, function(data) {
						alert("Register Successful!! A confirmation email has been sent to your email address.");
						location.reload(true);
					});
				}
			});
		});
	</script>


