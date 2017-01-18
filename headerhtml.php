<?php

require_once 'states/documentHead.php';

if ($loggedin)
  require_once 'states/loggedin.php';
else
  require_once 'states/loggedout.php';