
<div class="container div_500px">
	<div class="row div_header">
		<div>
			<center><h1><a href= "<?=base_url()."user/id/".$onwer[0]->uid?>"><?=$onwer[0]->first_name?></a>'s Stream: <?=$stream['sname']?></h1></center>
		</div>
		<div>
			<center><h5><?=$stream['sdesc']?></h5></center>
		</div>
	</div>
	
	<!--nav bar-->
	<div class="row div_content">
		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Collected <?=$fellow_reslut->num_rows();?>  Boards</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<?php
		$row_num = 4;
		$counter= 0;
		foreach ($fellow_reslut->result() as $row)
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

					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="http://static.seekingalpha.com/uploads/2009/4/27/saupload_picture_116.png" onclick="showBoard('<?=$row->bid?>')">
					
					<div class="caption">
						<h5>name:<?=$row->bname?></h5>
						<h6>owner:<a href="<?=base_url()."user/id/".$row->uid?>"><?=$row->first_name?></h5>
						<p class="my_divide"></p>
						<p class="h5">
						<span class="glyphicon glyphicon-remove"></span>
						<a href="#"" onclick="removeboard('<?=$row->bid?>','<?=$row->sid?>')" ">delete</a>

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