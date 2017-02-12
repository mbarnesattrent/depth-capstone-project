<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>

<script src="/states/nodes/nodeInfo.js"></script>


<!-- Begin unconditional template -->
    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'>Node Details</div>
              
            </div>
          </div>
        </div>
      <div>
    </div>
<!-- End unconditional template -->