<body class="u-body-background">
  <nav class="navbar navbar-inverse ">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Depth</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#">Links</a></li>
          <li><a href="#">Map</a></li>
          <li><a href="nodes.php">Nodes</a></li>
          <li><a href="#">Alerts</a></li>
          <li><a href="#">About</a></li>
        </ul>

        <ul class="nav navbar-nav u-navbar-right">
          <li class="u-navbar-user"><a href="#"><?php echo "$user" ?></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user u-navbar-user" aria-hidden="true"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="profile options">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </li>
        </ul> 
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</body>