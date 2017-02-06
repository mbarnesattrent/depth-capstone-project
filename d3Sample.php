<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.js"></script>

<script src="/states/nodes/d3Test.js"></script>


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