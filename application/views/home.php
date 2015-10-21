	<section class="page-header">
		<div class="row">
				<?php if(!isset($_SESSION['userdata'])) { ?>
				<div class="col-lg-9" align="center">
				<?php } else { ?>
				<div class="col-lg-12" align="center">
				<?php } ?>
					<!--img src="/images/res/banner.png" class="img-responsive"-->
					  <div id="evexSlide" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						  <li data-target="#evexSlide" data-slide-to="0" class="active"></li>
						  <li data-target="#evexSlide" data-slide-to="1"></li>
						  <li data-target="#evexSlide" data-slide-to="2"></li>
						  <li data-target="#evexSlide" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner" role="listbox">
						  <div class="item active">
							<img src="/images/res/info1.png" class="img-responsive">
						  </div>

						  <div class="item">
							<img src="/images/res/info2.png" class="img-responsive">
						  </div>
						
						  <div class="item">
							<img src="/images/res/info3.png" class="img-responsive">
						  </div>

						  <div class="item">
							<img src="/images/res/info4.png" class="img-responsive">
						  </div>
						  
						  <!-- Left and right controls -->
							<a class="left carousel-control" href="#evexSlide" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#evexSlide" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<br>
				</div>
				
				<?php if(!isset($_SESSION['userdata'])) { ?>
				<div class="col-lg-3" align="left">
					<h2 align="center"><strong>Login<strong></h2>
					<div class="error_msg"></div>
					<form role="form" id="logInForm">
						<div class="form-group">
							<label for="studno"> Username: </label>
							<input type="text" class="form-control" id="studno">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" id="pwd">
							<a href="<?=base_url("/evex/change_password")?>" style="color: #207dba">Forgot your password? </a>
						</div>
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</lable>
						</div>
						<button id="button" type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
				<?php } ?>
			</div>
		</div>	
	</section>

	<section class="no-margin container" id="section">	
		<div class="row">
				<div class="col-lg-4, col-sm-3" align="center">
					<img src="/images/gang_of_four.png" class="img-responsive" width="90%">
				</div>
				<div class="col-lg-8">
					<p class="lead" align="justify"><strong>An Event Evaluator Expert System</strong>
					<br><small> It is also known as the <i>EVEX</i>. A case study in Introduction to Mobile Application Development (CS 414A3 and CS 414A3L) 
					and Advanced Mobile Application Development (CS CS 422A4 and CS 422A4L) created by the the developer team, The Gang of Four, composed of: 				
					
					<div class="row" align="center">
						<div class="col-lg-3, col-sm-3">
							<img src="/images/users/jerome.png" class="img-circle" width="90%"> 
							<br><h5 id="jerome">Jerome Ian C. Llaguno</h5>
							Leader | Lord of Backend 										
						</div>
						<div class="col-lg-3, col-sm-3">
							<img src="/images/users/brian.jpg" class="img-circle" width="90%"> 
							<br><h4>Brian B. Caldona</h4>
							Master of Documentation
						</div>
						<div class="col-lg-3, col-sm-3">
							<img src="/images/users/mikkle.png" class="img-circle" width="90%">
							<br><h4>Mikkle P. Bondoc</h4>
							App Front-end Developer
						</div>
						<div class="col-lg-3, col-sm-3">
							<img src="/images/users/marnie.jpg" class="img-circle" width="90%">  
							<br><h5>Marnie Bright R. Palapar</h5>
							Web Front-end Developer
						</div>
					</p>
				</div>
			</div>
		</section>
		
	
	
	<script>
		
		$("#logInForm").submit(function(e) {
			e.preventDefault();
			$.post("<?=base_url("/evex/log_in")?>", {'username': $("#studno").val(), 'password': $("#pwd").val(), csrf_token_name: Cookies.get("csrf")}, function(data) {
				if(data > 0) {
					window.location = "<?=base_url("/evex/event")?>";
				} else {
					$('.error_msg').attr("class", "col-lg-12 error_msg alert alert-danger" );
					$('.error_msg').html("Invalid username or password.");
				}
			});
		});
		
	</script>