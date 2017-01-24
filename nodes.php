<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>
<script src="/states/nodes/nodes.js"></script>
<!-- Pull in the user's node data -->
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
            <td>{{nodeID}}</td>
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

    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <h3>Your Nodes</h3>
            <div id='node-content'></div>  
          </div>
        </div>
      <div>
    </div>


