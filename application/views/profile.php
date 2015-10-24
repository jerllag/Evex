<section class="no-margin container">
	<div class="row">
		<div class="col-lg-12">
			<h2 align="center">My Profile</h2>
		</div>
	</div>
	<div class="row" id="content">
		<div class="col-lg-3" align="center">
				<center><img class="img-responsive" width="95%" src="/images/users/mikkle.png"></center>
				<h4 class="well">Username</h4>
			
				<div class="row" align="center">
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a href= ""><img width="95%" class="img-responsive" src="/images/res/fb.png"></a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a href= ""><img width="95%" class="img-responsive" src="/images/res/twitter.png"></a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a href= ""><img width="95%"  class="img-responsive" src="/images/res/linkedin.png"></a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<a href= ""><img width="95%"  class="img-responsive" src="/images/res/google+.png"></a>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-edit"></span> Edit Profile</button>
				<a type="submit" href="<?=base_url("/evex/change_password")?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-lock"></span> Change Password</a>
				<br>
		</div>
		
		<div class="col-lg-9">
			<div class="row profile_header">
				<div class="col-lg-8">
					<h3><span class="glyphicon glyphicon-user"></span> About Me </h3>
				</div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Full Name</b></div>
				<div class="col-lg-5 text-center">
					<input type="text" class="form-control" id="fullname" placeholder="old value">
					<?//=$_SESSION['userdata']['fname']." ".$_SESSION['userdata']['lname']?>
				</div>
			</div> 
			<div class="row profile">
				<div class="col-lg-4"><b>Birthday</b></div>
				<div class="col-lg-5 text-center">
					<?//php $date= strtotime($_SESSION['userdata']['birthday']);
					//echo date("F d, Y", $date); ?>
					<input type="date" class="form-control" id="bday" placeholder="old value">
					
				</div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Contact no.</b></div>
				<div class="col-lg-5 text-center">
				<input type="number" class="form-control" id="contact" placeholder="old value">
					<?//=$_SESSION['userdata']['contact_num']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Email Address</b></div>
				<div class="col-lg-5 text-center">
				<input type="email" class="form-control" id="email" placeholder="old value">
				<?//=$_SESSION['userdata']['email_address']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Organization Name</b></div>
				<div class="col-lg-5 text-center">
				<input type="text" class="form-control" id="org_name" placeholder="old value">
				<?//=$_SESSION['userdata']['org_name']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Organization Address</b></div>
				<div class="col-lg-7 text-center">
				<input type="text" class="form-control" id="org_address" placeholder="old value">
				<?//=$_SESSION['userdata']['org_address']?></div>
			</div>
			
			<div class="row profile">
				<div class="col-lg-4"><b>Social Media</b></div>
				<div class="col-lg-7 text-center">
					<div class="input-group">
						<div class="input-group-addon">www.fb.com/</div>
						<input type="text" value="marniebright" class="form-control" id="fb">
					</div>
					<div class="input-group">
						<div class="input-group-addon">www.twitter.com/</div>
						<input type="text" class="form-control" id="twitter">
					</div>
					<div class="input-group">
						<div class="input-group-addon">plus.google.com/+</div>
						<input type="text" class="form-control" id="gplus">
					</div>
					<div class="input-group">
						<div class="input-group-addon">www.linkedin.com/</div>
						<input type="text" class="form-control" id="linkedin">
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-lg-9">
			<br><div class="row profile_header">
				<div class="col-lg-8"><h3><span class="glyphicon glyphicon-calendar"></span> Events Involved</h3></div>
			</div> 

			<?php foreach($events as $event) { ?>
			<div class="row event">
				<div class="col-lg-4 "><?=$event['event_name']?></div>
				
			</div>
			<?php } ?>
			
			</div>
		</div>
</section>

