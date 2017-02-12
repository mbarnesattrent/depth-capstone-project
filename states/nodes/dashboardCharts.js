/* 
    Separated compiling each chart into functions, at a later time functions
    that use the results of the same query could be compiled into same function
    to limit amount of times each query is called.
*/

//Used to generate each chart, some of the names are slightly off
pieCount();
countsByDay();
dualArea();
waterTempChart();
waterTempLineChart();
tempsLineChart();

//Used for fading loggedin notification, need to eventually make so it only appears upon first login
console.log("Fade Banner");
window.setTimeout(function() {
  $("#logged_in_message").fadeTo(300, 0).slideUp(500, function(){
    $(this).remove(); 
  });
}, 2000)

function waterTempChart(){
    var svg = dimple.newSvg("#waterTemp", 590, 400);
    //Simple format to call our query andretrieve a CSV
    d3.csv("../../queries/userNodeDailyAvg.php", function (data) {
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
    var svg = dimple.newSvg("#waterTempLineChart", 590, 400);
    d3.csv("../../queries/userNodeDailyAvg.php", function (data) {
    //   data = dimple.filterData(data, "Owner", ["Aperture", "Black Mesa"])
      var myChart = new dimple.chart(svg, data);
      myChart.setBounds(60, 30, 505, 305);
      var x = myChart.addCategoryAxis("x", "date");
      x.addOrderRule("Date");
      myChart.addMeasureAxis("y", "waterTemp");
      myChart.addSeries("nodeid", dimple.plot.line);
      myChart.addLegend(60, 10, 500, 20, "right");
      myChart.draw();
    });
}

function pieCount(){
    var svg = dimple.newSvg("#pieChart", 590, 400);
    d3.csv("../../queries/nodeRecordCounts.php", function (data) {
        console.log(data);
        var myChart = new dimple.chart(svg, data);
        myChart.setBounds(20, 20, 460, 360)
        myChart.addMeasureAxis("p", "Record Count");
        myChart.addSeries("node", dimple.plot.pie);
        myChart.addLegend(500, 20, 90, 300, "left");
        myChart.draw();
    });
}

function countsByDay(){
    var svg = dimple.newSvg("#countsByDay", 590, 400);
      d3.csv("../../queries/nodeRecordCounts.php?byDate=1", function (data) {
        // data = dimple.filterData(data, "Date", [
        //   "01/07/2012", "01/08/2012", "01/09/2012",
        //   "01/10/2012", "01/11/2012", "01/12/2012"]);
        var myChart = new dimple.chart(svg, data);
        myChart.setBounds(75, 30, 480, 330)
        myChart.addMeasureAxis("x", "Record Count");
        var y = myChart.addCategoryAxis("y", "Record Date");
        y.addOrderRule("Date");
        myChart.addMeasureAxis("p", "Record Count");
        var rings = myChart.addSeries("node", dimple.plot.pie);
        rings.innerRadius = 15;
        rings.outerRadius = 20;
        myChart.addLegend(180, 10, 360, 20, "right");
        myChart.draw();
      });
}

function dualArea(){
    var svg = dimple.newSvg("#dualArea", 590, 400);
      d3.csv("../../queries/userNodeDailyAvg.php", function (data) {
        var myChart = new dimple.chart(svg, data);
        myChart.setBounds(60, 30, 505, 305)
        var x = myChart.addCategoryAxis("x", "date");
        x.addOrderRule("Date");
        myChart.addMeasureAxis("y", "pH");
        myChart.addSeries("nodeid", dimple.plot.bubble);
        myChart.addLegend(180, 10, 360, 20, "right");
        myChart.draw();
      });
}

function tempsLineChart(){
    var svg = dimple.newSvg("#tempsLineChart", 590, 400);
    d3.csv("../../queries/tempsByDate.php", function (data) {
        data = dimple.filterData(data, "Type", ["Air", "Water"])
        var myChart = new dimple.chart(svg, data);
        myChart.setBounds(60, 30, 505, 305);
        var x = myChart.addCategoryAxis("x", "date");
        x.addOrderRule("Date");
        myChart.addMeasureAxis("y", "Temp");
        var s = myChart.addSeries("Type", dimple.plot.line);
        s.interpolation = "step";
        myChart.addLegend(60, 10, 500, 20, "right");
        myChart.draw();
    });
}