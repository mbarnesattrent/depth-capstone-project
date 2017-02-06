
console.log("About to query");

$.getJSON( "../../queries/getUserNodeData.php?nodeID="+getQueryVariable("nodeID"), function( result ) {
    
    console.log(result);
    console.log("NodeID is " + getQueryVariable("nodeID"));
     var labels = [],data=[];

         for(var i = 0; i < result.length; i++){
            //  console.log(result[i]);
             labels.push(result[i]['timestamp']);
             data.push(result[i]['waterTemp']);
          }

    // console.log(labels);
    var canvas = document.getElementById("myChart");
    var ctx = canvas.getContext("2d");

    var tempData = {
        labels : labels,
        datasets : [{
            fillColor : "rgba(172,194,132,0.4)",
            strokeColor : "#ACC26D",
            pointColor : "#382765",
            pointStrokeColor : "#9DB86D",
            data : data
        }]
    };

    var myNewChart = new Chart(ctx , {
        type: "line",
        data: tempData, 
    }); 
    

});

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}