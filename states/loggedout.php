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
        <a class="navbar-brand" href="index.php">Depth</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="../dashboard.php#charts">Links</a></li>
          <li><a href="#">Map</a></li>
          <li><a href="#">Nodes</a></li>
          <li><a href="#">Alerts</a></li>
          <li><a href="#">About</a></li>
        </ul>

        <ul class="nav navbar-nav u-navbar-right">
          <li><a href="#myModal" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login/Register</a></li>
        </ul> 
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  </body>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-log-in" aria-hidden="true"> Log-in</span></h4>
        </div>
        <form method='post' action='login.php'> <?php $error ?>
          <div class="modal-body">
            <div class="form-group">
              <div class="u-padding-bottom">
                <label id="loginUser">Username</label><input class='form-control' type='text'
                  maxlength='32' name='user' id="loginUser">

                <label for="loginPassword">Password</label><input class='form-control'type='password'
                  maxlength='32' name='pass' id="loginPassword">
                <span class='fieldname'>&nbsp;</span>
              </div>
              <a href='signup.php'>Don't have an account? Register!</a>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" data-dismiss="modal" class="btn">Close</a>
            <input class='btn btn-primary' type='submit' value='Login'>
          </div>
        </form>
      </div>
    </div>
  </div>