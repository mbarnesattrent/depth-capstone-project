<?php
  if(!session_id()) session_start();
  //print_r($_SESSION);

  require_once 'functions/functions.php';
  //require_once 'states/head.php';

  
  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;
  // echo "<title>$appname$userstr</title><link rel='stylesheet' " .
  //    "href='styles.css' type='text/css'>"
  //    "</head><body><center><canvas id='logo' width='624' "
  //    "height='96'>$appname</canvas></center>"
  //    "<div class='appname'>$appname$userstr</div>"
  //    "<script src='javascript.js'></script>";

?>