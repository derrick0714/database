<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pinterest | Log In & Sing Up</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=CSS?>/bootstrap.css" rel="stylesheet">
  <link href="<?=CSS?>/my.css" rel="stylesheet">
  <link rel="shortcut icon"  href="<?=ICO?>/favicon.png">
  <script type="text/JavaScript">
    setTimeout("location.href = '<?=base_url()?>';", 2500);
  </script>
</head>
<body>
 <div id='wrap'>
   <!-- Static navbar -->
   <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">

        </div>
        <!--sec part -->
        <div class="col-sm-4">
          <center><a href="<?=base_url()?>"><img height ="50px" src="<?=ICO?>/pinterest_logo_red.png"></a></center>
        </div>
        <!--/.sec part -->

        
      </div>
    </div>
  </div>

  <div class="min_height container ">
  <div class="row clearfix div_50px" ></div>
    <div class="row clearfix" >
     <center><h4> <?=$message?></h4></center>
   </div>
   <div class = "row ">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="progress progress-striped active">
        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
          <span class="sr-only">45% Complete</span>
        </div>
      </div>
    </div>
  </div>



  <div class="login_wall"></div>

</div>


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="<?=JS?>/bootstrap.min.js"></script>
</body>
</html>