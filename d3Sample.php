<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>



<head>
	<style>

	.axis {
	  font: 10px sans-serif;
	}

	.axis path,
	.axis line {
	  fill: none;
	  stroke: #000;
	  shape-rendering: crispEdges;
	}

	</style>
</head>

<!-- Begin unconditional template -->
    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'>Node Details</div>
            </div>
            <div id="key"> 
              <script src="http://d3js.org/d3.v3.min.js"></script>
              <!--<script src="/states/nodes/d3Test.js"></script>-->
              <script src="/states/nodes/waterTempChart.js"></script>
            </div>
          </div>
        </div>
      <div>
    </div>
<!-- End unconditional template -->
