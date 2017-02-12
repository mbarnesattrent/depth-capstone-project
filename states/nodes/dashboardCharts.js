waterTempChart();
waterTempLineChart();

function waterTempChart(){
    var svg = dimple.newSvg("#waterTemp", 590, 400);
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