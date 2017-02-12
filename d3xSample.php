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
            <br><br>
            <div>
              <!--Placeholders For All The Charts-->
              <h5>Total Percent of Records By Node</h5>
              <div id="pieChart"></div>

              <h5>Percent of Records by Node Each Day</h5>
              <div id="countsByDay"></div>

              <h5>pH Level of Nodes by Day
              <div id="dualArea"></div>

              </h5>Average Water Temperature by Day</h5>
              <div id="waterTemp"></div>

              <h5>Water Temperature of Nodes Over Time</h5>
              <div id="waterTempLineChart"></div>

              <h5>Water VS Air Temperatures Over Time</h5>
              <div id="tempsLineChart"></div>
            </div>
          </div>
        </div>
      <div>
    </div>
<!-- End unconditional template -->

<!--To Compile Charts-->
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
<script src="/states/nodes/dashboardCharts.js"></script>