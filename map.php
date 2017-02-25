<?php 
  require 'phpHeader.php';

  if (!$loggedin) {
    header('Location: login.php');
    die();
  }

  require 'headerhtml.php';
?>
<html>
<head>
    <style>
    #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>
</head>
<!-- Begin unconditional template -->

<body>
    <div class='main container-fluid '>
      <div class='row'>
        <div class='col-xs-8 col-sm-offset-2'>
          <div class="well">
            <div class='h3'>
              <div class='col-md-6'>Maps</div>
            </div>
            <br>
            <div id="map-canvas" style="width: 100%; height: 400px"></div>
          </div>
        </div>
      <div>
    </div>
</body>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAXvuJD0ZBV0a3eK2fXP6CIY82dkLFkRvc"></script> 

<script src="/states/nodes/map.js"></script>


</html>

