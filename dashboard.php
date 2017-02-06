<?php
  require 'phpHeader.php';
  if (!$loggedin) {
    header('Location: login.php');
    die();
  }
  require 'headerhtml.php';
?>
<script type="text/javascript">
  function addNodeFunction() {
    var nodeID = $('#nodeIDfield').val();
    if (validateSerialInput()) {
      $.getJSON( "../../queries/addNode.php?nodeID="+nodeID, function( data ) {
        //console.log(data); to view error code
        $('#addNodeForm').submit();
      });
    }
  }

  function validateSerialInput() {
    var nodeID = $('#nodeIDfield').val();
    if (!($.isNumeric(nodeID))) {
      $('#addNodeForm').addClass('has-error has-feedback');
      $('#nodeIDfield').tooltip({container: 'body', placement: 'right', 
                                  title: 'Please input a valid Node Serial', trigger: 'manual'}).tooltip('show');
      return false;
    } else {
      $('#addNodeForm').removeClass('has-error has-feedback');
      $('#nodeIDfield').tooltip('hide');
      return true;
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
          <form id='addNodeForm' class='form-group' name='asdfga'> <?php $error ?>
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
                id='addNodeButton' onclick='addNodeFunction();'>Save changes</button>
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
            <h3 class='text-center'>I am a placeholder for a map!</h3>
            <img src='http://labs.strava.com/assets/img/fb/heatmap.png' class='img-responsive' alt='placeholder-image-for-map'>
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
    
  </body>
</html>