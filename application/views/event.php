	<section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-12">
				<h2 align="center"> Events </h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-7">
				<table class="table table-condensed">
					<tbody>
						<tr>
							<center>
								<img src="/images/event.png" class="img-responsive" size="40%">
								<?php if(isset($_SESSION['userdata'])) { ?> <!--admin only-->
								<h3>
									<a href="<?=base_url("/evex/create_event_view")?>" class="btn btn-info">
										<span class="glyphicon glyphicon-pushpin"></span> Create Your Own Event 
									</a>
								</h3>
							</center>
						</tr>
					</tbody>
				</table>
			</div>	
			<div class="col-lg-4">
				<div class="form-group">
					  <div class="input-group">
						  <div class="input-group-addon"><span class="glyphicon glyphicon-search"></div>
						  <input type="text" class="form-control" id="search" placeholder="Search Events">
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
		<!--end -->
		<?php } ?>
	</section>
	
	<section class="no-margin" id="section">	
		<!--begin-->
		<?php foreach($events as $event) { ?>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th class="col-lg-7"><h3><?=$event[2]?></span></h3>
							<!--img src="/images/Senpai.jpg" class="img-responsive" size="5%"--></th>
							<th class="col-lg-5"><h4><small><b>Date:</b>
							<i><?php $date= strtotime($event[4]);
							echo date("F d, Y (l)", $date); ?></i></small></h4></th>
						</tr/
					</thead>
					<tbody>
						<tr>
							<td>
								<h4><b>Venue:</b> <?=$event[3]?>
								<br><b> Date:</b> <?=$event[4]?> 
								<br><b>Time:</b> <?=$event[5]?> - <?=$event[6]?> 
								<br><b>Description:</b> <?=$event[7]?></h4>
							</td>
							<td>
								<div class="row">
									<div class="col-lg-3">
										<button type="submit" class="btn btn-danger">
											<span class="glyphicon glyphicon-calendar"></span> RSVP
										</button>
									</div>
									
									<div class="col-lg-4">
										<button type="submit" class="btn btn-warning">
											<a href="<?=base_url("/evex/feedback_view")?>">
												<span class="glyphicon glyphicon-comment"></span> Feedback
											</a>
										</button>
									</div>
										
									<div class="col-lg-5">
										<button type="submit" class="btn btn-success" disabled>
											<a href="<?=base_url("/evex/results_view")?>">
												<span class="glyphicon glyphicon-stats"></span> View Results
											</a>
										</button>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>	
			<div class="col-lg-2"></div>
		</div>
		<?php } ?>
		<!--end-->
</section>