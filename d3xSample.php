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
              <div class="container"><h1>Dashboard Charts  </h1></div>
              <div id="exTab1" class="container">	
              <ul  class="nav nav-pills">
                    <li class="active">
                      <a  href="#1a" data-toggle="tab">Records by Node</a>
                    </li>
                    <li><a href="#2a" data-toggle="tab">Percent Each Day</a>
                    </li>
                    <li><a href="#3a" data-toggle="tab">pH</a>
                    </li>
                    <li><a href="#4a" data-toggle="tab">Water Temps</a>
                    </li>
                    <li><a href="#5a" data-toggle="tab">Temp Over Time</a>
                    </li>
                    <li><a href="#6a" data-toggle="tab">Water vs Air Temp</a>
                    </li>
                  </ul>

                    <div class="tab-content clearfix">
                      <div class="tab-pane active" id="1a">
                        <h5>Total Percent of Records By Node</h5>
                        <div id="pieChart"></div>
                      </div>
                      <div class="tab-pane" id="2a">
                        <h5>Percent of Records by Node Each Day</h5>
                        <div id="countsByDay"></div>
                      </div>
                      <div class="tab-pane" id="3a">
                        <h5>pH Level of Nodes by Day
                        <div id="dualArea"></div>
                      </div>
                        <div class="tab-pane" id="4a">
                        </h5>Average Water Temperature by Day</h5>
                        <div id="waterTemp"></div>
                      </div>
                      <div class="tab-pane" id="5a">
                        <h5>Water Temperature of Nodes Over Time</h5>
                        <div id="waterTempLineChart"></div>
                      </div>
                      <div class="tab-pane" id="6a">
                        <h5>Water VS Air Temperatures Over Time</h5>
                        <div id="tempsLineChart"></div>
                      </div>
                    </div>
                </div>
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