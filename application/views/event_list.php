	<section class="no-margin" id="eventList">	
		<?php if (count($events) == 0) { ?>
		<h3>Event not found</h3>
		<?php } ?>
		<?php foreach($events as $event) { ?>
		<div class="row">
			<div class="col-lg-7">
				<h3><a style="color:black;" href="<?=base_url("/evex/event_details/".$event[3]."/".$event[1])?>"><?=$event[1]?></a></h3>
			</div>
			<!--<th class="col-lg-5"><h4><small><b>Date:</b>
			<i><?php $date= strtotime($event[5]);
			echo date("F d, Y (l)", $date); ?></i></small></h4></th>-->
		</div>
		<div class="row" id="content">
			<div class="col-lg-7">
				<center><img src="/images/Senpai.jpg" class="img-responsive" style="width:50%; height:50%"></center>
			</div>			
			<div class="col-lg-5" id="content">
				<!--<h4><b>Venue:</b> <?=$event[4]?>
				<br><b>Time:</b><?=date("g:i a", strtotime($event[6]))?> - <?=date("g:i a", strtotime($event[7]))?> -->
				<h4><strong>Created by:</strong> <?=$event[4]?> <?=$event[5]?> from <?=$event[6]?></h4>
				<h4><strong>Description:</strong> <?=$event[2]?></h4>
				<h4><strong>Number of Attendees:</strong> <?=$event[7]?></h4>
			
				<div class="row">
					<?php if(!isset($_SESSION['userdata'])) { ?>
					<div class="col-lg-3, col-sm-3">
						<a href="<?=base_url("/evex/event_details/".$event[3]."/".$event[1])?>" type="submit" class="btn btn-danger btn-block">
							<span class="glyphicon glyphicon-calendar"></span> RSVP
						</a>
					</div>
					<div class="col-lg-4, col-sm-4">
						<a onclick="giveFeedback(<?=$event['0']?>)" data-toggle="modal" data-target="#eventCode">
							<button type="submit" class="btn btn-warning btn-block">
								<span class="glyphicon glyphicon-comment"></span> Feedback
							</button>
						</a>
					</div>
					<?php } else { ?>
					<div class="col-lg-5 col-sm-5">
						<a href="<?=base_url("/evex/results/".$event[3]."/".$event[1])?>">
							<button type="submit" class="btn btn-success btn-block">
								<span class="glyphicon glyphicon-stats"></span> View Results
							</button>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	</section>