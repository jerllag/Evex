	<section class="no-margin" id="section">
		<div class="row">
			<h2 align="center"> Register </h2>
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<form role="form" id="registerForm">
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
	
	<!--section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="form-group">
					<label for="eventCode" align="center"> Event Code: </label>
					<input type="text" class="form-control" id="eventCode">
			</div>
			<div class="col-lg-3"></div>
		</div>
	</section-->
	
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


