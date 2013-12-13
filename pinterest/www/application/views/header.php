
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$title?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?=CSS?>/bootstrap.css" rel="stylesheet">
  <link href="<?=CSS?>/my.css" rel="stylesheet">
  <link rel="shortcut icon"  href="<?=ICO?>/favicon.png">
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

  function pin_url2(){

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
        document.getElementById("pin_url").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?=base_url().'pin/pin_url/'?>",true);
    xmlhttp.send();
  }
  function fellow_board2(bid)
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
        document.getElementById("fellow_board").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?=base_url().'fellow/fellow_board/'?>"+bid,true);
    xmlhttp.send();
  }

  function pin_url(pid){
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
        document.getElementById("pin_url").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?=base_url().'pin/repin/'?>"+pid,true);
    xmlhttp.send();
  }

  function cs()
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
        document.getElementById("create_stream").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET","<?=base_url().'stream/show_create/'?>",true);
    xmlhttp.send();
  }
  function removeboard(bid, sid)
  {
    if (confirm('Are you sure you want to remove this board from your stream?')) {
      window.location = "<?=base_url()."fellow/delete/"?>"+bid+"/"+sid;
    }    
  }
  function showpic(pid,bid)
  {
     window.location = "<?=base_url()."picture/id/"?>"+pid+"/"+bid;
  }
</script>
</head>
<body>
 <div id='wrap'>
   <!-- Static navbar -->
   <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="row">
        <div class="col-md-1 no_padding">
         <ul class="nav navbar-nav">
           <li class="dropdown" nav navbar-nav>
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stream <b class="caret"></b></a>
             <ul class="dropdown-menu">
              <li><a href="<?=base_url()."welcome/stream/-1"?>">Discover</a></li>
              <li><a href="<?=base_url()."welcome/stream/0"?>">All my streams</a></li>
              <li role="presentation" class="divider"></li>
              <?php
                if(isset($streams)){
                foreach($streams->result() as $row)
                {
              ?>
              <li><a href="<?=base_url()."welcome/stream/".$row->sid?>"><?=$row->sname?></a></li>
              <?php 
              }}?>
            </ul>
          </li>
        </ul>
      </div>
      <div class="col-sm-3 no_padding">
        <form class="navbar-form " action="<?=base_url()."welcome/search/"?>" method="post"  role="form">
          <div class="input-group">
            <input type="text" placeholder="search for your interest" name='keyword' class="form-control">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">Search</button>
            </span>
          </div>
        </form>
      </div>
      <!--sec part -->
      <div class="col-sm-4">
        <center><a href="<?=base_url()?>"><img height ="50px" src="<?=ICO?>/pinterest_logo_red.png"></a></center>
      </div>
      <!--/.sec part -->

      <!--thrid part -->
      <div class="col-sm-4" style="height:50px;">
        <div class="btn-group navbar navbar-right nar-dx-bt">
         <button type="button" class="btn btn-default" >
          <a href = "<?=base_url()."user/"?>">
            <img src="http://upload.wikimedia.org/wikipedia/commons/a/a5/Apple_gray_logo.png" alt="home page" height="20px" width="20px">
          </a>
        </button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          <?=$GLOBALS['USER']['email']?>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
         <li><a href="<?=base_url()."user/"?>">Your profile & Pins</a></li>
         <li><a href="<?=base_url()."stream/"?>">Your streams</a></li>
         <li><a href="<?=base_url()."firend/show/".$GLOBALS['USER']['id']?>">Your friends</a></li>
         <li class="divider"></li>
         <li><a href="<?=base_url()."account/logout"?>">Log out</a></li>
       </ul>
     </div>

     <div class="btn-group navbar navbar-right nar-dx-bt">
       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         <span class="glyphicon glyphicon-plus"></span> <span class="caret"></span>
       </button>
       <ul class="dropdown-menu" role="menu">
        <li><a href="#" data-toggle="modal" data-target="#pin_url" onclick="pin_url2()">Upload a pin</a></li>
        <li><a href="#" data-toggle="modal" data-target="#create_board" onclick="create_board()">Create a borad</a></li>
        <li><a href="#" data-toggle="modal" data-target="#create_stream" onclick="cs()">Create a stream</a></li>
      </ul>
    </div>
  </div>
  <!--/.thrid part -->
</div>
</div>
</div>

<!-- Create a board Modal -->
<div class="modal fade" id="create_board" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create a Borad</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?=base_url()?>board/create" method="post" role="form">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control input-lg" name="Name" placeholder="Name">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-8">
              <input type="text" class="form-control input-lg" name="Desc" placeholder="Description">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Public</label>
            <div class="col-sm-8">
              <label><input type="checkbox" class="input-md" name="Public" checked = 'true'></label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="form-group">
            <div class="col-sm-6"></div>
            <div class="col-sm-3">
              <button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
            <div class="col-sm-2">
              <button type="submit" class="btn btn-lg btn-primary">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.Create a board  modal -->

<!-- Create a board Modal -->
<div class="modal fade" id="pin_url" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<!-- Create a board Modal -->
<div class="modal fade" id="create_stream" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<!-- Create a board Modal -->
<div class="modal fade" id="fellow_board" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>