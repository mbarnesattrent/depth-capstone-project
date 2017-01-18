<?php
  require 'phpHeader.php';
  require 'headerhtml.php';
  echo "<br><span class='main'>Welcome to $appname,";
  if ($loggedin) echo " $user, you are logged in.";
  else           echo ' please sign up and/or log in to join in.';
?>
    </span><br><br>
  </body>
</html>