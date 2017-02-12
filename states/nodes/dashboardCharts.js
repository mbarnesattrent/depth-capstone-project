waterTempChart();
waterTempLineChart();
pieCount();

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