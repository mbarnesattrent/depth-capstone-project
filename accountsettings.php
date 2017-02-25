<?php
  require 'phpHeader.php';
  
  if ($loggedin) {
  		require 'headerhtml.php'; 
  	 	require 'states/accountSettings/accountSettings-loggedin.php';
}
  else           
  	    header('Location: index.php');
?>
    </span><br><br>
  </body>
</html>