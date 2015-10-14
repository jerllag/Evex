<section class="no-margin">	
<div class="row">
		<div class="col-lg-12">
			<h2 align="center">My Profile</h2>
		</div>
	<div class="col-lg-2"></div>
	<div class="col-lg-2" align="center">
		<img class="img-circle" src="/images/users/jerome.png">
		<h3><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</h3></button>
		<h3><a type="submit" href="<?=base_url("/evex/change_password")?>" class="btn btn-danger"><span class="glyphicon glyphicon-lock"></span> Change Password</h3></a><br><br>
	</div>
	<div class="col-lg-6">
		<table class="table table-default">
			<thead align="left">
				<tr>
					<th class="col-lg-4"><h3><span class="glyphicon glyphicon-user"></span> Personal Information</h3></th>
					<th class="col-lg-2"></th>
				</tr> 
			</thead>
			<tbody align="left">
				<tr>
					<td class="col-lg-2">Full Name: </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['fname']." ".$_SESSION['userdata']['lname']?></td>
				</tr>
				<tr>
					<td class="col-lg-2">Birthday </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['birthday']?></td>
				</tr>
				<tr>
					<td class="col-lg-2">Contact no.: </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['contact_num']?></td>
				</tr>
				<tr>
					<td class="col-lg-2">Email Address: </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['email_address']?></td>
				</tr>
				<tr>
					<td class="col-lg-2">Organization Name: </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['org_name']?></td>
				</tr>
				<tr>
					<td class="col-lg-2">Organization Address: </td>
					<td class="col-lg-4"><?=$_SESSION['userdata']['org_address']?></td>
				</tr>
			</tbody>
		</table>
		
		<table class="table table-default">
			<thead align="left">
				<tr>
					<th class="col-lg-4"><h3><span class="glyphicon glyphicon-calendar"></span> Events Created</h3></th>
					<th class="col-lg-2"></th>
				</tr> 
			</thead>
			<tbody align="left">
				<?php foreach($events as $event) { ?>
				<tr>
					<td class="col-lg-2"><?=$event['event_name']?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<div class="col-lg-2"></div>
	</div>
</section>