	<section class="no-margin" id="section">
		<div class="row">
			<?php if(!isset($_SESSION['userdata'])) {?>
				<h2 align="center"> Recover Password </h2>
			<?php } else { ?>
				<h2 align="center"> Change Password </h2>
			<?php } ?>
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12 error_msg"></div>
				</div>
				<form role="form" id="changePassword">
					<?php if(!isset($_SESSION['userdata'])) {?>
					<div class="form-group">
						<label for="email">Email: </label>
						<input type="email" class="form-control" id="email">
					</div>
					<?php } else {?>
					<?php if(!isset($_SESSION['forgotPasswordEmail'])) { ?>
					<div class="form-group">
						<label for="current_password">Current Password: </label>
						<input type="password" class="form-control" id="cpwd">
					</div>
					<?php } ?>
					
					<div class="form-group">	
						<label for="new_password">New Password: </label>
						<input type="password"  class="form-control" id="npwd">
					</div>
				
					<div class="form-group">
						<label for="re_password">Confirm New Password: </label>
						<input type="password"  class="form-control" id="rpwd">
					</div>
					<?php } ?>
						<div class="row" id="content" align="center">
							<div class="col-lg-12">
								<?php if(!isset($_SESSION['userdata'])) {?>
									<a onclick="javascript: formSubmit()" class="btn btn-primary" role="button"><h4>Reset Password</h4></a>
								<?php } else { ?>
									<a onclick="javascript: formSubmit()" class="btn btn-primary" role="button"><h4>Save Password</h4></a>
								<?php } ?>
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
			$("#changePassword").submit();
		}
	
		$("#changePassword").submit(function(e) {
			e.preventDefault();
			
			var formdata = {
				<?php if(!isset($_SESSION['userdata'])) {?>
				'email': $("#email").val(),
				<?php } else { ?>
				'curpass': $("#cpwd").val(),
				'npass': $("#npwd").val(),
				'rpass': $("#rpwd").val(),
				<?php } ?>
				csrf_token_name: Cookies.get("csrf")
			};
			
			$.post("<?=base_url("/evex/validate_change_password")?>", formdata, function(data) {
				if(data != "1") {
					$('.error_msg').attr("class", "col-lg-12 error_msg alert alert-danger" );
					$('.error_msg').html(data);
				} else {
					$.post("<?=base_url("/evex/change_password_f")?>", formdata, function(data) {
						<?php if(!isset($_SESSION['userdata'])) {?>
						alert("An email has been sent to your email address");
						<?php } else { ?>
						alert("Password changed successfully");
						<?php if(!isset($_SESSION['forgotPasswordEmail'])) {?>
							window.location = "<?=base_url("/evex/profile")?>";
						<?php } else { ?>
							window.location = "<?=base_url("/evex")?>";
						<?php } ?>
						<?php } ?>
					});
				}
			});
		});
	</script>


