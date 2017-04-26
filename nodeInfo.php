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
<script>
  function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }
</script>
<!-- Pull in the user's node data -->
<script src="/states/nodes/nodes.js">
</script>
<script language="javascript">

  $(document).ready(function() {
    window.setTimeout(function() {
      var currentNode = getParameterByName('nodeID');
      var nodeArr = handleUserNodes("#node-list-template", "#node-list-content");
      $.when(nodeArr).done( function( data ) {
        console.log( data );
        data.forEach(function( elem ) {
          if (elem.nodeID == currentNode){
            //console.log("a"+currentNode)
            $("#linkNode"+currentNode).addClass("active");
          }
        });
      });
    });
  });
</script>

<script id="node-list-template" type="text/x-handlebars-template">
  {{#if this}}
    <h4 class="text-center">Node List</h4>
    {{#each this}}
      <div class="text-center">
        <a id="linkNode{{nodeID}}" href="nodeInfo.php?nodeID={{nodeID}}">{{nodeID}}</a>
      </div>
    {{/each}}
  {{else}}
  {{/if}}
</script>
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
        <div class="col-xs-2">
          <div class="well">
            <div id="node-list-content"></div>
          </div>
        </div>
      <div>
    </div>