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
              Node Details
            </div>
            <div id="exTab1" class="container">
              <ul  class="nav nav-pills">
                <li class="active"><a href="#2a" data-toggle="tab">water Temp</a></li>
                <li><a href="#3a" data-toggle="tab">air Chart</a></li>
                <li><a href="#4a" data-toggle="tab">temp LC</a></li>
                <li><a href="#5a" data-toggle="tab">ph Chart</a></li>
              </ul>

              <div class="tab-content clearfix">
                <div class="tab-pane active" id="2a">
                  <h5>water Temp</h5>
                  <div id="waterTemp"></div>
                </div>
                <div class="tab-pane" id="3a">
                  <h5>air Chart</h5>
                  <div id="airChart"></div>
                </div>
                <div class="tab-pane" id="4a">
                  </h5>temp LC</h5>
                  <div id="tempLC"></div>
                </div>
                <div class="tab-pane" id="5a">
                  <h5>ph Chart</h5>
                  <div id="phChart"></div>
                </div>
              </div>
            </div>


            <script src="https://d3js.org/d3.v4.min.js"></script>
            <script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
            <script src="/states/nodes/waunCharts.js"></script>
          </div>
        </div>
      <div>
    </div>