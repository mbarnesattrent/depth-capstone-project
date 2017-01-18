<?php
  require 'phpHeader.php';
  if (isset($_SESSION['user']))
  {
    destroySession();
    $loggedin = false;
    header('Location: index.php');
  }
  else echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
?>
    <br><br></div>
  </body>
</html>