<?php
  require 'phpHeader.php';
  if (!$loggedin) {
    header('Location: login.php');
    die();
  }
  require 'headerhtml.php';
?>
<script type="text/javascript">
  //allow for validation
  $(document).ready(function() {
    $("#deleteNodeForm").submit(function(event){
      var nodeID = validateDeleteInput();
      if (nodeID) {
        $.getJSON( "../../queries/deleteNode.php?nodeID="+nodeID, function( data ) {});
        return;
      }
      event.preventDefault();
    });
    $("#addNodeForm").submit(function(event){
      var nodeID = validateSerialInput();
      if (nodeID) {
        $.getJSON( "../../queries/addNode.php?nodeID="+nodeID, function( data ) {});
        return;
      }
      event.preventDefault();
    });
  });

  function validateSerialInput() {
    var nodeID = $('#nodeIDfield').val();
    if (!($.isNumeric(nodeID))) {
      // check if the nodeID is numerical format.
      $('#addNodeForm').addClass('has-error has-feedback');
      $('#addNodeForm').attr('data-original-title', 'Please input a valid Node Serial')
        .tooltip('fixTitle')
      $('#nodeIDfield').tooltip({container: 'body', placement: 'right',
                                        trigger: 'manual'}).tooltip('show');
      return false;
    } else {
      // no validation errors
      $('#addNodeForm').removeClass('has-error has-feedback');
      $('#addNodeForm').attr('data-original-title', '')
        .tooltip('fixTitle')
      $('#nodeIDfield').tooltip('hide');
      return nodeID;
    }
  }

  function validateDeleteInput() {
    $('#deleteNodeIDfield').tooltip('hide');
    var deleteNodeID = $('#deleteNodeIDfield').val();
    if (!($.isNumeric(deleteNodeID))) {
      // check if the nodeID is numerical format.
      $('#deleteNodeForm').addClass('has-error has-feedback');
      $('#deleteNodeForm').attr('data-original-title', 'Please input a valid Node Serial')
        .tooltip('fixTitle')
      $('#deleteNodeIDfield').tooltip({container: 'body', placement: 'right',
                                        trigger: 'manual'}).tooltip('show');
      return false;
    } else if (!(deleteNodeID == deleteModalNodeID)) {
      // check for the confirmed nodeID serial to delete.
      $('#deleteNodeForm').addClass('has-error has-feedback');
      $('#deleteNodeForm').attr('data-original-title', 'Node serials do not match')
        .tooltip('fixTitle')
      $('#deleteNodeIDfield').tooltip({container: 'body', placement: 'right',
                                        trigger: 'manual'}).tooltip('show');
      return false;
    } else {
      // no validation errors
      $('#deleteNodeForm').removeClass('has-error has-feedback');
      $('#deleteNodeForm').attr('data-original-title', '')
        .tooltip('fixTitle')
      $('#deleteNodeIDfield').tooltip('hide');
      return deleteNodeID;
    }
  }
</script>


<!-- Modal (should come as soon as possible, so it's not displaced) -->
<div class="modal fade" id="addNodeModal" tabindex="-1" role="dialog" aria-labelledby="Add Node Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="AddNodeModalHeader">Add a Node</h4>
      </div>
      <div class="modal-body">
        <div class="u-padding-bottom">
          <form id='addNodeForm' class='form-group'> <?php $error ?>
            <div class="input-group">
              <span class="input-group-addon" id="NodeSerial">Node Serial</span>
              <input type="text" class="form-control" onBlur='validateSerialInput()' maxlength="4" name='nodeID' id='nodeIDfield' placeholder="XXXX" aria-describedby="NodeSerial">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" form='addNodeForm' class="btn btn-primary" 
                id='addNodeButton' onclick='addNodeFunction()'>Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->

<!-- Modal (should come as soon as possible, so it's not displaced) -->
<div class="modal fade" id="deleteNodeModal" tabindex="-1" role="dialog" aria-labelledby="Delete Node Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="DeleteNodeModalHeader"></h4>
      </div>
      <div class="modal-body">
        <div class="u-padding-bottom">
          <span>To confirm deletion, please enter the serial of the node you wish to delete.</span>
          <form id='deleteNodeForm' class='form-group'"> <?php $error ?>
            <div class="input-group">
              <span class="input-group-addon" id="DeleteNodeSerial">Node Serial</span>
              <input type="text" class="form-control" onBlur='validateDeleteInput()' maxlength="4" name='deleteNodeID' id='deleteNodeIDfield' placeholder="XXXX" aria-describedby="DeleteNodeSerial">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" form='deleteNodeForm' class="btn btn-primary"
                id='deleteNodeButton' onclick="deleteNodeFunction()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ends -->

<!-- Pull in the user's node data -->
<script src="/states/nodes/nodes.js"></script>


<!-- Handlebars template to import lists of dynamic length, or no list at all-->
<script id="address-template" type="text/x-handlebars-template">
  {{#if this}}
    <table class="table">
      <thead>
        <tr>
          <th>Node ID</th>
          <th>Type</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        {{#each this}}
          <tr>
            <td><a href="nodeInfo.php?nodeID={{nodeID}}">{{nodeID}}</a></td>
            <td>{{typeID}}</td>
            <td aria-label="Status OK">
              <span class="glyphicon glyphicon-ok-sign" style="color: green;" aria-hidden="true"></span>
            </td>
            <td aria-label="Delete Node" style="border-top: none;">
              <span role="button" data-toggle="modal" data-target="#deleteNodeModal" data-whatever="{{nodeID}}" aria-label="Delete Node" class="glyphicon glyphicon-trash" style="color: red;"></span>
            </td>
          </tr>
        {{/each}}
      </tbody>
    </table>
    {{else}}
    no
    {{/if}}
</script>
<!-- End handlebars template -->


    <!-- Begin unconditional template -->
    <div class='main container-fluid'>
      <div class='row'>
        <div class='col-xs-6 col-sm-8 col-sm-offset-2'>
          <div class='well well-lg'>
            <div class="container"><h1>Map</h1></div>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d45617.77950724317!2d-78.3111359730191!3d44.38983860017785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d44.3590131!2d-78.2899582!4m3!3m2!1d44.35899!2d-78.289969!5e0!3m2!1sen!2sca!4v1487010690917" style="border:1px solid black;"></iframe>
            </div>
          </div>
          <div class='well well-lg'>
            <div class="container"><h1>Dashboard Charts</h1></div>
            <div id="exTab1" class="container">
              <ul  class="nav nav-pills">
                <li class="active"><a  href="#1a" data-toggle="tab">Records by Node</a></li>
                <li><a href="#2a" data-toggle="tab">Percent Each Day</a></li>
                <li><a href="#3a" data-toggle="tab">pH</a></li>
                <li><a href="#4a" data-toggle="tab">Water Temps</a></li>
                <li><a href="#5a" data-toggle="tab">Temp Over Time</a></li>
                <li><a href="#6a" data-toggle="tab">Water vs Air Temp</a></li>
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
          <!-- Begin unconditional template -->
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'>Your Nodes</div>
              <button class='pull-right btn btn-primary btn-md' type="button" 
                      data-toggle="modal" data-target="#addNodeModal" aria-label="Add Node">
                <span class="glyphicon glyphicon-ok-sign" style="color: white;"
                      aria-hidden="true"></span> Add a Node
              </button>
            </div>
            <div id='node-content'></div>  
          </div>
        </div>
      <div>
    </div>
    <!-- End unconditional template -->
    
<!--To Compile Charts-->
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="http://dimplejs.org/dist/dimple.v2.3.0.min.js"></script>
<script src="/states/nodes/dashboardCharts.js"></script>
<script src="/states/dashboard/dashboard.js"></script>

  </body>
</html>