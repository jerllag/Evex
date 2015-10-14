<?php foreach($criterias as $i=>$criteria) { ?>
<div class="row form-group">
	<div class="col-lg-11">
	<label for="criteria">Criteria #<?=$i+1?>: <?=$criteria?></label>
	</div>
	<div class="col-lg-1">
	<a onclick="removeCriteria(<?=$i?>)" class="close"> &times; </a>
	</div>
</div>
<?php } ?>