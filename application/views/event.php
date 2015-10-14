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

			<div class="col-lg-4">
				<div class="form-group">

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
			<div class="col-lg-2"></div>
		</div>
		<!--end -->
		
	</section>
		
	<script>
		$("#search").keyup(function(){
			$.post("<?=base_url("/evex/search_event_f")?>",{'event_name': $('#search').val(), csrf_token_name: Cookies.get("csrf")}, function(data) {
				$('#eventList').html(data);
			});
		});
	</script>