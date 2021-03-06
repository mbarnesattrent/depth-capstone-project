
<body class="u-body-background">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="dashboard.php">Depth</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="../dashboard.php#charts">Links</a></li>
          <li><a href="../dashboard.php#maps">Map</a></li>
          <li><a href="../dashboard.php#nodes">Nodes</a></li>
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
              <li><a href="../accountsettings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Settings</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Notifications</a></li>
              <li><a href="#">Organizations</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </li>
        </ul> 
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</body>