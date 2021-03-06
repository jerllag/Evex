	<section class="no-margin" id="section">
		<div class="row" id="section">
				<div class="col-lg-7" align="center">
					<!--carousel-->
					<br><p align="center"><img src="/images/banner.png" class="img-responsive"></p>
				</div>
				<div class="col-lg-2"></div>
				<?php if(!isset($_SESSION['userdata'])) { ?>
				<div class="col-lg-3" align="left">
					<h2 align="center"><strong>Login<strong></h2>
						<form role="form" id="logInForm">
							<div class="form-group">
								<label for="studno"> Username: </label>
								<input type="text" class="form-control" id="studno">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" id="pwd">
								<a href="changePassword.php" style="color: black">Forgot your password? </a>
							</div>
							<div class="checkbox">
								<label><input type="checkbox"> Remember me</lable>
							</div>
							<button id="button" type="submit" class="btn btn-primary">Login</button>
						</form>
				</div>
				<?php } ?>
			</div>
	</section>
	
	<section class="no-margin" id="section">	
		<div class="row">
				<div class="col-lg-4" align="center">
					<img src="/images/gang_of_four.png" class="img-responsive">
				</div>
				<div class="col-lg-8">
					<p class="lead" align="justify"><strong>The Event Management Expert System</strong>
					<br><small> It is also known as the <i>EVEX</i>. A case study in Introduction to Mobile Application Development (CS 414A3 and CS 414A3L) 
					and Advanced Mobile Application Development (CS CS 422A4 and CS 422A4L) created by the the developer team, The Gang of Four, composed of: 				
					
					<div class="row" align="center">
						<div class="col-lg-3">
							<img src="/images/users/jerome.png" class="img-circle" width="90%"> 
							<br><h4 id="jerome">Jerome Ian C. Llaguno</h4>
							Leader | Lord of Backend 										
						</div>
						<div class="col-lg-3">
							<img src="/images/users/brian.jpg" class="img-circle" width="90%"> 
							<br><h4>Brian B. Caldona</h4>
							Master of Documentation
						</div>
						<div class="col-lg-3">
							<img src="/images/users/mikkle.png" class="img-circle" width="90%">
							<br><h4>Mikkle P. Bondoc</h4>
							App Front-end Developer
						</div>
						<div class="col-lg-3">
							<img src="/images/users/marnie.jpg" class="img-circle" width="90%">  
							<br><h5>Marnie Bright R. Palapar</h5>
							Web Front-end Developer
						</div>
					</p>
				</div>
			</div>
		</section>
	</div>
	<!--end-->
	
	<script>
		$("#logInForm").submit(function(e) {
			e.preventDefault();
			$.post("<?=base_url("/evex/log_in")?>", {'username': $("#studno").val(), 'password': $("#pwd").val(), csrf_token_name: Cookies.get("csrf")}, function(data) {
				if(data > 0) {
					window.location = "<?=base_url("/evex/event")?>";
				}
			});
		});
	</script>

	