	<section class="no-margin" id="section">
		<div class="row">
			<h2 align="center"> Sign Up </h2>
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<form role="form" id="signUpForm" style="background-image: url(/images/res/bg.jpg); repeat: no-repeat; width=100%;">
					<div class="form-group">
						<label for="username"> Username: </label>
						<input type="text" class="form-control" id="username" required>
					</div>
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
					
					<div class="form-group">
						<label for="company_name"> Organization Name: </label>
						<input type="text" class="form-control" id="org_name">
					</div>
					<div class="form-group">
						<label for="company_address"> Organization Address: </label>
						<input type="text" class="form-control" id="org_address">
					</div>
					
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">	
								<label for="password">Password: </label>
								<input type="password"  class="form-control" id="pwd">
							</div>
						</div>
						<div class="col-lg-2"></div>	
						<div class="col-lg-6">
							<div class="form-group">
								<label for="password">Confirm Password: </label>
								<input type="password"  class="form-control" id="rpwd">
							</div>
						</div>
						
						<div class="row" id="content" align="center">
							<div class="col-lg-12">
								<a onclick="javascript: formSubmit()" class="btn btn-primary" role="button"><h4>I am an Organizer.</h4></a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</section>
	
	<script>	
		function formSubmit() {
			$("#signUpForm").submit();
		}
	
		$("#signUpForm").submit(function(e) {
			e.preventDefault();
			
			var username = $("#username").val();
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var birthday = $("#birthday").val();
			var contactNo = $("#contactno").val();
			var email = $("#email").val();
			var org_name = $("#org_name").val();
			var org_address = $("#org_address").val();
			var pass = $("#pwd").val();
			var rpass = $("#rpwd").val();
			
			$.post("<?=base_url("/evex/sign_up")?>", {'username': username, 'fname': fname, 'lname': lname, 'birthday': birthday, 'contactNo': contactNo, 'email': email, 'org_name': org_name, 'org_address': org_address, 'pass': pass, 'rpass': rpass, csrf_token_name: Cookies.get("csrf")}, function(data) {
				alert("Sign Up Successful!!");
			});
		});
	</script>


