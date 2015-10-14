<div class="container">
	<section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-12">
				<h2 align="center"> Events </h2>
			</div>
		</div>
	</section>
	
	<section class="no-margin" id="section">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-6">
				<img src="/images/event.png" class="img-responsive" size="40%">
				<?php if(isset($_SESSION['userdata'])) { ?> <!--admin only-->
				<h3>
					<a href="<?=base_url("/evex/create_event")?>" class="btn btn-info">
						<span class="glyphicon glyphicon-pushpin"></span> Create Your Own Event 
					</a>
				</h3>
				<?php } ?>
			</div>
			<div class="col-lg-5" id="content">
				<div class="row form-group">
					<div class="input-group">
						<div class="input-group-addon"><span class="glyphicon glyphicon-search"></div>
						<input type="text" class="form-control" id="search" placeholder="Search Events">
					</div>
				</div>
				<div class="row">
					<div class="button-group">
						<button class="btn btn-default"><span class="glyphicon glyphicon-sort-by-alphabet"></span> Sort by Category</button>
						<button class="btn btn-default"><span class="glyphicon glyphicon-sort-by-order"></span> Sort by No. of Participants</button>
					</div>
				</div>
			</div>
		</div>
		<!--end -->
		
	</section>
	
	<!---modal for event code-->
	<div id="eventCode" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background: #1da9d3; color:white; width="">
					<button type="button" class="close" data-dismiss="modal"> &times; </button>
					<h4 align="center">Feedback</h4>
				</div>
				<div class="modal-body" id="content">
					<div class="error_msg"></div>
					<form class="form" id="eventCodeForm">
						<div class="form-group">
							<label>Email Address</label>
							<input type="email" class="form-control" id="email" name="email">						
						</div>
						<div class="form-group">
							<label>Event Code</label>
							<input type="text" class="form-control" id="event_code" name="event_code">						
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<center>
					<button onclick="javascript: $('#eventCodeForm').submit();" class="btn btn-info btn-lg">Save</button>
					</center>
				</div>
			</div>
		</div>
	</div>
		
	<script>
		$("#search").keyup(function(){
			$.post("<?=base_url("/evex/search_event_f")?>",{'event_name': $('#search').val(), csrf_token_name: Cookies.get("csrf")}, function(data) {
				$('#eventList').html(data);
			});
		});
		
		$('#eventCodeForm').submit(function(e) {
			e.preventDefault();
			$.post("<?=base_url("/evex/validate_event_code")?>", {'event_code': $('#event_code').val(), 'email': $('#email').val(), csrf_token_name: Cookies.get("csrf")}, function(data) {
				if(data != "1") {
					$('#eventCode .error_msg').html(data);
				} else {
					window.location = "<?=base_url("/evex/feedback")?>";
				}
			});
		});
		
		function giveFeedback($event_num) {
			$.post("<?=base_url("/evex/add_event_num/")?>", {'event_num': $event_num, csrf_token_name: Cookies.get("csrf")}, function() {});
		}
	</script>