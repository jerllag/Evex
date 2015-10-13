	<section class="no-margin" id="section">
		<div class="row">
			<h2 align="center"> Register </h2>
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<form role="form" id="registerForm" style="background-image: url(/images/res/bg.jpg); repeat: no-repeat; width=100%;">
					<label for="start_date">Full Name: </label>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text"  class="form-control" id="fname" placeholder="Firstname">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text"  class="form-control" id="lname" placeholder="Lastname">
							</div>
						</div>
					</div>
				
					<div class="form-group">
						<label for="birthday"> Birthday: </label>
						<input type="date" class="form-control" id="birthday" required>
					</div>
					<div class="form-group">
						<label for="contactno"> Contact No.: </label>
						<input type="number" class="form-control" id="contactno" required>
					</div>
					<div class="form-group">
						<label for="email"> Email Address: </label>
						<input type="email" class="form-control" id="email" required>
					</div>
						
						<div class="row" id="content" align="center">
							<div class="col-lg-12">
								<a onclick="javascript: formSubmit()" class="btn btn-info" role="button"><h4>I am an Attendee.</h4></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	

	<!---modal-->
	<div id="eventCode" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background: #1da9d3; color:white;">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center"> Event Code</h4>
				</div>
				<div class="modal-body">
					<div class="row" id="content">
						<div class="col-lg-12" id="content">
							<form class="form">
								<div class="form group">
									<label for="criteria" align="center">Enter Event Code:</label>
									<input type="text" class="form-control" id="code">						
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
	
	<script>	
		function formSubmit() {
			$("#registerForm").submit();
		}
	
		$("#registerForm").submit(function(e) {
			e.preventDefault();
			
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var birthday = $("#birthday").val();
			var contactNo = $("#contactno").val();
			var email = $("#email").val();
			
			$.post("<?=base_url("/evex/register")?>", {'fname': fname, 'lname': lname, 'birthday': birthday, 'contactNo': contactNo, 'email': email, csrf_token_name: Cookies.get("csrf")}, function(data) {
				alert("Register Successful!!");
			});
		});
	</script>


