// https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false
// //code.jquery.com/jquery-1.11.0.min.js

var map;

var json;
// The JSON data
// var json = [{"id":48,"title":"Helgelandskysten","longitude":"12.63376","latitude":"66.02219"},{"id":46,"title":"Tysfjord","longitude":"16.50279","latitude":"68.03515"},{"id":44,"title":"Sledehunds-ekspedisjon","longitude":"7.53744","latitude":"60.08929"},{"id":43,"title":"Amundsens sydpolferd","longitude":"11.38411","latitude":"62.57481"},{"id":39,"title":"Vikingtokt","longitude":"6.96781","latitude":"60.96335"},{"id":6,"title":"Tungtvann- sabotasjen","longitude":"8.49139","latitude":"59.87111"}];

function load(){
  $.getJSON("../../queries/latestNodeStats.php", function(data){
    console.log(data);
    json = data;
    initialize();
  });
}

function initialize() {
  // console.log("Initializing");
  // Giving the map som options
  var mapOptions = {
    zoom: 7,
    center: new google.maps.LatLng(json[0]['gpsLatitude'],json[0]['gpsLongitude'])

  };
  
  // Creating the map
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var infoWindow = new google.maps.InfoWindow();

  // Looping through all the entries from the JSON data
  for(var i = 0; i < json.length; i++) {
    
    // Current object
    var obj = json[i];

    var cont = "";
    // Adding a new marker for the object
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(obj.gpsLatitude,obj.gpsLongitude),
      map: map,
      title: obj.nodeid // this works, giving the marker a title with the correct title
    });
    // Set content of markers
    (function(marker, obj) {
        cont = "<strong>Node:</strong> " + obj.nodeid + 
        "<br><strong>Last Updated:</strong> " + obj.timestamp + 
        "<br><strong>Water Temp:</strong> " + obj.waterTemp + 
        "°C<br><strong>Air Temp:</strong> " + obj.airTemp +
        "°C<br><a href='nodeInfo.php?nodeID="+obj.nodeid+"'>More Details</a>";
				// Attaching a click event to the current marker
				google.maps.event.addListener(marker, "click", function(e) {
					infoWindow.setContent(cont);
					infoWindow.open(map, marker);
				});


		})(marker, obj);

    // Adding a new info window for the object
    // var clicker = addClicker(marker, obj.nodeid);

  } // end loop
  
  
  // Adding a new click event listener for the object
  function addClicker(marker, content) {
    google.maps.event.addListener(marker, 'click', function() {
      
      if (infowindow) {infowindow.close();}
      infowindow = new google.maps.InfoWindow({content: content});
      infowindow.open(map, marker);
    });
  }

  
}

// Initialize the map

google.maps.event.addDomListener(window, 'load', load);
