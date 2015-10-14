<section class="no-margin">	
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 align="center">My Profile</h2>
		</div>
	</div>
	<div class="row">
	<div class="col-lg-2" align="center">
		<div class="row">
			<img class="img-circle" src="/images/users/jerome.png">
		</div>
		<div class="row">
			<h3><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</h3></button>
		</div>
		<div class="row">
			<h3><a type="submit" href="<?=base_url("/evex/change_password")?>" class="btn btn-danger"><span class="glyphicon glyphicon-lock"></span> Change Password</h3></a><br><br>
		</div>
	</div>
	<div class="col-lg-offset-1 col-lg-9">
		<table class="table table-default">
			<thead align="left">
				<tr class="row">
					<th class="col-lg-4"><h3><span class="glyphicon glyphicon-user"></span> Personal Information</h3></th>
					<th class="col-lg-8"></th>
				</tr> 
			</thead>
			<tbody align="left">
				<tr class="row">
					<td class="col-lg-3">Full Name: </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['fname']." ".$_SESSION['userdata']['lname']?></td>
				</tr>
				<tr class="row">
					<td class="col-lg-3">Birthday </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['birthday']?></td>
				</tr>
				<tr class="row">
					<td class="col-lg-3">Contact no.: </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['contact_num']?></td>
				</tr>
				<tr class="row">
					<td class="col-lg-3">Email Address: </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['email_address']?></td>
				</tr>
				<tr class="row">
					<td class="col-lg-3">Organization Name: </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['org_name']?></td>
				</tr>
				<tr class="row">
					<td class="col-lg-3">Organization Address: </td>
					<td class="col-lg-4 text-center"><?=$_SESSION['userdata']['org_address']?></td>
				</tr>
			</tbody>
		</table>
		
		<table class="table table-default">
			<thead align="left">
				<tr class="row">
					<th class="col-lg-4"><h3><span class="glyphicon glyphicon-calendar"></span> Events Created</h3></th>
					<th class="col-lg-8"></th>
				</tr> 
			</thead>
			<tbody align="left">
				<?php foreach($events as $event) { ?>
				<tr class="row">
					<td class="col-lg-4"><?=$event['event_name']?></td>
					<td class="col-lg-8"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<div class="col-lg-2"></div>
	</div>
	</div>
</div>
</section>