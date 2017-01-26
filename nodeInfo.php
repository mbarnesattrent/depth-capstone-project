<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>

<script src="/frameworks/Chart.bundle.js"></script>

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
<!-- End handlebars template -->


<!-- Begin unconditional template -->
    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
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

<script type="javascript">

$.getJSON( "../../queries/getUserNodes.php", function( data ) {
  if (data) {
    // Grab the template script
    var theTemplateScript = $("#address-template").html();
    // Compile the template
    var theTemplate = Handlebars.compile(theTemplateScript);
    // Pass our data to the template
    var theCompiledHtml = theTemplate(data);
    // Add the compiled html to the page
    $('#node-content').html(theCompiledHtml);
  }
});



</script>
