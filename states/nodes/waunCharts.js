waterTempChart();
waterTempLineChart();
tempLayersChart();
pHChart();


//Used for GET 
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


function waterTempChart(){
    var svg = dimple.newSvg("#waterTemp", 590, 400);
    d3.csv("../../queries/getSingleNodeStatsCSV.php?nodeID="+ getQueryVariable("nodeID"), function (data) {
      var myChart = new dimple.chart(svg, data);
      console.log(data);
      myChart.setBounds(60, 30, 510, 305)
      var x = myChart.addCategoryAxis("x", "date");
      x.addOrderRule("Date");
      myChart.addMeasureAxis("y", "waterTemp");
      //Used to separate by anything
      myChart.addSeries("Nodes", dimple.plot.bar);
      myChart.addLegend(60, 10, 510, 20, "right");
      myChart.draw();
    });
}

function waterTempLineChart(){
     var svg = dimple.newSvg("#airChart", 590, 400);
    d3.csv("../../queries/getSingleNodeStatsCSV.php?nodeID="+ getQueryVariable("nodeID"), function (data) {
      // data = dimple.filterData(data, "Owner", ["Aperture", "Black Mesa"])
      var myChart = new dimple.chart(svg, data);
      myChart.setBounds(60, 30, 505, 305);
      var x = myChart.addCategoryAxis("x", "date");
      x.addOrderRule("Date");
      myChart.addMeasureAxis("y", "airTemp");
      myChart.addSeries("Nodes", dimple.plot.line);
      myChart.addLegend(60, 10, 500, 20, "right");
      myChart.draw();
    });
}

function tempLayersChart(){
   var svg = dimple.newSvg("#tempLC", 590, 400);
    d3.csv("../../queries/tempsByDate.php?nodeID=" + getQueryVariable("nodeID"), function (data) {
      //data = dimple.filterData(data, "Owner", ["Aperture", "Black Mesa"])
      console.log(data);
      var myChart = new dimple.chart(svg, data);
      myChart.setBounds(60, 30, 505, 305);
      var x = myChart.addCategoryAxis("x", "date");
      x.addOrderRule("Date");
      myChart.addMeasureAxis("y", "Temp");
      var s = myChart.addSeries("Type", dimple.plot.area);
      myChart.addLegend(60, 10, 500, 20, "right");
      myChart.draw();
    });
}

function pHChart(){
var svg = dimple.newSvg("#phChart", 590, 400);
    d3.csv("../../queries/getSingleNodeStatsCSV.php?nodeID="+ getQueryVariable("nodeID"), function (data) {
      //data = dimple.filterData(data, "Owner", ["Aperture", "Black Mesa"])
      var myChart = new dimple.chart(svg, data);
      myChart.setBounds(60, 30, 505, 305);
      var x = myChart.addCategoryAxis("x", "date");
      x.addOrderRule("Date");
      myChart.addMeasureAxis("y", "pH");
      var s = myChart.addSeries(null, dimple.plot.line);
      s.interpolation = "step";
      myChart.draw();
    });
}