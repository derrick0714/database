
<div class="container div_500px">
	<div class="row div_header">
		<div>
			<center><h1><a href= "<?=base_url()."user/id/".$onwer[0]->uid?>"><?=$onwer[0]->first_name?></a>'s Board: <?=$board['bname']?></h1></center>
		</div>
		<div>
			<center><h5><?=$board['bdesc']?></h5></center>
		</div>
	</div>

	<!--nav bar-->
	<div class="row div_content">
		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#"><?=$pin_result->num_rows();?> Pins</a></li>
				</ul>
				<?php
					if($isself == true)
					{ 
				?>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="#" data-toggle="modal" data-target="#pin_url" onclick="pin_url2()">Pin</a></li>
				</ul>
				<?php
					}else if($isfellow==false){ 
				?>
					<ul class="nav navbar-nav navbar-right">
					<li ><a href="#" data-toggle="modal" data-target="#fellow_board" onclick="fellow_board2('<?=$board['bid']?>')">Fellow this board</a></li>
					</ul>
				<?php
					}else{
				?>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="#">Already Fellowed</a></li>
				</ul>
				<?php
					}
				?>
			</div>
		</nav>
	</div>

	<?php
		$row_num = 4;
		$counter= 0;
		foreach ($pin_result->result() as $row)
		{
			//$row->pid;
			//$row->pdesc;
			//$row->store_url;
			//$row->scource_url;
			//$row->tags
			//$row->bid
			//$row->timestamp

			if($counter % $row_num == 0)
			{
	?>			
				<div class="row">
	<?php
			}
	?>
			<div class="col-sm-3">
				<div class="thumbnail">

					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="<?=$row->store_url?>" onclick="showpic('<?=$row->pid?>','<?=$row->bid?>')">
					
					<div class="caption">
						<h4><?=$row->pdesc?></h4>
						<h5> tags: <?=$row->tags?></h5>
						<h5> pinned at <?=$row->timestamp?></h5>
						<p class="my_divide"></p>
						<p class="h5">
						<span class="board_span glyphicon glyphicon-heart"></span>(<?php if( !isset($like[$row->pid])) echo "0";else echo $like[$row->pid]; ?>)
						<a href="<?=base_url()."like/add/".$row->pid."/".$row->bid."/".$GLOBALS['USER']['id']?>">like</a>
						<span class="glyphicon glyphicon-pushpin"></span>
						<a href="#" data-toggle="modal" data-target="#pin_url" onclick="pin_url('<?=$row->pid?>')">pin</a>
						<span class="glyphicon glyphicon-remove"></span>
						<a href="<?=base_url()."pin/delete/".$row->pid."/".$row->bid?>">delete</a>

						</p>
						
						
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

	<!-- Modal -->
    <div class="modal fade" id="modify_board" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
    </div><!-- /.modal -->


</div>