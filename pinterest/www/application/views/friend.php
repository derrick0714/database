<div class="container div_500px">
<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<center><h2>FriendShip</h2></center>
		</div>
	</div>
<?php
		$row_num = 4;
		$counter= 0;
		foreach ($request_result->result() as $row)
		{
			//$row->bid;
			//$row->bname;
			//$row->bdesc;
			//$row->public;

			if($counter % $row_num == 0)
			{
	?>			
				<div class="row">
	<?php
			}
	?>
			<div class="col-sm-3">
				<div class="thumbnail">
					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="http://www.martinspribble.com/wp-content/uploads/2012/01/2012-01_friendrequest.jpg" >					
					<div class="caption">
						<h3>From: <?=$row->first_name?></h3>
						<p><a href = "<?=base_url().'firend/accept/'.$row->uid?>">accpect</a> <a href = "<?=base_url()."firend/decline/".$row->uid?>">decline</a></p>
					</div>
				</div>
			</div>
	<?php
			if($counter % $row_num == $row_num -1)
			{
	?>			
				</div>
	<?php
			}	
			$counter++;
		}
	?>

<?php
		$row_num = 4;
		$counter= 0;
		foreach ($friend_result->result() as $row)
		{
			//$row->bid;
			//$row->bname;
			//$row->bdesc;
			//$row->public;

			if($counter % $row_num == 0)
			{
	?>			
				<div class="row">
	<?php
			}
	?>
			<div class="col-sm-3">
				<div class="thumbnail">
					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="http://blog.clarity.fm/wp-content/uploads/2012/11/quality-friends.jpg" >					
					<div class="caption">
						<h3>From: <?=$row->first_name?></h3>
						<p><a href = "<?=base_url().'firend/delete/'.$row->uid?>">delete</a></p>
					</div>
				</div>
			</div>
	<?php
			if($counter % $row_num == $row_num -1)
			{
	?>			
				</div>
	<?php
			}	
			$counter++;
		}
	?>
</div>
</div>