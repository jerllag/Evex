<section class="no-margin container">
	<div class="row">
		<div class="col-lg-12">
			<h2 align="center">My Profile</h2>
		</div>
	</div>
	<div class="row" id="content">
		<div class="col-lg-3" align="center">
				<center><img class="img-responsive" width="95%" src="/images/users/mikkle.png"></center>
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
				<div class="col-lg-4"><b>Full Name:</b></div>
				<div class="col-lg-5 text-center">
					<?=$_SESSION['userdata']['fname']." ".$_SESSION['userdata']['lname']?>
				</div>
			</div> 
			<div class="row profile">
				<div class="col-lg-4"><b>Birthday</b></div>
				<div class="col-lg-5 text-center">
					<?php $date= strtotime($_SESSION['userdata']['birthday']);
					echo date("F d, Y", $date); ?>
				</div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Contact no.:</b></div>
				<div class="col-lg-5 text-center"><?=$_SESSION['userdata']['contact_num']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Email Address:</b></div>
				<div class="col-lg-5 text-center"><?=$_SESSION['userdata']['email_address']?></div>
			</div>
			<div class="row profile">
				<div class="col-lg-4"><b>Organization Name:</b></div>
				<div class="col-lg-5 text-center"><?=$_SESSION['userdata']['org_name']?></div>
			</div>
			<div class="row profile ">
				<div class="col-lg-4"><b>Organization Address:</b></div>
				<div class="col-lg-6 text-center"><?=$_SESSION['userdata']['org_address']?></div>
			</div>	
		</div>

		<div class="col-lg-offset-3 col-lg-9" id="content">
			<div class="row profile_header">
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

