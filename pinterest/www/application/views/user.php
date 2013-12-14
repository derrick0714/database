<script>
	function showBoard(id)
	{	
		window.location = "<?=base_url()."board/id/"?>"+id;	    
	}

	function edit_board(id)
	{
		if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  	xmlhttp=new XMLHttpRequest();
	  }
	  else
	  {// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function()
	  {
	  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	  	{
	  		document.getElementById("modify_board").innerHTML=xmlhttp.responseText;
	  	}
	  }
	  xmlhttp.open("GET","<?=base_url().'board/show_modify/'?>"+id,true);
	  xmlhttp.send();
	}
	function delete_board(id)
	{
		if (confirm('Are you sure you want to delete this board?')) {
		    window.location = "<?=base_url()."board/delete/"?>"+id;
		}    
	}

</script>


<div class="container div_500px">
	<div class="row div_header">
		<div>
			<center><h2><?=$user['first_name']?> <?=$user['last_name']?>'s Home Page </h2></center>
		</div>
	</div>

	<!--nav bar-->
	<div class="row div_content">
		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#"><?=$board_query->num_rows()?> Boards</a></li>
					<li><a href="#"><?=$pins?> Pins</a></li>
					<li><a href="#"><?=$likes?> Likes</a></li>
					<li><a href="<?=base_url()."firend/show/1"?>"><?=$friend_num?> Friends</a></li>
				</ul>
				<?php 
					if($self == true)
					{
				?>
					<ul class="nav navbar-nav navbar-right">
					<li ><a href="#" data-toggle="modal" data-target="#modify_user" onclick="modifyuser()" >Edit Profile</a></li>
					<li ><a href="#" data-toggle="modal" data-target="#create_board">Add Board</a></li>
					</ul>
				<?php
					}else{
				?>
					<ul class="nav navbar-nav navbar-right">
					<li ><a href="<?=base_url()."firend/request/".$GLOBALS['USER']['id']."/".$user['uid']?>" >request to a friend</a></li>
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
		foreach ($board_query->result() as $row)
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
					<?php
						if(isset($cover[$row->bid])){
					?>
					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="<?=$cover[$row->bid]?>" onclick="showBoard('<?=$row->bid?>')">
					<?php
						}
						else{
					?>
					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="<?=ICO?>/pinterest_badge_red.png" onclick="showBoard('<?=$row->bid?>')">
					<?php
						}
					?>
					
					
					<div class="caption">
						<h3><?=$row->bname?></h3>
						<?php if($row->public == true)
							{
						?>
						<p><span class="label label-primary">public</span></p>
						<?php 
							}
							else{
						?>
						<p><span class="label label-danger">private</span></p>
						<?php 
							}
						?>
						<p><?=$row->bdesc?></p>
						<p><a href="#" class="btn btn-info btn-lg btn-block" role="button" onclick="edit_board('<?=$row->bid?>')" data-toggle="modal" data-target="#modify_board">Edit</a></p>
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

    <!-- Modal -->
    <div class="modal fade" id="modify_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
    </div><!-- /.modal -->


</div>