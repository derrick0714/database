<script>
	function showStream(id)
	{	
		window.location = "<?=base_url()."stream/id/"?>"+id;	    
	}

	function edit_steram(id)
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
			<center><h2><?=$user['first_name']?> <?=$user['last_name']?>'s Stream Page </h2></center>
		</div>
	</div>

	<!--nav bar-->
	<div class="row div_content">
		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#"><?=$stream_query->num_rows()?> Streams</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li ><a href="#" data-toggle="modal" data-target="#create_stream" onclick="cs()">Add Stream</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<?php
		$row_num = 4;
		$counter= 0;
		foreach ($stream_query->result() as $row)
		{
			//$row->sid;
			//$row->sname;
			//$row->sdesc;
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

					<img class="user_img" data-src="holder.js/300x200" alt="300x200" src="<?=ICO?>/pinterest_badge_red.png" onclick="showStream('<?=$row->sid?>')">
					
					<div class="caption">
						<h3><?=$row->sname?></h3>
						<p><?=$row->sdesc?></p>
						<p><a href="#" class="btn btn-info btn-lg btn-block" role="button" onclick="edit_stream('<?=$row->sid?>')" data-toggle="modal" data-target="#modify_stream">Edit</a></p>
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
    <div class="modal fade" id="modify_stream" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      
    </div><!-- /.modal -->


</div>