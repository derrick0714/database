<div class="container div_500px">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<center><h2><?=$result['pdesc']?></h2></center>
		</div>
	</div>
	<div class="row col-md-6 col-md-offset-3">
		<div class="thumbnail">
			<img data-src="holder.js/400x300" src="<?=$result['store_url']?>">
			<div class="caption">
				<p class="my_divide"></p>
				<p class="h5">
					<span class="board_span glyphicon glyphicon-heart"></span>(<?php if( !isset($like_num)) echo "0";else echo $like_num; ?>)
					<a href="<?=base_url()."like/add/".$result['pid']."/".$bid."/".$GLOBALS['USER']['id']?>">like</a>
					<span class="glyphicon glyphicon-pushpin"></span>
					<a href="#" data-toggle="modal" data-target="#pin_url" onclick="pin_url('<?=$result['pid']?>')">pin</a>
					<span class="glyphicon glyphicon-remove"></span>
					<a href="<?=base_url()."pin/delete/".$result['pid']."/".$bid?>">delete</a>
				</p>
			</div>
		</div>
	</div>
	<div class="row col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Comment</div>
			
			<div class="panel-body">
			<!-- List group -->
			<ul class="list-group">
			<?php
			foreach ($commnet_result->result() as $row)
			{
			?>
				<li class="list-group-item"><a href="<?=base_url()."user/id/".$row->uid?>"><?=$row->first_name?></a> : <?=$row->content?></li>
			<?php
			}
			?>
			</ul>
			</div>
		</div>
	</div>
	<div class="row col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php
			if(!$public && !$friend)
			{
			?>
				<h3 class="panel-title">This is in a priavte board, you can't commnet</h3>
			<?php
			}else{
			?>
				<h3 class="panel-title">Say something:</h3>
			<?php
			}
			?>
				
			</div>
			<form role="form" action="<?=base_url()."comment/add/".$result['pid']."/".$bid?>" method="post" >
				<div class="panel-body">
				<textarea class="form-control" rows="4" name=commnet></textarea>
				</div>
				<div class="panel-body">
				<button type="submit" class="btn btn-default" <?php if(!$public && !$friend) echo "disabled";?>>Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>