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
  <link rel="shortcut icon"  href="<?=ICO?>/favicon.png">
  <style type="text/css">
    #footer {
      height: 60px;
      background-color: #f5f5f5;
    }
    html, body {
      height: 100%;
    }
    .footer_container {
      width: auto;
      max-width: 680px;
      padding: 0 15px;
    }
    .result_container {
      width: auto;
      max-width: 880px;
      padding: 0 15px;
    }
    .footer_container .credit {
      margin: 20px 0;
    }
    /* Wrapper for page content to push down footer */
    #wrap {
      min-height: 100%;
      height: auto;
      /* Negative indent footer by its height */
      margin: 0 auto -60px;
      /* Pad bottom by footer height */
      padding: 0 0 60px;
    }

    #sm_span{
      height: 36px;
    }

  </style>
</head>
<body>
 <div id='wrap'>
   <!-- Static navbar -->
   <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Homework 3</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="search.php">Search</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xu Deng <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">ID:0483423</a></li>
              <li><a href="#">Mail:derrick0714@gmail.com</a></li>
              <li><a href="#">CS6083</a></li>
              <li class="divider"></li>
              <li><a href="#">log out</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>