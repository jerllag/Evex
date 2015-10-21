<section class="no-margin container">
	<div class="row">
		<div class="col-lg-12">
			<h2 align="center">My Profile</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2" align="center">
			<div class="row">
				<button class="btn btn-default circle prof_pic"><img class="img-circle" width="90%" src="/images/users/brian.jpg"></button>
			</div>
			<div class="row">
				<h3><button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit Profile </h3></button>
				<h3><a type="submit" href="<?=base_url("/evex/change_password")?>" class="btn btn-danger"><span class="glyphicon glyphicon-lock"></span> Change Password</h3></a><br><br>
			</div>
		</div>
		
		<div class="col-lg-offset-1 col-lg-9 col-lg-offset-2">
			<div class="row">
				<div class="col-lg-4">
					<h3><span class="glyphicon glyphicon-user"></span> Personal Information</h3>
				</div>
				<div class="col-lg-8"></div>
			</div>
			<div class="row profile">
				<div class="col-lg-3"><b>Full Name:</b></div>
				<div class="col-lg-4 text-center">
					<?=$_SESSION['userdata']['fname']." ".$_SESSION['userdata']['lname']?>
				</div>
			</div> 
			<div class="row profile">
				<div class="col-lg-3"><b>Birthday</b></div>
				<div class="col-lg-4 text-center"><?=$_SESSION['userdata']['birthday']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-3"><b>Contact no.:</b></div>
				<div class="col-lg-4 text-center"><?=$_SESSION['userdata']['contact_num']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-3"><b>Email Address:</b></div>
				<div class="col-lg-4 text-center"><?=$_SESSION['userdata']['email_address']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-3"><b>Organization Name:</b></div>
				<div class="col-lg-4 text-center"><?=$_SESSION['userdata']['org_name']?></div>
			</div>
			<div class="row profile ">
				<div class="col-lg-3"><b>Organization Address:</b></div>
				<div class="col-lg-4 text-center"><?=$_SESSION['userdata']['org_address']?></div>
			</div>	
		</div>
			
		<div class="col-lg-offset-1 col-lg-9 col-lg-offset-2">
			<div class="row">
				<div class="col-lg-4"><h3><span class="glyphicon glyphicon-calendar"></span> Events Created</h3></div>
				<div class="col-lg-8"></div>
			</div> 

			<?php foreach($events as $event) { ?>
			<div class="row">
				<div class="col-lg-4 event"><?=$event['event_name']?></div>
				<div class="col-lg-8"></div>
			</div>
			<?php } ?>
			</div>
		</div>
</section>

