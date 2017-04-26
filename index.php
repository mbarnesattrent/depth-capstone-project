<?php
  require 'phpHeader.php';
  require 'headerhtml.php';


  if ($loggedin) {
    require 'states/index/index-loggedin.php';
  }
  else {
?>
    <div id='notLoggedInMain' id='mainBG' class='main u-textAlign-center'>
      <img src='assets/Depth Logo.png'>
    </div>
<?php
  }

?>
    </div>
  </body>
</html>