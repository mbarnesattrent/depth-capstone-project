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
<script src="http://d3js.org/d3.v3.min.js"></script>

    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'>Node Details</div>
              <h5>pH</h5>
            </div>
            <div id="pHChart"></div>
            <div id="waterTemp"></div>
            
            <script src="/states/nodes/waunCharts.js"></script>
          </div>
        </div>
      <div>
    </div>
<!-- End unconditional template -->
