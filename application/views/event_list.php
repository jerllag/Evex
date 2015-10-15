	<section class="no-margin" id="eventList">	
		<?php foreach($events as $event) { ?>
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th class="col-lg-7"><h3><a style="color:black;" href="<?=base_url("/evex/event_details/".$event[3]."/".$event[1])?>"> <?=$event[1]?></a></span></h3></th>
							<!--<th class="col-lg-5"><h4><small><b>Date:</b>
							<i><?php $date= strtotime($event[5]);
							echo date("F d, Y (l)", $date); ?></i></small></h4></th>-->
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<img src="/images/Senpai.jpg" class="img-responsive" style="width:600px; height:300px">
							</td>
							<td>
								<div class="row" id="content">
									<!--<h4><b>Venue:</b> <?=$event[4]?>
									<br><b>Time:</b> <?=date("g:i a", strtotime($event[6]))?> - <?=date("g:i a", strtotime($event[7]))?> -->
									<h4><b>Created by:</b> <?=$event[4]?> <?=$event[5]?> from <?=$event[6]?>
									<br><b>Description:</b> <?=$event[2]?></h4>
								</div>
								<div class="row">
									<?php if(!isset($_SESSION['userdata'])) { ?>
									<div class="col-lg-3">
										<a href="<?=base_url("/evex/event_details/".$event[3]."/".$event[1])?>" type="submit" class="btn btn-danger">
											<span class="glyphicon glyphicon-calendar"></span> RSVP
										</a>
									</div>
									<div class="col-lg-4">
										<a onclick="giveFeedback(<?=$event['0']?>)" data-toggle="modal" data-target="#eventCode">
											<button type="submit" class="btn btn-warning">
												<span class="glyphicon glyphicon-comment"></span> Feedback
											</button>
										</a>
									</div>
									<?php } else { ?>	
									<div class="col-lg-5">
										<a href="<?=base_url("/evex/results/".$event[3]."/".$event[1])?>">
											<button type="submit" class="btn btn-success">
												<span class="glyphicon glyphicon-stats"></span> View Results
											</button>
										</a>
									</div>
									<?php } ?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>	
			<div class="col-lg-2"></div>
		</div>
		<?php } ?>
	</section>
</div>
