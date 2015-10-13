	<section class="no-margin" id="section">
		<div class="row">
			<h2 align="center"> Change Password </h2>
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12 error_msg"></div>
				</div>
				<form role="form" id="signUpForm" style="background-image: url(/images/res/bg.jpg); repeat: no-repeat; width=100%;">
					<?php if(!isset($_SESSION['userdata'])) {?>
					<div class="form-group">
						<label for="email">Email: </label>
						<input type="email" class="form-control" id="email">
					</div><?php } ?>
					
					<div class="form-group">
						<label for="current_password">Current Password: </label>
						<input type="password" class="form-control" id="cpwd">
					</div>
					
					<div class="form-group">	
						<label for="new_password">New Password: </label>
						<input type="password"  class="form-control" id="npwd">
					</div>
				
					<div class="form-group">
						<label for="re_password">Confirm Password: </label>
						<input type="password"  class="form-control" id="rpwd">
					</div>
				
						<div class="row" id="content" align="center">
							<div class="col-lg-12">
								<a onclick="javascript: formSubmit()" class="btn btn-primary" role="button"><h4>Save Password.</h4></a>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</section>
	
	<section class="no-margin" id="section">
		<div class="row" id="content"></div>
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
			
			$.post("<?=base_url("/evex/validate_sign_up")?>", {'username': username, 'fname': fname, 'lname': lname, 'birthday': birthday, 'contact_no': contactNo, 'email': email, 'org_name': org_name, 'org_address': org_address, 'pass': pass, 'rpass': rpass, csrf_token_name: Cookies.get("csrf")}, function(data) {
				if(data != "1") {
					$('.error_msg').html(data);
				} else {
					$.post("<?=base_url("/evex/sign_up")?>", {'username': username, 'fname': fname, 'lname': lname, 'birthday': birthday, 'contact_no': contactNo, 'email': email, 'org_name': org_name, 'org_address': org_address, 'pass': pass, 'rpass': rpass, csrf_token_name: Cookies.get("csrf")}, function(data) {
						alert("Sign Up Successful!! An email has been sent to your email address");
						location.reload(true);
					});
				}
			});
		});
	</script>


