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

    <div class="row div_200px clearfix" >
     <center><h4> Save all the stuff you love (recipes! articles! travel ideas!) right here on Pinterest.</h1></center>
    </div>
    <div class = "row ">
      <div class="col-md-4"></div>
      <div class="col-md-1">
        <button class="btn btn-primary btn-lg " data-toggle="modal" data-target="#signup">
          Sign Up
        </button>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-md-1">
        <button class="btn btn-primary btn-lg " data-toggle="modal" data-target="#login">
          Log In
        </button>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Sign up with Email</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?=base_url()?>account/submit" method="post" role="form">
              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                  <input type="text" class="form-control input-lg" name="LastName" placeholder="Last Name">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control input-lg" name="FirstName" placeholder="First Name">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="email" class="form-control input-lg" name="Email" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="password" class="form-control input-lg" name="Password" placeholder="Password">
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
                  <button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Log in with Email</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="<?=base_url()?>account/after_login" method="post" role="form">

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="email" class="form-control input-lg" name="Email" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="password" class="form-control input-lg" name="Password" placeholder="Password">
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
                  <button type="submit" class="btn btn-lg btn-primary">Log in</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
    <div class="login_wall"></div>

  </div>


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="<?=JS?>/bootstrap.min.js"></script>
</body>
</html>