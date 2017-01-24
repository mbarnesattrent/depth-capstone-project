<?php
  require 'phpHeader.php';
  require 'headerhtml.php';


  if ($loggedin) {
    require 'states/index/index-loggedin.php';
  }
  else {
    echo "<div class='main u-textAlign-center'>Welcome to $appname, ";
    echo 'please sign up and/or log in to join in.';
  }

?>
    </div>
  </body>
</html>